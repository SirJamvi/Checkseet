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

    // BATAS DOUBLE AUTO-FIT PDF: Maks 10 Kolom
    private const PDF_MAX_COLS_LANDSCAPE = 10;
    private const PDF_MAX_ROWS_LANDSCAPE = 20;
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

    // Row Boundaries Tetap Dipertahankan: Agar teks tidak terbelah tengah-tengah secara vertikal
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

    // BRUTAL CHUNKING: Tidak ada lagi 'unsafeBoundaries' untuk kolom! Bebas potong per 10 kolom!
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
            
            // Cari batas aman secara vertikal
            while ($end > $start && !empty($unsafeRowBoundaries[$end])) {
                $end--;
            }
            
            // Jika batas amannya kepanjangan, biarkan saja. Dompdf pintar mengurus vertikal break.
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
            $html = '<tr>'; // TR selalu dicetak agar rowspan tabel tidak hancur
            
            if (isset($grid['origins'][$r])) {
                foreach ($grid['origins'][$r] as $c => $origin) {
                    // Logika Baru: Potong colspan otomatis sesuai batas kolom halaman ini!
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

    private function buildKopSuratHtml(string $namaProduk, string $judulProses, string $noDok, string $machNo): string
    {
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
                        <tr><td style="width: 40%; text-align: left; padding: 2px;">No. Dok</td><td style="text-align: left; padding: 2px;">: ' . htmlspecialchars($noDok) . '</td></tr>
                        <tr><td style="text-align: left; padding: 2px;">Revisi</td><td style="text-align: left; padding: 2px;">: 12</td></tr>
                        <tr><td style="text-align: left; padding: 2px;">Berlaku</td><td style="text-align: left; padding: 2px;">: 11 Mei 2026</td></tr>
                        <tr><td colspan="2" style="text-align: center; height: 16px; vertical-align: middle; padding: 2px;">Checked</td></tr>
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

    private function resolveExportContextExcel(string $typeProcess, string $process, string $device, string $dateStart, string $dateEnd): array
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

    private function computeColumnChunksExcel(int $totalCols, int $identityColCount, int $dataColsPerPage): array
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

    private function insertKopSuratToSheetExcel(Worksheet $sheet, string $namaProduk, string $judulProses, string $noDok, string $machNo, int $identityColCount, array $chunksExcel, array $grid): int
    {
        $idCol = max(1, $identityColCount);
        $idLetter = Coordinate::stringFromColumnIndex($idCol);

        $sheet->setCellValue('A1', "PT. FOXCONN TECHNOLOGIES INDONESIA\nProduction Engineering Department\nProcess Engineering Section\n" . $namaProduk);
        $sheet->mergeCells("A1:{$idLetter}3");
        $sheet->getStyle('A1')->getAlignment()->setWrapText(true)->setVertical(Alignment::VERTICAL_TOP);
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(9);

        $sheet->setCellValue('A4', "MACHINE No : " . $machNo . "      AG Paste Type : ");
        $sheet->mergeCells("A4:{$idLetter}4");
        $sheet->getStyle('A4')->getFont()->setBold(true)->setSize(9);

        $hasTitleInGrid = false;
        $firstRow = $grid['origins'][1] ?? [];
        if (count($firstRow) === 1 && reset($firstRow)['colspan'] === $grid['totalCols']) {
            $hasTitleInGrid = true;
        }

        foreach ($chunksExcel as $chunk) {
            $sc = $chunk[0];
            $ec = $chunk[1];
            if ($sc > $ec) continue;
            
            $width = $ec - $sc + 1;
            $docWidth = ($width >= 3) ? 2 : $width; 
            $docColStart = max($sc, $ec - $docWidth + 1);
            
            $docStartLetter = Coordinate::stringFromColumnIndex($docColStart);
            $ecLetter = Coordinate::stringFromColumnIndex($ec);

            $dokText = "No. Dok : " . $noDok . "\nRevisi : 12\nBerlaku : 11 Mei 2026\nChecked : ________";
            $sheet->setCellValue("{$docStartLetter}1", $dokText);
            if ($ec > $docColStart) {
                $sheet->mergeCells("{$docStartLetter}1:{$ecLetter}3");
            }
            $sheet->getStyle("{$docStartLetter}1")->getAlignment()->setWrapText(true)->setHorizontal(Alignment::HORIZONTAL_RIGHT)->setVertical(Alignment::VERTICAL_TOP);
            
            if (!$hasTitleInGrid && $docColStart > $sc) {
                $midStartLetter = Coordinate::stringFromColumnIndex($sc);
                $midEndLetter = Coordinate::stringFromColumnIndex($docColStart - 1);
                $sheet->setCellValue("{$midStartLetter}1", $judulProses . "\n(" . $namaProduk . ")");
                if (($docColStart - 1) > $sc) {
                    $sheet->mergeCells("{$midStartLetter}1:{$midEndLetter}3");
                }
                $sheet->getStyle("{$midStartLetter}1")->getAlignment()->setWrapText(true)->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
                $sheet->getStyle("{$midStartLetter}1")->getFont()->setBold(true)->setSize(11)->setUnderline(true);
            }
            
            $scLetter = Coordinate::stringFromColumnIndex($sc);
            $sheet->getStyle("{$scLetter}1:{$ecLetter}4")->getBorders()->getBottom()->setBorderStyle(Border::BORDER_THIN);
        }

        for ($r=1; $r<=3; $r++) $sheet->getRowDimension($r)->setRowHeight(16);
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

        [$alldata, $namaProduk, $judulProses, $noDok, $machNo] = $this->resolveExportContextExcel($typeProcess, $process, $device, $dateStart, $dateEnd);

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
        
        $headerRowCount = $this->countHeaderRowsExcel($grid);
        $identityColCount = $this->countIdentityColumnsExcel($grid, $headerRowCount);
        
        $maxCol = max(1, $grid['totalCols']);
        $orientation = $this->decideOrientation($maxCol);
        
        $maxColsPerPage = $orientation === 'landscape' ? self::PDF_MAX_COLS_LANDSCAPE : self::PDF_MAX_COLS_PORTRAIT;
        $dataColsPerPage = max(1, $maxColsPerPage - $identityColCount);
        
        $chunksExcel = $this->computeColumnChunksExcel($maxCol, $identityColCount, $dataColsPerPage);

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $startRow = $this->insertKopSuratToSheetExcel($sheet, $namaProduk, $judulProses, $noDok, $machNo, $identityColCount, $chunksExcel, $grid);
        $this->fillExcelFromGridExcel($grid, $sheet, $startRow, $headerRowCount, $identityColCount, $chunksExcel);

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
            if ($width > $maxAllowedWidth) { $width = $maxAllowedWidth; }
            $sheet->getColumnDimension($colLetter)->setWidth($width);
        }

        $totalHeaderRowsToRepeat = ($startRow - 1) + $headerRowCount;
        $sheet->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, $totalHeaderRowsToRepeat);
        
        if ($identityColCount > 0) {
            $identityColLetter = Coordinate::stringFromColumnIndex($identityColCount);
            $sheet->getPageSetup()->setColumnsToRepeatAtLeftByStartAndEnd('A', $identityColLetter);
        }

        foreach ($chunksExcel as $idx => $chunk) {
            if ($idx < count($chunksExcel) - 1) {
                $breakColIndex = $chunk[1] + 1; 
                if ($breakColIndex <= $maxCol) {
                    $breakLetter = Coordinate::stringFromColumnIndex($breakColIndex);
                    $sheet->setBreak($breakLetter . '1', \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet::BREAK_COLUMN);
                }
            }
        }

        $sheet->getPageMargins()->setTop(0.5);
        $sheet->getPageMargins()->setLeft(0.4);
        $sheet->getPageMargins()->setRight(0.4);
        $sheet->getPageMargins()->setBottom(0.5);
        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);
        $sheet->getPageSetup()->setOrientation(
            $orientation === 'landscape' ? PageSetup::ORIENTATION_LANDSCAPE : PageSetup::ORIENTATION_PORTRAIT
        );

        if ($maxCol <= 10) {
            $sheet->getPageSetup()->setScale(100);
        } else {
            $sheet->getPageSetup()->setScale(80);
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
        
        $unsafeRowBoundaries = $this->computeUnsafeRowBoundaries($grid, $headerRowCount);

        $orientation = $this->decideOrientation($grid['totalCols']);
        
        $maxColsPerPage = $orientation === 'landscape' ? self::PDF_MAX_COLS_LANDSCAPE : self::PDF_MAX_COLS_PORTRAIT;
        $maxRowsPerPage = $orientation === 'landscape' ? self::PDF_MAX_ROWS_LANDSCAPE : self::PDF_MAX_ROWS_PORTRAIT;

        $dataColsPerPage = max(1, $maxColsPerPage - $identityColCount);
        
        $colChunks = $this->computeColumnChunks($grid['totalCols'], $identityColCount, $dataColsPerPage);
        $rowChunks = $this->computeRowChunks($grid['totalRows'], $headerRowCount, $unsafeRowBoundaries, $maxRowsPerPage);

        $kopSuratHtml = $this->buildKopSuratHtml($namaProduk, $judulProses, $noDok, $machNo);

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