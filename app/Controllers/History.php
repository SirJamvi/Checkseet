<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InputModel;
use App\Models\StartupModel;
use App\Models\ProductionModel;
use App\Models\ForegoingModel;
use App\Models\EmpModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class History extends BaseController
{
    protected $session;
    protected $InputModel;
    protected $ProductionModel;
    protected $StartupModel;
    protected $ForegoingModel;
    protected $EmpModel;

    // BATAS DOUBLE AUTO-FIT PDF
    private const PDF_MAX_COLS_LANDSCAPE = 20;
    private const PDF_MAX_ROWS_LANDSCAPE = 35;
    private const PDF_MAX_COLS_PORTRAIT = 6;
    private const PDF_MAX_ROWS_PORTRAIT = 35;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->InputModel = new InputModel();
        $this->ProductionModel = new ProductionModel();
        $this->StartupModel = new StartupModel();
        $this->ForegoingModel = new ForegoingModel();
        $this->EmpModel = new EmpModel();
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index(): string
    {
        $data = ['title' => 'History | Startup Management'];
        return view('history', $data);
    }

    public function dataForegoing()
    {
        $data = [
            'title' => 'History | Startup Management',
            'alldata' => $this->ForegoingModel->getAll($_GET['dateStart'], $_GET['dateEnd'], $_GET['device'], $_GET['process'])
        ];
        return view("/layout/" . $_GET['device'] . "/history/foregoing/" . $_GET['process'], $data);
    }

    public function foregoingByNumber($number)
    {
        $data = ['alldata' => $this->ForegoingModel->getByNumber($number)];
        return view("/layout/" . $data['alldata'][0]['device'] . "/history/foregoing/" . $data['alldata'][0]['process'], $data);
    }

    // =========================================================================
    // SHARED HELPERS
    // =========================================================================

    private function getProsesInfo(string $processCode): array
    {
        $db = \Config\Database::connect();
        $row = $db->table('proses')->where('process_code', $processCode)->get()->getRowArray();
        return $row ?: [];
    }

    private function getDeviceInfo(string $deviceCode): array
    {
        $db = \Config\Database::connect();
        $row = $db->table('device')->where('code', $deviceCode)->get()->getRowArray();
        return $row ?: [];
    }

    private function extractTableElement(string $html, string $id = 'table1'): ?\DOMElement
    {
        $doc = new \DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML('<?xml encoding="UTF-8">' . $html);
        libxml_clear_errors();
        $xpath = new \DOMXPath($doc);
        $nodes = $xpath->query("//table[@id='{$id}']");
        return $nodes->length > 0 ? $nodes->item(0) : null;
    }

    private function buildGrid(\DOMElement $table): array
    {
        $occupied = []; 
        $origins  = []; 
        $isHeaderMap = []; 
        $currentRow = 1;
        $maxCol = 0;

        foreach ($table->getElementsByTagName('tr') as $tr) {
            $col = 1;
            foreach ($tr->childNodes as $cell) {
                if (!($cell instanceof \DOMElement)) {
                    continue;
                }
                $tag = strtolower($cell->tagName);
                if ($tag !== 'td' && $tag !== 'th') {
                    continue;
                }
                while (!empty($occupied[$currentRow][$col])) {
                    $col++;
                }
                $colspan = max(1, (int) ($cell->getAttribute('colspan') ?: 1));
                $rowspan = max(1, (int) ($cell->getAttribute('rowspan') ?: 1));
                $isHeader = $tag === 'th';
                $value = preg_replace('/\s+/u', ' ', trim($cell->textContent));

                $origins[$currentRow][$col] = [
                    'value' => $value,
                    'isHeader' => $isHeader,
                    'rowspan' => $rowspan,
                    'colspan' => $colspan,
                ];

                for ($r = $currentRow; $r < $currentRow + $rowspan; $r++) {
                    for ($c = $col; $c < $col + $colspan; $c++) {
                        $occupied[$r][$c] = true;
                    }
                }
                for ($r = $currentRow; $r < $currentRow + $rowspan; $r++) {
                    for ($c = $col; $c < $col + $colspan; $c++) {
                        $isHeaderMap[$r][$c] = $isHeader;
                    }
                }
                $maxCol = max($maxCol, $col + $colspan - 1);
                $col += $colspan;
            }
            $currentRow++;
        }
        return [
            'origins' => $origins,
            'isHeaderMap' => $isHeaderMap,
            'totalRows' => $currentRow - 1,
            'totalCols' => $maxCol,
        ];
    }

    private function decideOrientation(int $totalCols): string
    {
        return $totalCols <= 12 ? 'portrait' : 'landscape';
    }


    // =========================================================================
    // JALUR PDF: Z-PATTERN (KIRI-KANAN LALU ATAS-BAWAH)
    // =========================================================================

   private function resolveExportContext(string $typeProcess, string $process, string $device, string $dateStart, string $dateEnd, string $model = '', string $lotno = '', string $machno = ''): array
    {
        $alldata = [];
        if ($typeProcess === 'production') {
            $alldata = $this->ProductionModel->getAll($dateStart, $dateEnd, $process, $model, $lotno, $machno);
        } elseif ($typeProcess === 'foregoing') {
            $alldata = $this->ForegoingModel->getAll($dateStart, $dateEnd, $device, $process, $model, $lotno, $machno);
        } else {
            $alldata = $this->StartupModel->getAll($dateStart, $dateEnd, $device, $process, $model, $lotno, $machno);
        }

        $prosesInfo = $this->getProsesInfo($process);
        $deviceInfo = $this->getDeviceInfo($device);

        $namaProduk = $deviceInfo['name'] ?? strtoupper($device);
        $namaProsesRaw = $prosesInfo['name'] ?? strtoupper($process);

        if ($typeProcess === 'production') {
            $cleanName = trim(preg_replace('/^(Production\s+Process\s+Control\s+Sheet|Production\s+Control\s+Sheet|Produciton\s+Control\s+Sheet\s+of|Produciton\s+Control\s+Sheet)\s*/i', '', $namaProsesRaw));
            $judulProses = 'Production Process Control Sheet ' . $cleanName;
        } elseif ($typeProcess === 'startup') {
            $cleanName = trim(preg_replace('/\s*Start\s*Up\s*Check\s*Sheet.*$/i', '', $namaProsesRaw));
            $judulProses = $cleanName . ' Start Up Check Sheet';
        } else {
            $judulProses = $namaProsesRaw;
        }

        $noDok = $prosesInfo['docno'] ?? ('FF-' . strtoupper(explode('-', $process)[2] ?? '001') . '-001');
        
        // Mencegah error jika data kosong
        $machNo = !empty($alldata) ? ($alldata[0]['machno'] ?? '') : '';
        // FIX: Tambahkan $prosesInfo ke dalam return array
        return [$alldata, $namaProduk, $judulProses, $noDok, $machNo, $prosesInfo];
    }

    private function countHeaderRows(array $grid): int
    {
        $r = 1;
        while ($r <= $grid['totalRows']) {
            $rowOrigins = $grid['origins'][$r] ?? [];
            if (count($rowOrigins) === 1 && reset($rowOrigins)['colspan'] === $grid['totalCols']) {
                $r++; 
                continue;
            }
            break;
        }
        $firstCell = $grid['origins'][$r][1] ?? null;
        if ($firstCell) {
            return ($r - 1) + $firstCell['rowspan'];
        }
        return 1;
    }

    private function findRealHeaderStartRow(array $grid, int $headerRowCount): int
    {
        for ($r = 1; $r <= $headerRowCount; $r++) {
            $rowOrigins = $grid['origins'][$r] ?? [];
            if (count($rowOrigins) === 1) {
                $only = reset($rowOrigins);
                if ($only['colspan'] === $grid['totalCols']) {
                    continue; 
                }
            }
            return $r;
        }
        return 1;
    }

    private function countIdentityColumns(array $grid, int $headerRowCount): int
    {
        $startRow = $this->findRealHeaderStartRow($grid, $headerRowCount);
        $requiredSpan = $headerRowCount - $startRow + 1;
        $count = 0;
        $c = 1;
        while ($c <= $grid['totalCols']) {
            $origin = $grid['origins'][$startRow][$c] ?? null;
            if ($origin === null || $origin['rowspan'] !== $requiredSpan) {
                break;
            }
            $count += $origin['colspan'];
            $c += $origin['colspan'];
        }
        return $count;
    }

    private function computeUnsafeRowBoundaries(array $grid, int $headerRowCount): array
    {
        $unsafe = [];
        for ($c = 1; $c <= $grid['totalCols']; $c++) {
            for ($r = $headerRowCount + 1; $r <= $grid['totalRows']; $r++) {
                $cell = $grid['origins'][$r][$c] ?? null;
                if ($cell !== null && $cell['rowspan'] > 1) {
                    for ($p = $r; $p < $r + $cell['rowspan'] - 1; $p++) {
                        $unsafe[$p] = true; 
                    }
                }
            }
        }
        return $unsafe;
    }

    private function computeColumnChunks(int $totalCols, int $identityColCount, int $dataColsPerPage): array
    {
        $chunks = [];
        $start = $identityColCount + 1;
        while ($start <= $totalCols) {
            $end = min($totalCols, $start + $dataColsPerPage - 1);
            $chunks[] = [$start, $end];
            $start = $end + 1;
        }
        return $chunks ?: [[$identityColCount + 1, $totalCols]];
    }

    private function computeRowChunks(int $totalRows, int $headerRowCount, array $unsafeRowBoundaries, int $maxRowsPerPage): array
    {
        $chunks = [];
        $start = $headerRowCount + 1;
        
        if ($start > $totalRows) {
            return [[$start, $start]]; 
        }

        while ($start <= $totalRows) {
            $target = min($totalRows, $start + $maxRowsPerPage - 1);
            $end = $target;
            
            while ($end > $start && !empty($unsafeRowBoundaries[$end])) {
                $end--;
            }
            
            if ($end === $start && !empty($unsafeRowBoundaries[$end])) {
                $end = $target;
                while ($end < $totalRows && !empty($unsafeRowBoundaries[$end])) {
                    $end++;
                }
            }
            
            $chunks[] = [$start, $end];
            $start = $end + 1;
        }
        return $chunks;
    }

    private function build2DChunkTableHtml(array $grid, int $identityColCount, array $colRange, int $headerRowCount, array $rowRange): string
    {
        [$startCol, $endCol] = $colRange;
        [$startRow, $endRow] = $rowRange;

        $colMap = [];
        for ($c = 1; $c <= $identityColCount; $c++) {
            $colMap[$c] = count($colMap) + 1;
        }
        for ($c = $startCol; $c <= $endCol; $c++) {
            $colMap[$c] = count($colMap) + 1;
        }
        $totalOriginalCols = $grid['totalCols'];
        
        $renderRow = function (int $r) use ($grid, $colMap, $totalOriginalCols): string {
            $html = '<tr>'; 
            
            if (isset($grid['origins'][$r])) {
                foreach ($grid['origins'][$r] as $c => $origin) {
                    $actualColspan = 0;
                    $overlapEndCol = min($c + $origin['colspan'] - 1, $totalOriginalCols);
                    for($i = $c; $i <= $overlapEndCol; $i++) {
                        if (isset($colMap[$i])) $actualColspan++;
                    }

                    if ($actualColspan > 0) {
                        $tag = $origin['isHeader'] ? 'th' : 'td';
                        $rowspanAttr = $origin['rowspan'] > 1 ? ' rowspan="' . $origin['rowspan'] . '"' : '';
                        $colspanAttr = $actualColspan > 1 ? ' colspan="' . $actualColspan . '"' : '';
                        $value = htmlspecialchars($origin['value'], ENT_QUOTES, 'UTF-8');
                        $html .= "<{$tag}{$rowspanAttr}{$colspanAttr}>{$value}</{$tag}>";
                    }
                }
            }
            $html .= '</tr>';
            return $html;
        };

        $thead = '<thead>';
        for ($r = 1; $r <= $headerRowCount; $r++) {
            $thead .= $renderRow($r);
        }
        $thead .= '</thead>';

        $tbody = '<tbody>';
        for ($r = $startRow; $r <= $endRow; $r++) {
            if ($r <= $grid['totalRows']) {
                $tbody .= $renderRow($r);
            }
        }
        $tbody .= '</tbody>';

        return '<table class="table-cs">' . $thead . $tbody . '</table>';
    }

    private function buildKopSuratHtml(string $namaProduk, string $judulProses, string $noDok, string $machNo, array $alldata, array $prosesInfo, string $typeProcess): string
    {
        // 1. REVISI OTOMATIS: Set default 00 
        $revisiValue = !empty($prosesInfo['revisi']) ? $prosesInfo['revisi'] : 0;
        $revisi = str_pad($revisiValue, 2, '0', STR_PAD_LEFT);
        
        // 2. BERLAKU OTOMATIS: Cari tanggal pertama kali form ini dipakai di sistem!
        $tglBerlaku = '-';
        $timestamp = 0;
        
        if (!empty($prosesInfo['berlaku']) && $prosesInfo['berlaku'] !== '0000-00-00') {
            // Jika suatu saat admin mengisi tanggal di Master Data, prioritaskan ini
            $timestamp = strtotime($prosesInfo['berlaku']);
        } else {
            // JIKA KOSONG: Lakukan pencarian otomatis ke tabel transaksi
            $db = \Config\Database::connect();
            
            // Cari data paling tua (pertama kali dibuat) untuk proses ini
            $dataPertama = $db->table($typeProcess)
                              ->where('process', $prosesInfo['process_code'] ?? '')
                              ->orderBy('created_at', 'ASC')
                              ->limit(1)
                              ->get()
                              ->getRowArray();
                              
            if (!empty($dataPertama['created_at'])) {
                $timestamp = strtotime($dataPertama['created_at']);
            }
        }

        // Render tanggal (Pastikan bukan tahun 1970)
        if ($timestamp !== false && $timestamp > 0) {
            $bulanIndo = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            $tglBerlaku = date('d', $timestamp) . ' ' . $bulanIndo[date('n', $timestamp) - 1] . ' ' . date('Y', $timestamp);
        }

        // 3. Logika Dinamisasi Kotak Tanda Tangan
        $kotakTtdHtml = '';
        if ($typeProcess === 'startup') {
            // Desain 2 Kolom (QC & Production)
            $kotakTtdHtml = '
                <tr>
                    <td style="width: 50%; text-align: center; padding: 2px;">QC</td>
                    <td style="text-align: center; padding: 2px;">Production</td>
                </tr>
                <tr>
                    <td style="height: 25px;"></td>
                    <td style="height: 25px;"></td>
                </tr>';
        } else {
            // Desain 1 Kolom (Checked) untuk Production & Foregoing
            $namaApprover = '';
            if (!empty($alldata)) {
                $supervisor = $alldata[0]['supervisor'] ?? '';
                $leader     = $alldata[0]['leader'] ?? '';
                $foreman    = $alldata[0]['foreman'] ?? '';
                
                // Cari jabatan tertinggi yang sudah approve
                if (!empty($supervisor)) { $namaApprover = $supervisor; } 
                elseif (!empty($leader)) { $namaApprover = $leader; } 
                elseif (!empty($foreman)) { $namaApprover = $foreman; }
            }
            
            $ttd = $namaApprover !== '' ? '<span style="font-size: 8px;">Approved by:<br><b>' . htmlspecialchars($namaApprover) . '</b></span>' : '';
            
            $kotakTtdHtml = '
                <tr><td colspan="2" style="text-align: center; vertical-align: middle; padding: 2px;">Checked</td></tr>
                <tr><td colspan="2" style="text-align: center; height: 25px; vertical-align: bottom; padding: 2px;">' . $ttd . '</td></tr>';
        }

        // 4. Rakit HTML Utama
        return '
        <table style="width: 100%; border: none; font-size: 9px; table-layout: fixed; margin-bottom: 5px;">
            <tr>
                <td style="width: 35%; vertical-align: top; border: none; padding: 0;">
                    PT. FOXCONN TECHNOLOGIES INDONESIA<br>Production Engineering Department<br>Process Engineering Section<br>
                    <b>' . htmlspecialchars($namaProduk) . '</b>
                </td>
                <td style="width: 40%; text-align: center; vertical-align: top; border: none; padding: 0;">
                    <b style="font-size: 12px; text-decoration: underline;">' . htmlspecialchars($judulProses) . '</b><br>
                    <span style="font-size: 10px;">(' . htmlspecialchars($namaProduk) . ')</span>
                </td>
                <td style="width: 25%; text-align: right; vertical-align: top; border: none; padding: 0;">
                    <table style="width: 100%; border-collapse: collapse; font-size: 8px;" border="1">
                        <tr><td style="width: 40%; text-align: left; padding: 2px;">No. Dok / No.</td><td style="text-align: left; padding: 2px;">: ' . htmlspecialchars($noDok) . '</td></tr>
                        <tr><td style="text-align: left; padding: 2px;">Revisi</td><td style="text-align: left; padding: 2px;">: ' . htmlspecialchars($revisi) . '</td></tr>
                        <tr><td style="text-align: left; padding: 2px;">Berlaku</td><td style="text-align: left; padding: 2px;">: ' . htmlspecialchars($tglBerlaku) . '</td></tr>
                        ' . $kotakTtdHtml . '
                    </table>
                </td>
            </tr>
        </table>
        <div style="font-size: 9px; text-align: left;">
            MACHINE No &nbsp;&nbsp;&nbsp;: ' . htmlspecialchars($machNo) . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AG Paste Type &nbsp;&nbsp;: 
        </div>';
    }


    // =========================================================================
    // JALUR EXCEL: FUNGSI KHUSUS EXCEL (JUGA BRUTAL CHUNKING)
    // =========================================================================

    // Tambahkan $model, $lotno, $machno di ujung parameternya
    private function resolveExportContextExcel(string $typeProcess, string $process, string $device, string $dateStart, string $dateEnd, string $model = '', string $lotno = '', string $machno = ''): array
    {
        $alldata = [];
        // Pastikan variabel diteruskan ke getAll()
        if ($typeProcess === 'production') {
            $alldata = $this->ProductionModel->getAll($dateStart, $dateEnd, $process, $model, $lotno, $machno);
        } elseif ($typeProcess === 'foregoing') {
            $alldata = $this->ForegoingModel->getAll($dateStart, $dateEnd, $device, $process, $model, $lotno, $machno);
        } else {
            $alldata = $this->StartupModel->getAll($dateStart, $dateEnd, $device, $process, $model, $lotno, $machno);
        }

        $prosesInfo = $this->getProsesInfo($process);
        $deviceInfo = $this->getDeviceInfo($device);

        $namaProduk = $deviceInfo['name'] ?? strtoupper($device);
        $namaProsesRaw = $prosesInfo['name'] ?? strtoupper($process);

        if ($typeProcess === 'production') {
            $cleanName = trim(preg_replace('/^(Production\s+Process\s+Control\s+Sheet|Production\s+Control\s+Sheet|Produciton\s+Control\s+Sheet\s+of|Produciton\s+Control\s+Sheet)\s*/i', '', $namaProsesRaw));
            $judulProses = 'Production Process Control Sheet ' . $cleanName;
        } elseif ($typeProcess === 'startup') {
            $cleanName = trim(preg_replace('/\s*Start\s*Up\s*Check\s*Sheet.*$/i', '', $namaProsesRaw));
            $judulProses = $cleanName . ' Start Up Check Sheet';
        } else {
            $judulProses = $namaProsesRaw;
        }

        $noDok = $prosesInfo['docno'] ?? ('FF-' . strtoupper(explode('-', $process)[2] ?? '001') . '-001');
        
        // Mencegah error jika data Excel kosong
        $machNo = !empty($alldata) ? ($alldata[0]['machno'] ?? '') : '';
        return [$alldata, $namaProduk, $judulProses, $noDok, $machNo, $prosesInfo];
    }

    private function countHeaderRowsExcel(array $grid): int
    {
        $startRow = 1;
        while ($startRow <= $grid['totalRows']) {
            $rowOrigins = $grid['origins'][$startRow] ?? [];
            if (count($rowOrigins) === 1 && reset($rowOrigins)['colspan'] === $grid['totalCols']) {
                $startRow++; 
                continue;
            }
            break;
        }
        
        $firstCell = null;
        for ($c = 1; $c <= $grid['totalCols']; $c++) {
            if (isset($grid['origins'][$startRow][$c])) {
                $firstCell = $grid['origins'][$startRow][$c];
                break;
            }
        }

        if ($firstCell) {
            return ($startRow - 1) + max(1, $firstCell['rowspan']);
        }
        return max(1, $startRow);
    }

    private function findRealHeaderStartRowExcel(array $grid, int $headerRowCount): int
    {
        for ($r = 1; $r <= $headerRowCount; $r++) {
            $rowOrigins = $grid['origins'][$r] ?? [];
            if (count($rowOrigins) === 1) {
                $only = reset($rowOrigins);
                if ($only['colspan'] === $grid['totalCols']) {
                    continue; 
                }
            }
            return $r;
        }
        return 1;
    }

    private function countIdentityColumnsExcel(array $grid, int $headerRowCount): int
    {
        $startRow = $this->findRealHeaderStartRowExcel($grid, $headerRowCount);
        $requiredSpan = $headerRowCount - $startRow + 1;
        $count = 0;
        $c = 1;
        while ($c <= $grid['totalCols']) {
            $origin = $grid['origins'][$startRow][$c] ?? null;
            if ($origin === null || $origin['rowspan'] < $requiredSpan) {
                break;
            }
            $count += $origin['colspan'];
            $c += $origin['colspan'];
        }
        return $count;
    }

    private function insertKopSuratToSheetExcel($sheet, string $namaProduk, string $judulProses, string $noDok, string $machNo, int $identityColCount, array $chunksExcel, array $grid, array $alldata, array $prosesInfo, string $typeProcess): int
    {
        // 1. Tarik Tanggal & Revisi 
        $revisiValue = !empty($prosesInfo['revisi']) ? $prosesInfo['revisi'] : 0;
        $revisi = str_pad($revisiValue, 2, '0', STR_PAD_LEFT);
        
        $tglBerlaku = '-';
        $timestamp = 0;
        if (!empty($prosesInfo['berlaku']) && $prosesInfo['berlaku'] !== '0000-00-00') {
            $timestamp = strtotime($prosesInfo['berlaku']);
        } else {
            $db = \Config\Database::connect();
            $dataPertama = $db->table($typeProcess)->where('process', $prosesInfo['process_code'] ?? '')->orderBy('created_at', 'ASC')->limit(1)->get()->getRowArray();
            if (!empty($dataPertama['created_at'])) $timestamp = strtotime($dataPertama['created_at']);
        }
        if ($timestamp !== false && $timestamp > 0) {
            $bulanIndo = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            $tglBerlaku = date('d', $timestamp) . ' ' . $bulanIndo[date('n', $timestamp) - 1] . ' ' . date('Y', $timestamp);
        }

        $dokText = "No. Dok / No. : " . $noDok . "\nRevisi : " . $revisi . "\nBerlaku : " . $tglBerlaku . "\nChecked : ________";
        if ($typeProcess === 'startup') {
            $dokText = "No. Dok / No. : " . $noDok . "\nRevisi : " . $revisi . "\nBerlaku : " . $tglBerlaku . "\nQC / Production";
        }

        $idCol = max(1, $identityColCount);
        $idLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($idCol);

        // KIRI: Perusahaan (Cukup taruh di awal, Excel akan mengulangnya otomatis)
        $sheet->setCellValue('A1', "PT. FOXCONN TECHNOLOGIES INDONESIA\nProduction Engineering Department\nProcess Engineering Section\n" . $namaProduk);
        $sheet->mergeCells("A1:{$idLetter}3");
        $sheet->getStyle('A1')->getAlignment()->setWrapText(true)->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(9);
        
        $sheet->setCellValue('A4', "MACHINE No : " . $machNo . "      AG Paste Type : ");
        $sheet->mergeCells("A4:{$idLetter}4");
        $sheet->getStyle('A4')->getFont()->setBold(true)->setSize(9);

        // KANAN & TENGAH: Loop tiap potongan halaman biar muncul di setiap lembar Print
        foreach ($chunksExcel as $idx => $chunk) {
            $sc = $chunk[0];
            $ec = $chunk[1];
            if ($sc > $ec) continue;
            
            // Lebarkan area kotak dokumen (Minimal 3-4 kolom agar tidak sempit)
            $width = $ec - $sc + 1;
            $docWidth = ($width >= 5) ? 4 : (($width >= 3) ? 3 : 2); 
            $docColStart = max($sc, $ec - $docWidth + 1);
            
            $docStartLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($docColStart);
            $ecLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($ec);

            // Kotak Dokumen (Kanan)
            $sheet->setCellValue("{$docStartLetter}1", $dokText);
            if ($ec > $docColStart) {
                $sheet->mergeCells("{$docStartLetter}1:{$ecLetter}3");
            }
            $sheet->getStyle("{$docStartLetter}1")->getAlignment()->setWrapText(true)
                  ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT)
                  ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
            
            // Judul (Tengah)
            $midStartCol = ($sc <= $idCol) ? $idCol + 1 : $sc;
            if ($midStartCol < $docColStart) {
                $midStartLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($midStartCol);
                $midEndLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($docColStart - 1);
                
                $sheet->setCellValue("{$midStartLetter}1", $judulProses . "\n(" . $namaProduk . ")");
                if (($docColStart - 1) > $midStartCol) {
                    $sheet->mergeCells("{$midStartLetter}1:{$midEndLetter}3");
                }
                $sheet->getStyle("{$midStartLetter}1")->getAlignment()->setWrapText(true)
                      ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
                      ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $sheet->getStyle("{$midStartLetter}1")->getFont()->setBold(true)->setSize(11)->setUnderline(true);
            }
            
            // Garis Bawah Kop
            $scLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($sc);
            $sheet->getStyle("{$scLetter}1:{$ecLetter}3")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        }

        // Tinggi baris direnggangkan
        for ($r=1; $r<=3; $r++) $sheet->getRowDimension($r)->setRowHeight(18);
        $sheet->getRowDimension(4)->setRowHeight(20);

        return 5; 
    }

    private function fillExcelFromGridExcel(array $grid, Worksheet $sheet, int $startRow, int $headerRowCount, int $identityColCount, array $chunksExcel): void
    {
        foreach ($grid['origins'] as $r => $rowCells) {
            foreach ($rowCells as $c => $cell) {
                $row = $startRow + $r - 1;
                $endCol = $c + $cell['colspan'] - 1;
                $endRow = $row + $cell['rowspan'] - 1;

                $overlaps = [];
                if ($c <= $identityColCount) {
                    $overlaps[] = [$c, min($endCol, $identityColCount)];
                }
                foreach ($chunksExcel as $chunk) {
                    $overlapStart = max($c, $chunk[0]);
                    $overlapEnd = min($endCol, $chunk[1]);
                    if ($overlapStart <= $overlapEnd) {
                        $overlaps[] = [$overlapStart, $overlapEnd];
                    }
                }
                
                if (empty($overlaps)) { $overlaps[] = [$c, $endCol]; }
                
                foreach ($overlaps as $overlap) {
                    $sc = $overlap[0];
                    $ec = $overlap[1];
                    $scLetter = Coordinate::stringFromColumnIndex($sc);
                    $ecLetter = Coordinate::stringFromColumnIndex($ec);
                    
                    $coord = $scLetter . $row;
                    $sheet->setCellValue($coord, $cell['value']);
                    
                    if ($ec > $sc || $cell['rowspan'] > 1) {
                        $sheet->mergeCells("{$coord}:{$ecLetter}{$endRow}");
                    }
                    
                    $style = $sheet->getStyle("{$coord}:{$ecLetter}{$endRow}");
                    $style->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                    $style->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER)->setWrapText(true);
                          
                    if ($r <= $headerRowCount) {
                        $style->getFont()->setBold(true);
                        $style->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('F8F9FA');
                    }
                }
            }
        }
    }

    // --- FUNGSI 1: Pembuat Kop Surat Vertikal ---
    private function insertKopSuratVertical($sheet, int $startRow, int $totalColsInBlock, string $namaProduk, string $judulProses, string $noDok, string $machNo, array $prosesInfo, string $typeProcess) {
        $revisiValue = !empty($prosesInfo['revisi']) ? $prosesInfo['revisi'] : 0;
        $revisi = str_pad($revisiValue, 2, '0', STR_PAD_LEFT);
        
        $tglBerlaku = '-';
        if (!empty($prosesInfo['berlaku']) && $prosesInfo['berlaku'] !== '0000-00-00') {
            $timestamp = strtotime($prosesInfo['berlaku']);
        } else {
            $db = \Config\Database::connect();
            $dataPertama = $db->table($typeProcess)->where('process', $prosesInfo['process_code'] ?? '')->orderBy('created_at', 'ASC')->limit(1)->get()->getRowArray();
            if (!empty($dataPertama['created_at'])) $timestamp = strtotime($dataPertama['created_at']);
        }
        if (isset($timestamp) && $timestamp !== false && $timestamp > 0) {
            $bulanIndo = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            $tglBerlaku = date('d', $timestamp) . ' ' . $bulanIndo[date('n', $timestamp) - 1] . ' ' . date('Y', $timestamp);
        }

        $r1 = $startRow; $r2 = $startRow + 1; $r3 = $startRow + 2; $r4 = $startRow + 3;

        // --- KIRI: Identitas Perusahaan ---
        $sheet->setCellValue("A{$r1}", "PT. FOXCONN TECHNOLOGIES INDONESIA\nProduction Engineering Department\nProcess Engineering Section\n" . $namaProduk);
        $sheet->mergeCells("A{$r1}:C{$r3}");
        $sheet->getStyle("A{$r1}")->getAlignment()->setWrapText(true)->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
        $sheet->getStyle("A{$r1}")->getFont()->setBold(true)->setSize(9);
        
        $sheet->setCellValue("A{$r4}", "MACHINE No : " . $machNo . "      AG Paste Type : ");
        $sheet->mergeCells("A{$r4}:E{$r4}");
        $sheet->getStyle("A{$r4}")->getFont()->setBold(true)->setSize(9);

        // --- KANAN: Tabel Dokumen Control (Dibuat Kotak-kotak Bergaris) ---
        // Alokasikan minimal 2-3 kolom terakhir untuk tabel ini
        $docEndCol = $totalColsInBlock;
        $docStartCol = max(4, $totalColsInBlock - 2); 
        $docStartLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($docStartCol);
        $docMidLetter   = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($docStartCol + 1);
        $docEndLetter   = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($docEndCol);

        $sheet->setCellValue("{$docStartLetter}{$r1}", "No. Dok / No.");
        $sheet->setCellValue("{$docMidLetter}{$r1}", ": " . $noDok);
        $sheet->setCellValue("{$docStartLetter}{$r2}", "Revisi");
        $sheet->setCellValue("{$docMidLetter}{$r2}", ": " . $revisi);
        $sheet->setCellValue("{$docStartLetter}{$r3}", "Berlaku");
        $sheet->setCellValue("{$docMidLetter}{$r3}", ": " . $tglBerlaku);

        // Gabungkan kolom value (Mid sampai End)
        if ($docEndCol > $docStartCol + 1) {
            $sheet->mergeCells("{$docMidLetter}{$r1}:{$docEndLetter}{$r1}");
            $sheet->mergeCells("{$docMidLetter}{$r2}:{$docEndLetter}{$r2}");
            $sheet->mergeCells("{$docMidLetter}{$r3}:{$docEndLetter}{$r3}");
        }

        if ($typeProcess === 'startup') {
            $sheet->setCellValue("{$docStartLetter}{$r4}", "QC");
            $sheet->setCellValue("{$docMidLetter}{$r4}", "Production");
            if ($docEndCol > $docStartCol + 1) $sheet->mergeCells("{$docMidLetter}{$r4}:{$docEndLetter}{$r4}");
            $sheet->getStyle("{$docStartLetter}{$r4}:{$docEndLetter}{$r4}")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        } else {
            $sheet->setCellValue("{$docStartLetter}{$r4}", "Checked");
            $sheet->mergeCells("{$docStartLetter}{$r4}:{$docEndLetter}{$r4}");
            $sheet->getStyle("{$docStartLetter}{$r4}")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        }

        // Terapkan Border Kotak ke Tabel Kanan
        $boxStyle = $sheet->getStyle("{$docStartLetter}{$r1}:{$docEndLetter}{$r4}");
        $boxStyle->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $boxStyle->getFont()->setSize(9);
        $sheet->getStyle("{$docStartLetter}{$r1}:{$docStartLetter}{$r3}")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

        // --- TENGAH: Judul Proses (Tampil KECUALI di Startup) ---
        if ($typeProcess !== 'startup' && $docStartCol > 4) {
            $midEndLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($docStartCol - 1);
            $sheet->setCellValue("D{$r1}", $judulProses . "\n(" . $namaProduk . ")");
            $sheet->mergeCells("D{$r1}:{$midEndLetter}{$r3}");
            $sheet->getStyle("D{$r1}")->getAlignment()->setWrapText(true)->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle("D{$r1}")->getFont()->setBold(true)->setSize(11)->setUnderline(true);
        }

        // Garis bawah Kop untuk area kiri sampai sebelum Tabel Dokumen
        $leftToMid = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(max(1, $docStartCol - 1));
        $sheet->getStyle("A{$r1}:{$leftToMid}{$r3}")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        
        for ($r=$r1; $r<=$r3; $r++) $sheet->getRowDimension($r)->setRowHeight(18);
        $sheet->getRowDimension($r4)->setRowHeight(20);
    }

    private function writeBlockFromGrid(array $grid, $sheet, int $startRow, int $identityColCount, int $sc, int $ec) {
        foreach ($grid['origins'] as $r => $rowCells) {
            $targetRow = $startRow + $r - 1;
            foreach ($rowCells as $c => $cell) {
                $targetCol = 0;
                // Masukkan Kolom Utama (Identitas Kiri)
                if ($c <= $identityColCount) { $targetCol = $c; } 
                // Masukkan Kolom Data (Sesuai potongan/batas yang diizinkan)
                else if ($c >= $sc && $c <= $ec) { $targetCol = $identityColCount + ($c - $sc + 1); }

                if ($targetCol > 0) {
                    $cellLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($targetCol);
                    $coord = $cellLetter . $targetRow;
                    
                    $val = html_entity_decode(strip_tags($cell['value'] ?? ''));
                    $sheet->setCellValue($coord, $val);
                    
                    $colspan = $cell['colspan'] ?? 1;
                    $rowspan = $cell['rowspan'] ?? 1;
                    
                    // Akali Colspan jika judul header kepanjangan melewati batas potongan
                    $actualColspan = 1;
                    if ($c <= $identityColCount) {
                        $actualColspan = (($c + $colspan - 1) > $identityColCount) ? ($identityColCount - $c + 1 + ($ec - $sc + 1)) : $colspan;
                    } else if ($c >= $sc && $c <= $ec) {
                        $actualColspan = (($c + $colspan - 1) > $ec) ? ($ec - $c + 1) : $colspan;
                    }

                    if ($actualColspan > 1 || $rowspan > 1) {
                        $endColLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($targetCol + $actualColspan - 1);
                        $endRow = $targetRow + $rowspan - 1;
                        $sheet->mergeCells("{$coord}:{$endColLetter}{$endRow}");
                    }
                    
                    $style = $sheet->getStyle($coord);
                    $style->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $style->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)->setWrapText(true);
                    
                    if (isset($cell['isHeader']) && $cell['isHeader']) {
                        $style->getFont()->setBold(true);
                        $style->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFF2F2F2');
                    }
                }
            }
        }
    }

    // =========================================================================
    // EXPORT METHOD INTI
    // =========================================================================

    public function exportExcel()
    {
        $typeProcess = $this->request->getGet('typeProcess');
        $process     = $this->request->getGet('process');
        $device      = $this->request->getGet('device');

        $rawStart = $this->request->getGet('dateStart');
        $rawEnd   = $this->request->getGet('dateEnd');
        $dateStart = $rawStart ? date('Y-m-d', strtotime($rawStart)) : '';
        $dateEnd   = $rawEnd ? date('Y-m-d', strtotime($rawEnd)) : '';

        $model = $this->request->getGet('model') ?? '';
        $lotno = $this->request->getGet('lotno') ?? '';
        $machno = $this->request->getGet('machno') === 'null' ? '' : ($this->request->getGet('machno') ?? '');

        [$alldata, $namaProduk, $judulProses, $noDok, $machNo, $prosesInfo] = $this->resolveExportContextExcel($typeProcess, $process, $device, $dateStart, $dateEnd, $model, $lotno, $machno);

        $_SERVER['REQUEST_URI'] = 'exportExcel';
        $viewPath = "/layout/" . $device . "/history/" . $typeProcess . "/" . $process;
        try { $htmlString = view($viewPath, ['alldata' => $alldata]); } catch (\Exception $e) { die("Error: File View tidak ditemukan!"); }

        $tableElement = $this->extractTableElement($htmlString, 'table1');
        if ($tableElement === null) die("Error: table1 tidak ditemukan");

        $grid = $this->buildGrid($tableElement);
        $headerRowCount = $this->countHeaderRows($grid);
        $identityColCount = $this->countIdentityColumns($grid, $headerRowCount);
        
        $maxCol = max(1, $grid['totalCols']);

        // --- RULE BARU: Penentuan Orientasi & Pemotongan Berdasarkan Type ---
        $orientation = ($typeProcess === 'startup') ? 'portrait' : 'landscape';
        
        if ($orientation === 'portrait') {
            // FIX BUG STARTUP: Jangan dipotong ke samping. Biarkan 1 tabel utuh panjang ke bawah
            $chunksExcel = [[1, $maxCol]]; 
        } else {
            // PRODUCTION/FOREGOING: Tabel panjang dipotong-potong
            $maxColsPerPage = self::PDF_MAX_COLS_LANDSCAPE ?? 12;
            $dataColsPerPage = max(1, $maxColsPerPage - $identityColCount);
            $chunksExcel = $this->computeColumnChunks($maxCol, $identityColCount, $dataColsPerPage);
        }

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $currentRowOffset = 1;
        $globalMaxCols = 0;

        foreach ($chunksExcel as $idx => $chunk) {
            $sc = $chunk[0];
            $ec = $chunk[1];
            $totalColsInBlock = $identityColCount + ($ec - $sc + 1);
            if ($totalColsInBlock > $globalMaxCols) $globalMaxCols = $totalColsInBlock;

            $this->insertKopSuratVertical($sheet, $currentRowOffset, $totalColsInBlock, $namaProduk, $judulProses, $noDok, $machNo, $prosesInfo, $typeProcess);
            
            $tableStartRow = $currentRowOffset + 4; 
            $this->writeBlockFromGrid($grid, $sheet, $tableStartRow, $identityColCount, $sc, $ec);
            
            $currentRowOffset = $tableStartRow + $grid['totalRows'] + 3;
            if ($orientation === 'landscape') {
                $sheet->setBreak('A' . ($currentRowOffset - 2), \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet::BREAK_ROW);
            }
        }

        // --- SETTING KERTAS FINAL ---
        $sheet->getPageSetup()->setOrientation($orientation === 'portrait' ? \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT : \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
        
        // Aturan Emas Excel: Paksa muat secara horizontal (FitToWidth=1), Bebas memanjang ke bawah (FitToHeight=0)
        $sheet->getPageSetup()->setFitToPage(true);
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0); 
        $sheet->getPageMargins()->setTop(0.5)->setRight(0.3)->setLeft(0.3)->setBottom(0.5);

        // Jika Startup, set kolom agar judul tidak terlalu mepet
        if ($typeProcess === 'startup') {
            $sheet->getColumnDimension('A')->setWidth(5);
            $sheet->getColumnDimension('B')->setWidth(30);
            $sheet->getColumnDimension('C')->setWidth(20);
        } else {
            $sheet->getColumnDimension('A')->setWidth(5);
            $sheet->getColumnDimension('B')->setWidth(15);
            $sheet->getColumnDimension('C')->setWidth(12);
            $sheet->getColumnDimension('D')->setWidth(15);
            for ($col = 5; $col <= $globalMaxCols; $col++) {
                $colLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col);
                $sheet->getColumnDimension($colLetter)->setWidth(11);
            }
        }

        $fileName = 'Report_' . $typeProcess . '_' . $process . '_' . date('Ymd_Hi') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit();
    }

    public function exportPDF()
    {
        $typeProcess = $this->request->getGet('typeProcess');
        $process     = $this->request->getGet('process');
        $device      = $this->request->getGet('device');

        $rawStart = $this->request->getGet('dateStart');
        $rawEnd   = $this->request->getGet('dateEnd');
        $dateStart = $rawStart ? date('Y-m-d', strtotime($rawStart)) . ' 00:00:00' : '';
        $dateEnd   = $rawEnd ? date('Y-m-d', strtotime($rawEnd)) . ' 23:59:59' : '';

        // TANGKAP FILTER BARU
        $model = $this->request->getGet('model') ?? '';
        $lotno = $this->request->getGet('lotno') ?? '';
        $machno = $this->request->getGet('machno');
        if ($machno === 'null' || $machno === null) { $machno = ''; }

        // KIRIM SELURUH PARAMETER
        [$alldata, $namaProduk, $judulProses, $noDok, $machNo, $prosesInfo] = $this->resolveExportContext($typeProcess, $process, $device, $dateStart, $dateEnd, $model, $lotno, $machno);

        $_SERVER['REQUEST_URI'] = 'exportPDF';
        $viewPath = "/layout/" . $device . "/history/" . $typeProcess . "/" . $process;
        try {
            $htmlString = view($viewPath, ['alldata' => $alldata]);
        } catch (\Exception $e) {
            die("Error: File View " . $viewPath . " tidak ditemukan!");
        }

        $tableElement = $this->extractTableElement($htmlString, 'table1');
        if ($tableElement === null) {
            die("Error: <table id=\"table1\"> tidak ditemukan di view " . $viewPath);
        }

        $grid = $this->buildGrid($tableElement);
        $headerRowCount = $this->countHeaderRows($grid);
        $identityColCount = $this->countIdentityColumns($grid, $headerRowCount);
        
        $unsafeRowBoundaries = $this->computeUnsafeRowBoundaries($grid, $headerRowCount);

        $orientation = $this->decideOrientation($grid['totalCols']);
        
        $maxColsPerPage = $orientation === 'landscape' ? self::PDF_MAX_COLS_LANDSCAPE : self::PDF_MAX_COLS_PORTRAIT;
        $maxRowsPerPage = $orientation === 'landscape' ? self::PDF_MAX_ROWS_LANDSCAPE : self::PDF_MAX_ROWS_PORTRAIT;

        $dataColsPerPage = max(1, $maxColsPerPage - $identityColCount);
        
       $colChunks = $this->computeColumnChunks($grid['totalCols'], $identityColCount, $dataColsPerPage);
        $rowChunks = $this->computeRowChunks($grid['totalRows'], $headerRowCount, $unsafeRowBoundaries, $maxRowsPerPage);

       // FIX: Kirimkan alldata, prosesinfo, dan typeProcess ke kop surat
        $kopSuratHtml = $this->buildKopSuratHtml($namaProduk, $judulProses, $noDok, $machNo, $alldata, $prosesInfo, $typeProcess);

        $pagesHtml = '';
        $chunkCount = 0;
        
        // Z-PATTERN: ROW DI LUAR, COLUMN DI DALAM
        foreach ($rowChunks as $j => $rRange) {
            foreach ($colChunks as $i => $cRange) {
                $pageBreakStyle = ($chunkCount > 0) ? ' style="page-break-before: always;"' : '';
                $tableHtml = $this->build2DChunkTableHtml($grid, $identityColCount, $cRange, $headerRowCount, $rRange);
                
                $pagesHtml .= "<div{$pageBreakStyle}>\n{$tableHtml}\n</div>";
                $chunkCount++;
            }
        }

        // MARGIN 30PX KIRI-KANAN-BAWAH DAN KOP SURAT FIXED POSITION
        $customCSS = '
        <style>
            @page { 
                size: A4 ' . $orientation . '; 
                margin-top: 140px; 
                margin-bottom: 30px;
                margin-left: 30px; 
                margin-right: 30px; 
            }
            body { font-family: Arial, Helvetica, sans-serif; font-size: 7px; }
            header {
                position: fixed;
                top: -125px;
                left: 0px;
                right: 0px;
                height: 110px;
            }
            table.table-cs { width: 100%; border-collapse: collapse; border: 1px solid black; }
            table.table-cs td, table.table-cs th { border: 1px solid black !important; padding: 3px !important; text-align: center; vertical-align: middle; word-wrap: break-word; }
            th { background-color: #f8f9fa; font-weight: bold; }
            tr { page-break-inside: avoid; }
        </style>';

        $finalHtml = "
        <html>
        <head>{$customCSS}</head>
        <body>
            <header>{$kopSuratHtml}</header>
            <main>{$pagesHtml}</main>
        </body>
        </html>";

        $options = new \Dompdf\Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'Arial');

        $dompdf = new \Dompdf\Dompdf($options);
        $dompdf->loadHtml($finalHtml);
        $dompdf->setPaper('A4', $orientation);
        $dompdf->render();

        $fileName = 'Report_' . strtoupper($process) . '_' . date('Ymd_Hi') . '.pdf';
        $dompdf->stream($fileName, array("Attachment" => true));
        exit();
    }
}