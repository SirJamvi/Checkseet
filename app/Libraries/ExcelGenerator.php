<?php

namespace App\Libraries;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExcelGenerator
{
    private const MAX_COLS_LANDSCAPE = 12;

    public function generate(string $htmlString, array $context)
    {
        extract($context); 
        // Variabel yg tersedia: $alldata, $namaProduk, $judulProses, $noDok, $machNo, $prosesInfo, $typeProcess, $process

        $tableElement = $this->extractTableElement($htmlString, 'table1');
        if ($tableElement === null) die("Error: table1 tidak ditemukan");

        $grid = $this->buildGrid($tableElement);
        $headerRowCount = $this->countHeaderRows($grid);
        $identityColCount = $this->countIdentityColumns($grid, $headerRowCount);
        
        $maxCol = max(1, $grid['totalCols']);
        $orientation = ($typeProcess === 'startup') ? 'portrait' : 'landscape';
        
        if ($orientation === 'portrait') {
            $chunksExcel = [[1, $maxCol]]; 
        } else {
            $dataColsPerPage = max(1, self::MAX_COLS_LANDSCAPE - $identityColCount);
            $chunksExcel = $this->computeColumnChunks($maxCol, $identityColCount, $dataColsPerPage);
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $currentRowOffset = 1;
        $globalMaxCols = 0;

        foreach ($chunksExcel as $idx => $chunk) {
            $sc = $chunk[0]; $ec = $chunk[1];
            $totalColsInBlock = $identityColCount + ($ec - $sc + 1);
            if ($totalColsInBlock > $globalMaxCols) $globalMaxCols = $totalColsInBlock;

            $this->insertKopSuratVertical($sheet, $currentRowOffset, $totalColsInBlock, $namaProduk, $judulProses, $noDok, $machNo, $prosesInfo, $typeProcess);
            $tableStartRow = $currentRowOffset + 4; 
            $this->writeBlockFromGrid($grid, $sheet, $tableStartRow, $identityColCount, $sc, $ec);
            
            $currentRowOffset = $tableStartRow + $grid['totalRows'] + 3;
            if ($orientation === 'landscape') {
                $sheet->setBreak('A' . ($currentRowOffset - 2), Worksheet::BREAK_ROW);
            }
        }

        $sheet->getPageSetup()->setOrientation($orientation === 'portrait' ? PageSetup::ORIENTATION_PORTRAIT : PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);
        $sheet->getPageSetup()->setFitToPage(true)->setFitToWidth(1)->setFitToHeight(0); 
        $sheet->getPageMargins()->setTop(0.5)->setRight(0.3)->setLeft(0.3)->setBottom(0.5);

        if ($typeProcess === 'startup') {
            $sheet->getColumnDimension('A')->setWidth(5); $sheet->getColumnDimension('B')->setWidth(30); $sheet->getColumnDimension('C')->setWidth(20);
        } else {
            $sheet->getColumnDimension('A')->setWidth(5); $sheet->getColumnDimension('B')->setWidth(15); $sheet->getColumnDimension('C')->setWidth(12); $sheet->getColumnDimension('D')->setWidth(15);
            for ($col = 5; $col <= $globalMaxCols; $col++) $sheet->getColumnDimension(Coordinate::stringFromColumnIndex($col))->setWidth(11);
        }

        $fileName = 'Report_' . $typeProcess . '_' . $process . '_' . date('Ymd_Hi') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');
        
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit();
    }

    // --- HELPER EXCEL ---
    private function extractTableElement(string $html, string $id = 'table1'): ?\DOMElement {
        $doc = new \DOMDocument(); libxml_use_internal_errors(true); $doc->loadHTML('<?xml encoding="UTF-8">' . $html); libxml_clear_errors();
        $xpath = new \DOMXPath($doc); $nodes = $xpath->query("//table[@id='{$id}']");
        return $nodes->length > 0 ? $nodes->item(0) : null;
    }

    private function buildGrid(\DOMElement $table): array {
        $occupied = []; $origins = []; $isHeaderMap = []; $currentRow = 1; $maxCol = 0;
        foreach ($table->getElementsByTagName('tr') as $tr) {
            $col = 1;
            foreach ($tr->childNodes as $cell) {
                if (!($cell instanceof \DOMElement)) continue;
                $tag = strtolower($cell->tagName);
                if ($tag !== 'td' && $tag !== 'th') continue;
                while (!empty($occupied[$currentRow][$col])) $col++;
                $colspan = max(1, (int) ($cell->getAttribute('colspan') ?: 1));
                $rowspan = max(1, (int) ($cell->getAttribute('rowspan') ?: 1));
                $isHeader = $tag === 'th';
                $value = preg_replace('/\s+/u', ' ', trim($cell->textContent));
                $origins[$currentRow][$col] = ['value' => $value, 'isHeader' => $isHeader, 'rowspan' => $rowspan, 'colspan' => $colspan];
                for ($r = $currentRow; $r < $currentRow + $rowspan; $r++) {
                    for ($c = $col; $c < $col + $colspan; $c++) { $occupied[$r][$c] = true; $isHeaderMap[$r][$c] = $isHeader; }
                }
                $maxCol = max($maxCol, $col + $colspan - 1); $col += $colspan;
            }
            $currentRow++;
        }
        return ['origins' => $origins, 'isHeaderMap' => $isHeaderMap, 'totalRows' => $currentRow - 1, 'totalCols' => $maxCol];
    }

    private function countHeaderRows(array $grid): int {
        $r = 1;
        while ($r <= $grid['totalRows']) {
            $rowOrigins = $grid['origins'][$r] ?? [];
            if (count($rowOrigins) === 1 && reset($rowOrigins)['colspan'] === $grid['totalCols']) { $r++; continue; }
            break;
        }
        $firstCell = $grid['origins'][$r][1] ?? null;
        if ($firstCell) return ($r - 1) + $firstCell['rowspan'];
        return 1;
    }

    private function findRealHeaderStartRow(array $grid, int $headerRowCount): int {
        for ($r = 1; $r <= $headerRowCount; $r++) {
            $rowOrigins = $grid['origins'][$r] ?? [];
            if (count($rowOrigins) === 1 && reset($rowOrigins)['colspan'] === $grid['totalCols']) continue;
            return $r;
        }
        return 1;
    }

    private function countIdentityColumns(array $grid, int $headerRowCount): int {
        $startRow = $this->findRealHeaderStartRow($grid, $headerRowCount);
        $requiredSpan = $headerRowCount - $startRow + 1; $count = 0; $c = 1;
        while ($c <= $grid['totalCols']) {
            $origin = $grid['origins'][$startRow][$c] ?? null;
            if ($origin === null || $origin['rowspan'] < $requiredSpan) break;
            $count += $origin['colspan']; $c += $origin['colspan'];
        }
        return $count;
    }

    private function computeColumnChunks(int $totalCols, int $identityColCount, int $dataColsPerPage): array {
        $chunks = []; $start = $identityColCount + 1;
        while ($start <= $totalCols) {
            $end = min($totalCols, $start + $dataColsPerPage - 1); $chunks[] = [$start, $end]; $start = $end + 1;
        }
        return $chunks ?: [[$identityColCount + 1, $totalCols]];
    }

    private function insertKopSuratVertical($sheet, int $startRow, int $totalColsInBlock, string $namaProduk, string $judulProses, string $noDok, string $machNo, array $prosesInfo, string $typeProcess) {
        $revisi = str_pad(!empty($prosesInfo['revisi']) ? $prosesInfo['revisi'] : 0, 2, '0', STR_PAD_LEFT);
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

        $sheet->setCellValue("A{$r1}", "PT. FOXCONN TECHNOLOGIES INDONESIA\nProduction Engineering Department\nProcess Engineering Section\n" . $namaProduk);
        $sheet->mergeCells("A{$r1}:C{$r3}");
        $sheet->getStyle("A{$r1}")->getAlignment()->setWrapText(true)->setVertical(Alignment::VERTICAL_TOP);
        $sheet->getStyle("A{$r1}")->getFont()->setBold(true)->setSize(9);
        $sheet->setCellValue("A{$r4}", "MACHINE No : " . $machNo . "      AG Paste Type : ");
        $sheet->mergeCells("A{$r4}:E{$r4}");
        $sheet->getStyle("A{$r4}")->getFont()->setBold(true)->setSize(9);

        $docEndCol = $totalColsInBlock; $docStartCol = max(4, $totalColsInBlock - 2); 
        $docStartLetter = Coordinate::stringFromColumnIndex($docStartCol);
        $docMidLetter   = Coordinate::stringFromColumnIndex($docStartCol + 1);
        $docEndLetter   = Coordinate::stringFromColumnIndex($docEndCol);

        $sheet->setCellValue("{$docStartLetter}{$r1}", "No. Dok / No."); $sheet->setCellValue("{$docMidLetter}{$r1}", ": " . $noDok);
        $sheet->setCellValue("{$docStartLetter}{$r2}", "Revisi");       $sheet->setCellValue("{$docMidLetter}{$r2}", ": " . $revisi);
        $sheet->setCellValue("{$docStartLetter}{$r3}", "Berlaku");      $sheet->setCellValue("{$docMidLetter}{$r3}", ": " . $tglBerlaku);

        if ($docEndCol > $docStartCol + 1) {
            $sheet->mergeCells("{$docMidLetter}{$r1}:{$docEndLetter}{$r1}");
            $sheet->mergeCells("{$docMidLetter}{$r2}:{$docEndLetter}{$r2}");
            $sheet->mergeCells("{$docMidLetter}{$r3}:{$docEndLetter}{$r3}");
        }

        if ($typeProcess === 'startup') {
            $sheet->setCellValue("{$docStartLetter}{$r4}", "QC"); $sheet->setCellValue("{$docMidLetter}{$r4}", "Production");
            if ($docEndCol > $docStartCol + 1) $sheet->mergeCells("{$docMidLetter}{$r4}:{$docEndLetter}{$r4}");
            $sheet->getStyle("{$docStartLetter}{$r4}:{$docEndLetter}{$r4}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        } else {
            $sheet->setCellValue("{$docStartLetter}{$r4}", "Checked"); $sheet->mergeCells("{$docStartLetter}{$r4}:{$docEndLetter}{$r4}");
            $sheet->getStyle("{$docStartLetter}{$r4}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        }

        $boxStyle = $sheet->getStyle("{$docStartLetter}{$r1}:{$docEndLetter}{$r4}");
        $boxStyle->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $boxStyle->getFont()->setSize(9);
        $sheet->getStyle("{$docStartLetter}{$r1}:{$docStartLetter}{$r3}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

        if ($typeProcess !== 'startup' && $docStartCol > 4) {
            $midEndLetter = Coordinate::stringFromColumnIndex($docStartCol - 1);
            $sheet->setCellValue("D{$r1}", $judulProses . "\n(" . $namaProduk . ")");
            $sheet->mergeCells("D{$r1}:{$midEndLetter}{$r3}");
            $sheet->getStyle("D{$r1}")->getAlignment()->setWrapText(true)->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
            $sheet->getStyle("D{$r1}")->getFont()->setBold(true)->setSize(11)->setUnderline(true);
        }

        $leftToMid = Coordinate::stringFromColumnIndex(max(1, $docStartCol - 1));
        $sheet->getStyle("A{$r1}:{$leftToMid}{$r3}")->getBorders()->getBottom()->setBorderStyle(Border::BORDER_THIN);
        
        for ($r=$r1; $r<=$r3; $r++) $sheet->getRowDimension($r)->setRowHeight(18);
        $sheet->getRowDimension($r4)->setRowHeight(20);
    }

    private function writeBlockFromGrid(array $grid, $sheet, int $startRow, int $identityColCount, int $sc, int $ec) {
        foreach ($grid['origins'] as $r => $rowCells) {
            $targetRow = $startRow + $r - 1;
            foreach ($rowCells as $c => $cell) {
                $targetCol = 0;
                if ($c <= $identityColCount) $targetCol = $c; 
                else if ($c >= $sc && $c <= $ec) $targetCol = $identityColCount + ($c - $sc + 1);

                if ($targetCol > 0) {
                    $cellLetter = Coordinate::stringFromColumnIndex($targetCol);
                    $coord = $cellLetter . $targetRow;
                    $sheet->setCellValue($coord, html_entity_decode(strip_tags($cell['value'] ?? '')));
                    
                    $colspan = $cell['colspan'] ?? 1; $rowspan = $cell['rowspan'] ?? 1;
                    $actualColspan = 1;
                    if ($c <= $identityColCount) $actualColspan = (($c + $colspan - 1) > $identityColCount) ? ($identityColCount - $c + 1 + ($ec - $sc + 1)) : $colspan;
                    else if ($c >= $sc && $c <= $ec) $actualColspan = (($c + $colspan - 1) > $ec) ? ($ec - $c + 1) : $colspan;

                    if ($actualColspan > 1 || $rowspan > 1) {
                        $endColLetter = Coordinate::stringFromColumnIndex($targetCol + $actualColspan - 1);
                        $sheet->mergeCells("{$coord}:{$endColLetter}" . ($targetRow + $rowspan - 1));
                    }
                    
                    $style = $sheet->getStyle($coord);
                    $style->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                    $style->getAlignment()->setVertical(Alignment::VERTICAL_CENTER)->setHorizontal(Alignment::HORIZONTAL_CENTER)->setWrapText(true);
                    if (isset($cell['isHeader']) && $cell['isHeader']) {
                        $style->getFont()->setBold(true);
                        $style->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFF2F2F2');
                    }
                }
            }
        }
    }
}