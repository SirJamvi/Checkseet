<?php

namespace App\Libraries;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Worksheet\SheetView;

class ExcelGenerator
{
    public function generate(string $htmlString, array $context)
    {
        extract($context); 

        $tableElement = $this->extractTableElement($htmlString, 'table1', $typeProcess, $namaApprover, $alldata ?? []);
        if ($tableElement === null) die("Error: table1 tidak ditemukan");

        $grid = $this->buildGrid($tableElement);
        $headerRowCount = $this->countHeaderRows($grid);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // =====================================================================
        // RULES BARU: Grid mengikuti total kolom aktual (minimal 10 untuk Startup)
        // =====================================================================
        $maxGridCols = $grid['totalCols']; 
        $kopRightCol = $maxGridCols + 1; // +1 Offset Kolom A
        
        $kopStartRow = 2;
        $this->insertKopSuratVertical($sheet, $kopStartRow, $kopRightCol, $namaProduk, $judulProses, $noDok, $machNo, $tglBerlaku, $namaApprover, $revisi, $typeProcess);
        
        $tableStartRow = 6; 
        $this->writeBlockFromGrid($grid, $sheet, $tableStartRow, $maxGridCols);

        $lastRow = $tableStartRow + $grid['totalRows'] - 1;
        $lastColLetter = Coordinate::stringFromColumnIndex($kopRightCol); 
        
        $tableRange = "B{$tableStartRow}:{$lastColLetter}{$lastRow}";
        $sheet->getStyle($tableRange)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $sheet->getSheetView()->setView(SheetView::SHEETVIEW_PAGE_BREAK_PREVIEW);
        $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);
        
        $headerEndRow = $tableStartRow + $headerRowCount - 1;
        $sheet->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(2, $headerEndRow);
        
        if ($typeProcess === 'startup') {
            // RULES BARU STARTUP: Baris dikunci 1 page, kolom BEBAS ke samping
            $sheet->getPageSetup()->setFitToPage(true);
            $sheet->getPageSetup()->setFitToWidth(0); 
            $sheet->getPageSetup()->setFitToHeight(1); 
            // Ulangi identitas di setiap page baru
            $sheet->getPageSetup()->setColumnsToRepeatAtLeftByStartAndEnd('B', 'D');
        } else {
            $sheet->getPageSetup()->setFitToPage(true);
            $sheet->getPageSetup()->setFitToWidth(1);
            $sheet->getPageSetup()->setFitToHeight(0); 
        }
        
        $sheet->getPageMargins()->setTop(0.4)->setRight(0.3)->setLeft(0.3)->setBottom(0.4);

        $sheet->getColumnDimension('A')->setWidth(2); 

        if ($typeProcess === 'startup') {
            $sheet->getColumnDimension('B')->setWidth(4);   
            $sheet->getColumnDimension('C')->setWidth(35);  
            $sheet->getColumnDimension('D')->setWidth(20);  
            for ($col = 5; $col <= $kopRightCol; $col++) {
                $sheet->getColumnDimension(Coordinate::stringFromColumnIndex($col))->setWidth(11);
            }
        } else {
            $sheet->getColumnDimension('B')->setWidth(4);   
            $sheet->getColumnDimension('C')->setWidth(13);  
            $sheet->getColumnDimension('D')->setWidth(13);  
            $sheet->getColumnDimension('E')->setWidth(13);  
            for ($col = 6; $col <= $kopRightCol; $col++) {
                $sheet->getColumnDimension(Coordinate::stringFromColumnIndex($col))->setWidth(7.5);
            }
        }

