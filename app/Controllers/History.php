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

    // Batas PDF dibiarkan persis seperti versi yang sempurna
    private const PDF_MAX_COLS_LANDSCAPE = 13;
    private const PDF_MAX_COLS_PORTRAIT = 8;

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
            if ($origin === null || $origin['rowspan'] < $requiredSpan) {
                break;
            }
            $count += $origin['colspan'];
            $c += $origin['colspan'];
        }
        
        // Memastikan selalu ada minimal 4 kolom awal yang terkunci
        if ($count < 4) {
            $count = min(4, max(1, $grid['totalCols'] - 1));
        }
        
        return $count;
    }

    private function computeUnsafeBoundaries(array $grid, int $headerRowCount): array
    {
        $unsafe = [];
        for ($r = 1; $r <= $headerRowCount; $r++) {
            foreach ($grid['origins'][$r] ?? [] as $c => $cell) {
                if ($cell['colspan'] > 1 && $cell['colspan'] < $grid['totalCols']) {
                    for ($p = $c; $p < $c + $cell['colspan'] - 1; $p++) {
                        $unsafe[$p] = true; 
                    }
                }
            }
        }
        return $unsafe;
    }

    private function computeColumnChunks(int $totalCols, int $identityColCount, array $unsafeBoundaries, int $dataColsPerPage): array
    {
        $chunks = [];
        $start = $identityColCount + 1;

        while ($start <= $totalCols) {
            $target = min($totalCols, $start + $dataColsPerPage - 1);
            $end = $target;

            while ($end > $start && !empty($unsafeBoundaries[$end])) {
                $end--;
            }
            if ($end === $start && !empty($unsafeBoundaries[$end])) {
                $end = $target;
                while ($end < $totalCols && !empty($unsafeBoundaries[$end])) {
                    $end++;
                }
            }

            $chunks[] = [$start, $end];
            $start = $end + 1;
        }

        return $chunks ?: [[$identityColCount + 1, $totalCols]];
    }

    // LOGIKA EXCEL TERBARU: Kop Surat dibangun ulang di setiap "Chunk" (potongan halaman)
    // agar selalu membentang dari kiri ke kanan dengan rapi tanpa tumpang tindih.
    private function insertKopSuratToSheet(Worksheet $sheet, string $namaProduk, string $judulProses, string $noDok, string $machNo, int $identityColCount, array $chunksExcel): int
    {
        // 1. Area Identitas (Sisi Kiri yang terkunci di setiap halaman)
        $idLetter = Coordinate::stringFromColumnIndex($identityColCount);
        $sheet->setCellValue('A1', "PT. FOXCONN TECHNOLOGIES INDONESIA\nProduction Engineering Department\nProcess Engineering Section\n" . $namaProduk);
        $sheet->mergeCells("A1:{$idLetter}4");
        $sheet->getStyle('A1')->getAlignment()->setWrapText(true)->setVertical(Alignment::VERTICAL_TOP);
        $sheet->getStyle('A1')->getFont()->setBold(true);
        
        $sheet->setCellValue('A5', "MACHINE No : " . $machNo);
        $sheet->mergeCells("A5:{$idLetter}5");
        $sheet->getStyle('A5')->getFont()->setBold(true);
        $sheet->getStyle("A5:{$idLetter}5")->getBorders()->getBottom()->setBorderStyle(Border::BORDER_THIN);

        // 2. Area Data (Sisi Kanan yang terpotong-potong)
        // Di sini kita mencetak ulang Judul dan No Dokumen di setiap bagian potongan kertas!
        foreach ($chunksExcel as $chunk) {
            $startCol = $chunk[0];
            $endCol = $chunk[1];
            
            $midPoint = $startCol + floor(($endCol - $startCol) / 2);
            $startLetter = Coordinate::stringFromColumnIndex($startCol);
            $midLetter = Coordinate::stringFromColumnIndex($midPoint);
            $nextMidLetter = Coordinate::stringFromColumnIndex($midPoint + 1);
            $endLetter = Coordinate::stringFromColumnIndex($endCol);

            // Tengah: Judul
            $sheet->setCellValue("{$startLetter}1", $judulProses . "\n(" . $namaProduk . ")");
            $sheet->mergeCells("{$startLetter}1:{$midLetter}4");
            $sheet->getStyle("{$startLetter}1")->getAlignment()
                ->setWrapText(true)->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
            $sheet->getStyle("{$startLetter}1")->getFont()->setBold(true)->setSize(11)->setUnderline(true);

            // Kanan: Dokumen Info
            $dokText = "No. Dok : " . $noDok . "\nRevisi : 12\nBerlaku : 11 Mei 2026\nChecked : ________________";
            if ($endCol > $midPoint) {
                $sheet->setCellValue("{$nextMidLetter}1", $dokText);
                $sheet->mergeCells("{$nextMidLetter}1:{$endLetter}4");
                $sheet->getStyle("{$nextMidLetter}1")->getAlignment()
                    ->setWrapText(true)->setHorizontal(Alignment::HORIZONTAL_RIGHT)->setVertical(Alignment::VERTICAL_TOP);
            } else {
                 $sheet->setCellValue("{$startLetter}1", $judulProses . "\n\n" . $dokText);
            }

            // Bawah Kanan: AG Paste
            $sheet->setCellValue("{$startLetter}5", "AG Paste Type : ");
            $sheet->mergeCells("{$startLetter}5:{$endLetter}5");
            $sheet->getStyle("{$startLetter}5")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
            $sheet->getStyle("{$startLetter}5")->getFont()->setBold(true);
            $sheet->getStyle("{$startLetter}5:{$endLetter}5")->getBorders()->getBottom()->setBorderStyle(Border::BORDER_THIN);
        }

        // Fix Tinggi Baris
        for ($r = 1; $r <= 4; $r++) { $sheet->getRowDimension($r)->setRowHeight(15); }
        $sheet->getRowDimension(5)->setRowHeight(18);

        return 6;
    }

    // LOGIKA EXCEL TERBARU: Membelah Cell Gabungan Raksasa (seperti judul "LD DIE BONDING 2 MACHINE")
    // agar tulisan tidak hilang saat kertas dipotong ke halaman berikutnya.
    private function fillExcelFromGrid(array $grid, Worksheet $sheet, int $startRow, int $headerRowCount, int $identityColCount, array $chunksExcel): void
    {
        foreach ($grid['origins'] as $r => $rowCells) {
            foreach ($rowCells as $c => $cell) {
                $row = $startRow + $r - 1;
                $endCol = $c + $cell['colspan'] - 1;
                $endRow = $row + $cell['rowspan'] - 1;

                $applyStyle = function($startC, $endC) use ($sheet, $row, $endRow, $r, $headerRowCount) {
                    $sLetter = Coordinate::stringFromColumnIndex($startC);
                    $eLetter = Coordinate::stringFromColumnIndex($endC);
                    $range = "{$sLetter}{$row}:{$eLetter}{$endRow}";
                    
                    $style = $sheet->getStyle($range);
                    $style->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                    $style->getAlignment()
                        ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                        ->setVertical(Alignment::VERTICAL_CENTER)
                        ->setWrapText(true);

                    if ($r <= $headerRowCount) {
                        $style->getFont()->setBold(true);
                        $style->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('F8F9FA');
                    }
                };

                // Jika ada sel yang di-merge panjang ke kanan
                if ($cell['colspan'] > 1) {
                    $overlaps = [];
                    // Cek apakah merge ini ada di area Identitas
                    if ($c <= $identityColCount) {
                        $overlaps[] = [$c, min($endCol, $identityColCount)];
                    }
                    // Cek apakah merge ini membentang melewati batas-batas potongan kertas (Chunks)
                    foreach ($chunksExcel as $chunk) {
                        $overlapStart = max($c, $chunk[0]);
                        $overlapEnd = min($endCol, $chunk[1]);
                        if ($overlapStart <= $overlapEnd) {
                            $overlaps[] = [$overlapStart, $overlapEnd]; // Pisahkan merge-nya!
                        }
                    }

                    // Tulis teks ke setiap belahan merge cell agar tulisan selalu muncul di setiap halaman
                    foreach ($overlaps as $overlap) {
                        $sc = $overlap[0];
                        $ec = $overlap[1];
                        $sLetter = Coordinate::stringFromColumnIndex($sc);
                        $eLetter = Coordinate::stringFromColumnIndex($ec);
                        
                        $sheet->setCellValue($sLetter . $row, $cell['value']);
                        if ($ec > $sc || $cell['rowspan'] > 1) {
                            $sheet->mergeCells("{$sLetter}{$row}:{$eLetter}{$endRow}");
                        }
                        $applyStyle($sc, $ec);
                    }
                } else {
                    $sLetter = Coordinate::stringFromColumnIndex($c);
                    $sheet->setCellValue($sLetter . $row, $cell['value']);
                    if ($cell['rowspan'] > 1) {
                        $sheet->mergeCells("{$sLetter}{$row}:{$sLetter}{$endRow}");
                    }
                    $applyStyle($c, $c);
                }
            }
        }
    }

    // PDF DIBIARKAN SAMA PERSIS TANPA PERUBAHAN
    private function buildChunkTableHtml(array $grid, int $identityColCount, array $chunkRange, int $headerRowCount, string $kopSuratHtml): string
    {
        [$start, $end] = $chunkRange;

        $colMap = [];
        for ($c = 1; $c <= $identityColCount; $c++) {
            $colMap[$c] = count($colMap) + 1;
        }
        for ($c = $start; $c <= $end; $c++) {
            $colMap[$c] = count($colMap) + 1;
        }
        $totalColsInChunk = count($colMap);
        $totalOriginalCols = $grid['totalCols'];

        $renderRow = function (int $r, bool $isHeaderForce = false) use ($grid, $colMap, $totalOriginalCols): string {
            $html = '<tr>';
            foreach ($colMap as $origCol => $newCol) {
                $origin = $grid['origins'][$r][$origCol] ?? null;
                if ($origin === null) {
                    continue; 
                }
                $tag = ($origin['isHeader'] || $isHeaderForce) ? 'th' : 'td';
                $rowspanAttr = $origin['rowspan'] > 1 ? ' rowspan="' . $origin['rowspan'] . '"' : '';

                $effectiveColspan = ($origin['colspan'] === $totalOriginalCols)
                    ? count($colMap)
                    : $origin['colspan'];
                $colspanAttr = $effectiveColspan > 1 ? ' colspan="' . $effectiveColspan . '"' : '';

                $value = htmlspecialchars($origin['value'], ENT_QUOTES, 'UTF-8');
                $html .= "<{$tag}{$rowspanAttr}{$colspanAttr}>{$value}</{$tag}>";
            }
            return $html . '</tr>';
        };

        $thead = '<thead>';
        $thead .= '<tr><td colspan="' . $totalColsInChunk . '" style="border:none; padding:0;">' . $kopSuratHtml . '</td></tr>';
        for ($r = 1; $r <= $headerRowCount; $r++) {
            $thead .= $renderRow($r, true); 
        }
        $thead .= '</thead>';

        $tbody = '<tbody>';
        for ($r = $headerRowCount + 1; $r <= $grid['totalRows']; $r++) {
            $tbody .= $renderRow($r);
        }
        $tbody .= '</tbody>';

        return '<table class="table-cs" border="1" style="table-layout: auto; word-wrap: break-word;">' . $thead . $tbody . '</table>';
    }

    private function buildKopSuratHtml(string $namaProduk, string $judulProses, string $noDok, string $machNo): string
    {
        return '
        <table width="100%" style="margin-bottom: 8px; font-size: 9px; table-layout: auto;">
            <tr>
                <td width="30%" valign="top" style="line-height: 1.2; border: none !important; text-align: left;">
                    PT. FOXCONN TECHNOLOGIES INDONESIA<br>
                    Production Engineering Department<br>
                    Process Engineering Section<br>
                    <b>' . htmlspecialchars($namaProduk) . '</b>
                </td>
                <td width="50%" align="center" valign="top" style="border: none !important;">
                    <b style="font-size: 12px; text-decoration: underline;">' . htmlspecialchars($judulProses) . '</b><br>
                    <span style="font-size: 10px;">(' . htmlspecialchars($namaProduk) . ')</span>
                </td>
                <td width="20%" align="right" valign="top" style="border: none !important;">
                    <table width="100%" border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse; font-size: 8px; text-align: left;">
                        <tr><td width="40%">No. Dok</td><td>: ' . htmlspecialchars($noDok) . '</td></tr>
                        <tr><td>Revisi</td><td>: 12</td></tr>
                        <tr><td>Berlaku</td><td>: 11 Mei 2026</td></tr>
                        <tr><td colspan="2" align="center" style="height: 16px; vertical-align: middle;">Checked</td></tr>
                    </table>
                </td>
            </tr>
        </table>
        <div style="font-size: 9px; margin-bottom: 5px; text-align: left;">
            MACHINE No &nbsp;&nbsp;&nbsp;: ' . htmlspecialchars($machNo) . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            AG Paste Type &nbsp;&nbsp;: 
        </div>
        ';
    }

    private function decideOrientation(int $totalCols): string
    {
        return $totalCols <= 12 ? 'portrait' : 'landscape';
    }

    private function resolveExportContext(string $typeProcess, string $process, string $device, string $dateStart, string $dateEnd): array
    {
        $alldata = [];
        if ($typeProcess === 'production') {
            $alldata = $this->ProductionModel->getAll($dateStart, $dateEnd, $process);
        } elseif ($typeProcess === 'foregoing') {
            $alldata = $this->ForegoingModel->getAll($dateStart, $dateEnd, $device, $process);
        } else {
            $alldata = $this->StartupModel->getAll($dateStart, $dateEnd, $device, $process);
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
        $machNo = $alldata[0]['machno'] ?? '';

        return [$alldata, $namaProduk, $judulProses, $noDok, $machNo];
    }

    public function exportExcel()
    {
        $typeProcess = $this->request->getGet('typeProcess');
        $process     = $this->request->getGet('process');
        $device      = $this->request->getGet('device');

        $rawStart = $this->request->getGet('dateStart');
        $rawEnd   = $this->request->getGet('dateEnd');
        $dateStart = $rawStart ? date('Y-m-d', strtotime($rawStart)) : '';
        $dateEnd   = $rawEnd ? date('Y-m-d', strtotime($rawEnd)) : '';

        [$alldata, $namaProduk, $judulProses, $noDok, $machNo] = $this->resolveExportContext($typeProcess, $process, $device, $dateStart, $dateEnd);

        $_SERVER['REQUEST_URI'] = 'exportExcel';
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
        
        $excelIdentityColCount = max(4, $identityColCount);
        $excelIdentityColCount = min($excelIdentityColCount, max(1, $grid['totalCols'] - 1));

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $maxCol = max(1, $grid['totalCols']);
        
        $unsafeBoundaries = $this->computeUnsafeBoundaries($grid, $headerRowCount);
        $orientation = $this->decideOrientation($maxCol);
        $maxColsPerPageExcel = $orientation === 'landscape' ? 14 : 8;
        $dataColsPerPageExcel = max(1, $maxColsPerPageExcel - $excelIdentityColCount);
        
        // CHUNKS DIHITUNG DI AWAL agar bisa dipakai oleh Kop Surat dan Pemecah Sel Raksasa
        $chunksExcel = $this->computeColumnChunks($grid['totalCols'], $excelIdentityColCount, $unsafeBoundaries, $dataColsPerPageExcel);
        
        // Menyusun Kop Surat Renggang
        $startRow = $this->insertKopSuratToSheet($sheet, $namaProduk, $judulProses, $noDok, $machNo, $excelIdentityColCount, $chunksExcel);
        
        // Menulis Tabel Data + Membelah Judul Panjang
        $this->fillExcelFromGrid($grid, $sheet, $startRow, $headerRowCount, $excelIdentityColCount, $chunksExcel);

        $colWidths = [];
        foreach ($grid['origins'] as $r => $rowCells) {
            foreach ($rowCells as $c => $cell) {
                if ($cell['colspan'] === 1) {
                    $len = strlen((string)$cell['value']) + 2; 
                    if (!isset($colWidths[$c]) || $len > $colWidths[$c]) {
                        $colWidths[$c] = $len;
                    }
                }
            }
        }

        $maxAllowedWidth = 16; 
        for ($c = 1; $c <= $maxCol; $c++) {
            $colLetter = Coordinate::stringFromColumnIndex($c);
            $width = $colWidths[$c] ?? 10; 
            if ($width > $maxAllowedWidth) {
                $width = $maxAllowedWidth; 
            }
            $sheet->getColumnDimension($colLetter)->setWidth($width);
        }

        // Terapkan Manual Page Break tepat setelah batas potongan
        foreach ($chunksExcel as $idx => $chunk) {
            if ($idx < count($chunksExcel) - 1) {
                $breakColIndex = $chunk[1] + 1; 
                if ($breakColIndex <= $maxCol) {
                    $breakLetter = Coordinate::stringFromColumnIndex($breakColIndex);
                    $sheet->setBreak($breakLetter . '1', \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet::BREAK_COLUMN);
                }
            }
        }

        $totalHeaderRowsToRepeat = ($startRow - 1) + $headerRowCount;
        $sheet->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, $totalHeaderRowsToRepeat);
        
        $identityColLetter = Coordinate::stringFromColumnIndex($excelIdentityColCount);
        $sheet->getPageSetup()->setColumnsToRepeatAtLeftByStartAndEnd('A', $identityColLetter);

        $sheet->getPageMargins()->setTop(0.5);
        $sheet->getPageMargins()->setLeft(0.4);
        $sheet->getPageMargins()->setRight(0.4);
        $sheet->getPageMargins()->setBottom(0.5);
        
        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);
        $sheet->getPageSetup()->setOrientation(
            $orientation === 'landscape' ? PageSetup::ORIENTATION_LANDSCAPE : PageSetup::ORIENTATION_PORTRAIT
        );
        $sheet->getPageSetup()->setScale(80); 

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

        [$alldata, $namaProduk, $judulProses, $noDok, $machNo] = $this->resolveExportContext($typeProcess, $process, $device, $dateStart, $dateEnd);

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
        
        $unsafeBoundaries = $this->computeUnsafeBoundaries($grid, $headerRowCount);

        $orientation = $this->decideOrientation($grid['totalCols']);
        $maxColsPerPage = $orientation === 'landscape' ? self::PDF_MAX_COLS_LANDSCAPE : self::PDF_MAX_COLS_PORTRAIT;
        $dataColsPerPage = max(1, $maxColsPerPage - $identityColCount);
        $chunks = $this->computeColumnChunks($grid['totalCols'], $identityColCount, $unsafeBoundaries, $dataColsPerPage);

        $kopSuratHtml = $this->buildKopSuratHtml($namaProduk, $judulProses, $noDok, $machNo);

        $pagesHtml = '';
        foreach ($chunks as $i => $range) {
            $pageBreakStyle = $i > 0 ? ' style="page-break-before: always;"' : '';
            $tableHtml = $this->buildChunkTableHtml($grid, $identityColCount, $range, $headerRowCount, $kopSuratHtml);
            $pagesHtml .= "<div{$pageBreakStyle}>{$tableHtml}</div>";
        }

        $customCSS = '
        <style>
            @page { size: A4 ' . $orientation . '; margin: 12px; }
            body { font-family: Arial, Helvetica, sans-serif; font-size: 7px; }
            table { width: 100%; border-collapse: collapse; }
            table td, table th { border: 1px solid black !important; padding: 2px !important; text-align: center; vertical-align: middle; }
            th { background-color: #f8f9fa; font-weight: bold; }
        </style>';

        $finalHtml = $customCSS . $pagesHtml;

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