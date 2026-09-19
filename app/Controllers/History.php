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

    // Batas kolom disesuaikan agar tidak kepotong di PDF (Portrait & Landscape)
    private const PDF_MAX_COLS_LANDSCAPE = 14;
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

    // LOGIKA BARU: Deteksi jumlah baris header berdasarkan rowspan sel identitas pertama
    // Ini mengabaikan apakah sel HTML ditulis pakai <th> atau <td>, sehingga tanggal pasti masuk Header.
    private function countHeaderRows(array $grid): int
    {
        $r = 1;
        while ($r <= $grid['totalRows']) {
            $rowOrigins = $grid['origins'][$r] ?? [];
            if (count($rowOrigins) === 1 && reset($rowOrigins)['colspan'] === $grid['totalCols']) {
                $r++; // Lewati judul full-width
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
            // Disesuaikan: Tidak mewajibkan "isHeader" karena tabel kadang pakai <td>
            if ($origin === null || $origin['rowspan'] !== $requiredSpan) {
                break;
            }
            $count += $origin['colspan'];
            $c += $origin['colspan'];
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

    private function fillExcelFromGrid(array $grid, Worksheet $sheet, int $startRow, int $headerRowCount): void
    {
        foreach ($grid['origins'] as $r => $rowCells) {
            foreach ($rowCells as $c => $cell) {
                $row = $startRow + $r - 1;
                $coord = Coordinate::stringFromColumnIndex($c) . $row;
                $sheet->setCellValue($coord, $cell['value']);

                $style = $sheet->getStyle($coord);
                $style->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                $style->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                    ->setVertical(Alignment::VERTICAL_CENTER)
                    ->setWrapText(true);

                // Styling header berdasarkan deteksi tinggi header
                if ($r <= $headerRowCount) {
                    $style->getFont()->setBold(true);
                    $style->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('F8F9FA');
                }

                if ($cell['colspan'] > 1 || $cell['rowspan'] > 1) {
                    $endCol = $c + $cell['colspan'] - 1;
                    $endRow = $row + $cell['rowspan'] - 1;
                    $endCoord = Coordinate::stringFromColumnIndex($endCol) . $endRow;
                    $sheet->mergeCells("{$coord}:{$endCoord}");
                }
            }
        }
    }

    // LOGIKA BARU: Memasukkan Kop Surat langsung ke dalam sel Excel agar tampil dan rapi di Print Preview
    private function insertKopSuratToSheet(Worksheet $sheet, string $namaProduk, string $judulProses, string $noDok, string $machNo, int $maxCol): int
    {
        $midStart = max(2, (int)ceil($maxCol / 3));
        $rightStart = max(3, (int)ceil($maxCol * 2 / 3));

        // Kiri: Info Perusahaan
        $sheet->setCellValue('A1', "PT. FOXCONN TECHNOLOGIES INDONESIA\nProduction Engineering Department\nProcess Engineering Section\n" . $namaProduk);
        $sheet->mergeCells('A1:' . Coordinate::stringFromColumnIndex($midStart - 1) . '4');
        $sheet->getStyle('A1')->getAlignment()->setWrapText(true)->setVertical(Alignment::VERTICAL_TOP);
        $sheet->getStyle('A1')->getFont()->setBold(true);

        // Tengah: Judul Dokumen
        $sheet->setCellValue(Coordinate::stringFromColumnIndex($midStart) . '1', $judulProses . "\n(" . $namaProduk . ")");
        $sheet->mergeCells(Coordinate::stringFromColumnIndex($midStart) . '1:' . Coordinate::stringFromColumnIndex($rightStart - 1) . '4');
        $sheet->getStyle(Coordinate::stringFromColumnIndex($midStart) . '1')->getAlignment()
            ->setWrapText(true)
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_TOP);
        $sheet->getStyle(Coordinate::stringFromColumnIndex($midStart) . '1')->getFont()->setBold(true)->setSize(12)->setUnderline(true);

        // Kanan: No Dokumen & Approval
        $dokText = "No. Dok : " . $noDok . "\nRevisi : 12\nBerlaku : 11 Mei 2026\nChecked : ________________";
        $sheet->setCellValue(Coordinate::stringFromColumnIndex($rightStart) . '1', $dokText);
        $sheet->mergeCells(Coordinate::stringFromColumnIndex($rightStart) . '1:' . Coordinate::stringFromColumnIndex($maxCol) . '4');
        $sheet->getStyle(Coordinate::stringFromColumnIndex($rightStart) . '1')->getAlignment()
            ->setWrapText(true)
            ->setHorizontal(Alignment::HORIZONTAL_LEFT)
            ->setVertical(Alignment::VERTICAL_TOP);

        // Bawah: Info Mesin
        $sheet->setCellValue('A5', "MACHINE No : " . $machNo . "        AG Paste Type : ");
        $sheet->mergeCells('A5:' . Coordinate::stringFromColumnIndex($maxCol) . '5');
        $sheet->getStyle('A5')->getFont()->setBold(true);

        return 6; // Mengembalikan baris ke-6 sebagai tempat dimulainya tabel data
    }

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

                $effectiveColspan = ($origin['colspan'] === $totalOriginalCols) ? count($colMap) : $origin['colspan'];
                $colspanAttr = $effectiveColspan > 1 ? ' colspan="' . $effectiveColspan . '"' : '';

                $value = htmlspecialchars($origin['value'], ENT_QUOTES, 'UTF-8');
                $html .= "<{$tag}{$rowspanAttr}{$colspanAttr}>{$value}</{$tag}>";
            }
            return $html . '</tr>';
        };

        $thead = '<thead>';
        $thead .= '<tr><td colspan="' . $totalColsInChunk . '" style="border:none; padding:0;">' . $kopSuratHtml . '</td></tr>';
        for ($r = 1; $r <= $headerRowCount; $r++) {
            $thead .= $renderRow($r, true); // Paksa sebagai <th> agar rapi di PDF
        }
        $thead .= '</thead>';

        $tbody = '<tbody>';
        for ($r = $headerRowCount + 1; $r <= $grid['totalRows']; $r++) {
            $tbody .= $renderRow($r);
        }
        $tbody .= '</tbody>';

        return '<table class="table-cs" border="1" style="table-layout: fixed; word-wrap: break-word;">' . $thead . $tbody . '</table>';
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

        // LOGIKA BARU: Format Judul Pintar (Regex)
        if ($typeProcess === 'production') {
            $cleanName = trim(preg_replace('/^(Production Process Control Sheet|Production Control Sheet|Produciton Control Sheet of|Produciton Control Sheet)\s*/i', '', $namaProsesRaw));
            $judulProses = 'Production Process Control Sheet ' . $cleanName;
        } elseif ($typeProcess === 'startup') {
            $cleanName = trim(preg_replace('/\s*Start Up Check Sheet\s*(.*)$/i', ' $1', $namaProsesRaw));
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

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $maxCol = max(1, $grid['totalCols']);
        
        // Membangun Kop Surat in-cell
        $startRow = $this->insertKopSuratToSheet($sheet, $namaProduk, $judulProses, $noDok, $machNo, $maxCol);

        // Menulis tabel data mulai dari bawah kop surat
        $this->fillExcelFromGrid($grid, $sheet, $startRow, $headerRowCount);

        // Mengatur lebar kolom agar rapi dan tidak bocor panjang
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

        $maxAllowedWidth = 18; 
        for ($c = 1; $c <= $maxCol; $c++) {
            $colLetter = Coordinate::stringFromColumnIndex($c);
            $width = $colWidths[$c] ?? 10; 
            if ($width > $maxAllowedWidth) {
                $width = $maxAllowedWidth; 
            }
            $sheet->getColumnDimension($colLetter)->setWidth($width);
        }

        // KUNCI EXCEL PRINT PREVIEW: Mengulang Baris Kop Surat (1-5) + Baris Header Tabel
        $totalHeaderRowsToRepeat = ($startRow - 1) + $headerRowCount;
        $sheet->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, $totalHeaderRowsToRepeat);
        
        if ($identityColCount > 0) {
            $identityColLetter = Coordinate::stringFromColumnIndex($identityColCount);
            $sheet->getPageSetup()->setColumnsToRepeatAtLeftByStartAndEnd('A', $identityColLetter);
        }

        $sheet->getPageMargins()->setTop(0.5);
        $sheet->getPageMargins()->setLeft(0.4);
        $sheet->getPageMargins()->setRight(0.4);
        $sheet->getPageMargins()->setBottom(0.5);
        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);
        $orientation = $this->decideOrientation($maxCol);
        $sheet->getPageSetup()->setOrientation(
            $orientation === 'landscape' ? PageSetup::ORIENTATION_LANDSCAPE : PageSetup::ORIENTATION_PORTRAIT
        );

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