        $fileName = 'Report_' . strtoupper($process) . '_' . date('Ymd_Hi') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');
        
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit();
    }

    private function extractTableElement(string $html, string $id, string $typeProcess, string $namaApprover, array $alldata): ?\DOMElement {
        $doc = new \DOMDocument(); libxml_use_internal_errors(true); $doc->loadHTML('<?xml encoding="UTF-8">' . $html); libxml_clear_errors();
        $xpath = new \DOMXPath($doc); $nodes = $xpath->query("//table[@id='{$id}']");
        $table = $nodes->length > 0 ? $nodes->item(0) : null;

        if ($table && $typeProcess === 'startup') {
            $trs = iterator_to_array($table->getElementsByTagName('tr'));
            foreach ($trs as $tr) {
                $firstCell = $tr->getElementsByTagName('td')->item(0) ?? $tr->getElementsByTagName('th')->item(0);
                if ($firstCell) {
                    $txt = strtolower(trim($firstCell->textContent));
                    if (strpos($txt, 'status approval') !== false || strpos($txt, 'operator') !== false) {
                        $tr->parentNode->removeChild($tr);
                    }
                }
            }

            $trs = $table->getElementsByTagName('tr');
            $noteTr = null;
            foreach ($trs as $tr) {
                if (stripos($tr->textContent, 'Note') !== false) {
                    $noteTr = $tr; break;
                }
            }

            if ($noteTr) {
                $getVal = function($item, $keys) {
                    if (is_array($item)) {
                        foreach($keys as $k) if (isset($item[$k]) && $item[$k] !== '') return $item[$k];
                    } elseif (is_object($item)) {
                        foreach($keys as $k) if (isset($item->$k) && $item->$k !== '') return $item->$k;
                    }
                    return '-';
                };

                // Kunci minimal 7 hari, tapi kalau data > 7, ikuti jumlah data
                $dataColsCount = max(7, count($alldata));

                $opTr = $doc->createElement('tr');
                $tdOpLbl = $doc->createElement('td', 'Operator');
                $tdOpLbl->setAttribute('colspan', '3');
                $opTr->appendChild($tdOpLbl);

                for ($i = 0; $i < $dataColsCount; $i++) {
                    if (isset($alldata[$i])) {
                        $opName = $getVal($alldata[$i], ['operator', 'op_start', 'nama_operator', 'pic', 'created_by']);
                        $tdOpData = $doc->createElement('td', htmlspecialchars($opName));
                    } else {
                        $tdOpData = $doc->createElement('td', '-');
                    }
                    $opTr->appendChild($tdOpData);
                }
                $noteTr->parentNode->insertBefore($opTr, $noteTr);

                $appTr = $doc->createElement('tr');
                $approverText = ($namaApprover !== '' && $namaApprover !== '-') ? $namaApprover : '-';
                $tdAppLbl = $doc->createElement('td', htmlspecialchars("Approved by: " . $approverText));
                $tdAppLbl->setAttribute('colspan', '3');
                $appTr->appendChild($tdAppLbl);

                for ($i = 0; $i < $dataColsCount; $i++) {
                    if (isset($alldata[$i])) {
                        $status = strtolower(trim($getVal($alldata[$i], ['status_approval', 'status', 'is_approved', 'approval'])));
                        $isApp = in_array($status, ['approved', 'ok', 'yes', 'v', '1', 'true', 'done']);
                        $ceklis = $isApp ? 'V' : '-';
                        $tdAppData = $doc->createElement('td', $ceklis);
                    } else {
                        $tdAppData = $doc->createElement('td', '-');
                    }
                    $appTr->appendChild($tdAppData);
                }
                $noteTr->parentNode->insertBefore($appTr, $noteTr);
            }
        }
        return $table;
    }

    private function buildGrid(\DOMElement $table): array {
        $occupied = []; $origins = []; $currentRow = 1; $maxCol = 0;
        foreach ($table->getElementsByTagName('tr') as $tr) {
            $col = 1;
            foreach ($tr->childNodes as $cell) {
                if (!($cell instanceof \DOMElement)) continue;
                $tag = strtolower($cell->tagName);
                if ($tag !== 'td' && $tag !== 'th') continue;
                while (!empty($occupied[$currentRow][$col])) $col++;
                $colspan = max(1, (int) ($cell->getAttribute('colspan') ?: 1));
                $rowspan = max(1, (int) ($cell->getAttribute('rowspan') ?: 1));
                $origins[$currentRow][$col] = ['value' => $cell->textContent, 'isHeader' => $tag === 'th', 'colspan' => $colspan, 'rowspan' => $rowspan];
                for ($r = $currentRow; $r < $currentRow + $rowspan; $r++) {
                    for ($c = $col; $c < $col + $colspan; $c++) { $occupied[$r][$c] = true; }
                }
                $maxCol = max($maxCol, $col + $colspan - 1); $col += $colspan;
            }
            $currentRow++;
        }
        return ['origins' => $origins, 'occupied' => $occupied, 'totalRows' => $currentRow - 1, 'totalCols' => $maxCol];
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

    private function insertKopSuratVertical($sheet, int $startRow, int $kopRightCol, string $namaProduk, string $judulProses, string $noDok, string $machNo, string $tglBerlaku, string $namaApprover, string $revisi, string $typeProcess) {
        $r1 = $startRow; $r2 = $startRow + 1; $r3 = $startRow + 2; $r4 = $startRow + 3;

        $docEndCol = $kopRightCol; 
        $docStartCol = max(5, $docEndCol - 2); 
        
        $docStartLetter = Coordinate::stringFromColumnIndex($docStartCol);
        $docMidLetter   = Coordinate::stringFromColumnIndex($docStartCol + 1);
        $docEndLetter   = Coordinate::stringFromColumnIndex($docEndCol);

        $sheet->setCellValue("B{$r1}", "PT. FOXCONN TECHNOLOGIES INDONESIA\nProduction Engineering Department\nProcess Engineering Section\n" . $namaProduk);
        $sheet->mergeCells("B{$r1}:D{$r3}");
        $sheet->getStyle("B{$r1}")->getAlignment()->setWrapText(true)->setVertical(Alignment::VERTICAL_TOP);
        $sheet->getStyle("B{$r1}")->getFont()->setBold(true)->setSize(9);
        
        $sheet->setCellValue("B{$r4}", "MACHINE No : " . $machNo);
        $midEndLetter = Coordinate::stringFromColumnIndex(max(4, $docStartCol - 1));
        $sheet->mergeCells("B{$r4}:{$midEndLetter}{$r4}");
        $sheet->getStyle("B{$r4}")->getFont()->setBold(true)->setSize(9);

        $sheet->setCellValue("{$docStartLetter}{$r1}", "No. Dok / No."); $sheet->setCellValue("{$docMidLetter}{$r1}", ": " . $noDok);
        $sheet->setCellValue("{$docStartLetter}{$r2}", "Revisi");       $sheet->setCellValue("{$docMidLetter}{$r2}", ": " . $revisi);
        $sheet->setCellValue("{$docStartLetter}{$r3}", "Berlaku");      $sheet->setCellValue("{$docMidLetter}{$r3}", ": " . $tglBerlaku);

        if ($docEndCol > $docStartCol + 1) {
            $sheet->mergeCells("{$docMidLetter}{$r1}:{$docEndLetter}{$r1}");
            $sheet->mergeCells("{$docMidLetter}{$r2}:{$docEndLetter}{$r2}");
            $sheet->mergeCells("{$docMidLetter}{$r3}:{$docEndLetter}{$r3}");
        }

        if ($typeProcess === 'startup') {
            $sheet->setCellValue("{$docStartLetter}{$r4}", "QC"); 
            $sheet->setCellValue("{$docMidLetter}{$r4}", "Production");
            if ($docEndCol > $docStartCol + 1) {
                $sheet->mergeCells("{$docMidLetter}{$r4}:{$docEndLetter}{$r4}");
            }
            $sheet->getStyle("{$docStartLetter}{$r4}:{$docEndLetter}{$r4}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
        } else {
            $ttdText = $namaApprover !== '' ? "Checked\n\nApproved by: " . $namaApprover : "Checked";
            $sheet->setCellValue("{$docStartLetter}{$r4}", $ttdText); 
            $sheet->mergeCells("{$docStartLetter}{$r4}:{$docEndLetter}{$r4}");
            $sheet->getStyle("{$docStartLetter}{$r4}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER)->setWrapText(true);
        }

        $boxStyle = $sheet->getStyle("{$docStartLetter}{$r1}:{$docEndLetter}{$r4}");
        $boxStyle->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $boxStyle->getFont()->setSize(9);
        $sheet->getStyle("{$docStartLetter}{$r1}:{$docStartLetter}{$r3}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

        if ($docStartCol > 5) {
            $sheet->setCellValue("E{$r1}", $judulProses . "\n(" . $namaProduk . ")");
            $sheet->mergeCells("E{$r1}:{$midEndLetter}{$r3}");
            $sheet->getStyle("E{$r1}")->getAlignment()->setWrapText(true)->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
            $sheet->getStyle("E{$r1}")->getFont()->setBold(true)->setSize(11)->setUnderline(true);
        }

        for ($r = $r1; $r <= $r3; $r++) $sheet->getRowDimension($r)->setRowHeight(18);
        $sheet->getRowDimension($r4)->setRowHeight(35); 
    }

    private function writeBlockFromGrid(array $grid, $sheet, int $startRow, int $maxGridCols) {
        $occupied = $grid['occupied'] ?? [];
        $origins = $grid['origins'] ?? [];
        $maxRow = $grid['totalRows'];

        for ($r = 1; $r <= $maxRow; $r++) {
            $targetRow = $startRow + $r - 1;

            if (isset($origins[$r])) {
                foreach ($origins[$r] as $c => $cell) {
                    if ($c > $maxGridCols) continue; 

                    $targetCol = $c + 1; 
                    $cellLetter = Coordinate::stringFromColumnIndex($targetCol);
                    $coord = $cellLetter . $targetRow;
                    
                    $sheet->setCellValue($coord, html_entity_decode(strip_tags($cell['value'] ?? '')));
                    
                    $colspan = $cell['colspan'] ?? 1; 
                    $rowspan = $cell['rowspan'] ?? 1;
                    $actualColspan = min($colspan, $maxGridCols - $c + 1);

                    if ($actualColspan > 1 || $rowspan > 1) {
                        $endColLetter = Coordinate::stringFromColumnIndex($targetCol + $actualColspan - 1);
                        $endRow = $targetRow + $rowspan - 1;
                        $sheet->mergeCells("{$coord}:{$endColLetter}{$endRow}");
                    }
                    
                    $style = $sheet->getStyle($coord);
                    $style->getAlignment()->setVertical(Alignment::VERTICAL_CENTER)->setHorizontal(Alignment::HORIZONTAL_CENTER)->setWrapText(true);
                    
                    if (isset($cell['isHeader']) && $cell['isHeader']) {
                        $style->getFont()->setBold(true);
                        $style->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFF2F2F2');
                    }
                }
            }

            for ($c = 1; $c <= $maxGridCols; $c++) {
                if (empty($occupied[$r][$c])) {
                    $targetCol = $c + 1; 
                    $cellLetter = Coordinate::stringFromColumnIndex($targetCol);
                    $coord = $cellLetter . $targetRow;
                    
                    $isHeaderRow = false;
                    if (isset($origins[$r])) {
                        foreach ($origins[$r] as $origin) {
                            if ($origin['isHeader']) { $isHeaderRow = true; break; }
                        }
                    }

                    if ($isHeaderRow) {
                        $sheet->getStyle($coord)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFF2F2F2');
                        $sheet->setCellValue($coord, ''); 
                    } else {
                        $sheet->setCellValue($coord, '-');
                    }
                    
                    $style = $sheet->getStyle($coord);
                    $style->getAlignment()->setVertical(Alignment::VERTICAL_CENTER)->setHorizontal(Alignment::HORIZONTAL_CENTER);
                }
            }
        }
    }
}