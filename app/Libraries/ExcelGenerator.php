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

        // 1. Ekstrak Elemen Tabel & Dapatkan Jumlah Kolom Parameter Statis Secara Dinamis
        $extractResult = $this->extractTableElement($htmlString, 'table1', $typeProcess, $namaApprover, $alldata ?? []);
        if ($extractResult === null) die("Error: table1 tidak ditemukan atau format tidak sesuai.");
        
        $tableElement = $extractResult['table'];
        $identityCols = $extractResult['identityCols']; 

        $grid = $this->buildGrid($tableElement);
        $headerRowCount = $this->countHeaderRows($grid);

        $spreadsheet = new Spreadsheet();
        $spreadsheet->getDefaultStyle()->getFont()->setName('Arial')->setSize(11);
        $sheet = $spreadsheet->getActiveSheet();
        
        $tableStartRow = 6; 
        // ini der kalau mau ubah posisi tabel, ubah $tableStartRow di atas dan sesuaikan setRowsToRepeatAtTopByStartAndEnd di bawah
        $PER_PAGE = 13; 
        $dataColsCount = count($alldata ?? []);
        
        // 2. Tulis Kop Surat & Tabel
        if ($typeProcess === 'startup') {
             $totalPages = max(1, ceil($dataColsCount / $PER_PAGE));
             $paddedDataCols = $totalPages * $PER_PAGE;
             
             $this->insertKopSuratHorizontal($sheet, 2, $paddedDataCols, $namaProduk, $judulProses, $noDok, $machNo, $tglBerlaku, $namaApprover, $revisi, $typeProcess, $identityCols, $PER_PAGE);
             
             // Meneruskan $dataColsCount agar sistem tahu kapan harus melebarkan colspan header
             $this->writeBlockFromGrid($grid, $sheet, $tableStartRow, $grid['totalCols'], $paddedDataCols, $identityCols, $dataColsCount);
             
             $lastColIndex = $identityCols + 1 + $paddedDataCols; 
        } else {
             $totalDataCols = max(1, $grid['totalCols'] - $identityCols);
             $this->insertKopSuratHorizontal($sheet, 2, $totalDataCols, $namaProduk, $judulProses, $noDok, $machNo, $tglBerlaku, $namaApprover, $revisi, $typeProcess, $identityCols, $totalDataCols);
             $this->writeBlockFromGrid($grid, $sheet, $tableStartRow, $grid['totalCols'], $totalDataCols, $identityCols, $dataColsCount);
             
             $lastColIndex = $grid['totalCols'] + 1;
        }

        $lastRow = $tableStartRow + $grid['totalRows'] - 1;
        $lastColLetter = Coordinate::stringFromColumnIndex($lastColIndex); 
        
        // Bingkai Seluruh Tabel
        $tableRange = "B{$tableStartRow}:{$lastColLetter}{$lastRow}";
        $sheet->getStyle($tableRange)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // 3. Setup Halaman Print
        $sheet->getSheetView()->setView(SheetView::SHEETVIEW_PAGE_BREAK_PREVIEW);
        $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);
        
        $headerEndRow = $tableStartRow + $headerRowCount - 1;
        $sheet->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, $headerEndRow);
        
        $lastIdentityColLetter = Coordinate::stringFromColumnIndex($identityCols + 1);

        if ($typeProcess === 'startup') {
            $sheet->getPageSetup()->setFitToPage(true);
            $sheet->getPageSetup()->setFitToWidth(0); 
            $sheet->getPageSetup()->setFitToHeight(1); 
            $sheet->getPageSetup()->setColumnsToRepeatAtLeftByStartAndEnd('B', $lastIdentityColLetter); 

            $totalPages = max(1, ceil($dataColsCount / $PER_PAGE));
            for ($p = 1; $p < $totalPages; $p++) {
                $breakColIndex = ($identityCols + 1) + ($p * $PER_PAGE) + 1; 
                $breakColLetter = Coordinate::stringFromColumnIndex($breakColIndex);
                $sheet->setBreak($breakColLetter . '1', \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet::BREAK_COLUMN);
            }
            $sheet->getPageSetup()->setPrintArea("A1:{$lastColLetter}{$lastRow}");
        } else {
            $sheet->getPageSetup()->setFitToPage(true);
            $sheet->getPageSetup()->setFitToWidth(1);
            $sheet->getPageSetup()->setFitToHeight(0); 
            $sheet->getPageSetup()->setPrintArea("A1:{$lastColLetter}{$lastRow}");
        }
        
        $sheet->getPageMargins()->setTop(0.4)->setRight(0.3)->setLeft(0.3)->setBottom(0.4);
        $sheet->getColumnDimension('A')->setWidth(2); 

        // 4. Atur Lebar Kolom
        $sheet->getColumnDimension('B')->setWidth(5);     
        for ($col = 3; $col <= $identityCols + 1; $col++) {
            $sheet->getColumnDimension(Coordinate::stringFromColumnIndex($col))->setWidth(20); 
        }
        for ($col = $identityCols + 2; $col <= $lastColIndex; $col++) {
            $sheet->getColumnDimension(Coordinate::stringFromColumnIndex($col))->setWidth(12);
        }

        $fileName = 'Report_' . strtoupper($process ?? 'DOC') . '_' . date('Ymd_Hi') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');
        
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit();
    }

    private function extractTableElement(string $html, string $id, string $typeProcess, string $namaApprover, array $alldata): ?array {
        $doc = new \DOMDocument(); libxml_use_internal_errors(true); $doc->loadHTML('<?xml encoding="UTF-8">' . $html); libxml_clear_errors();
        $xpath = new \DOMXPath($doc); $nodes = $xpath->query("//table[@id='{$id}']");
        $table = $nodes->length > 0 ? $nodes->item(0) : null;
        if (!$table) return null;

        $maxExistingCols = 0;
        $trs = iterator_to_array($table->getElementsByTagName('tr'));
        foreach ($trs as $tr) {
            $cols = 0;
            foreach ($tr->childNodes as $td) {
                if ($td instanceof \DOMElement && in_array(strtolower($td->tagName), ['td','th'])) {
                    $cols += (int)($td->getAttribute('colspan') ?: 1);
                }
            }
            if ($cols > $maxExistingCols) $maxExistingCols = $cols;
        }
        $dataColsCount = count($alldata);
        $identityCols = max(1, $maxExistingCols - $dataColsCount);

        if ($typeProcess === 'startup') {
            foreach ($trs as $tr) {
                $firstCell = $tr->getElementsByTagName('td')->item(0) ?? $tr->getElementsByTagName('th')->item(0);
                if ($firstCell) {
                    $txt = strtolower(trim($firstCell->textContent));
                    if (strpos($txt, 'status approval') !== false || strpos($txt, 'operator') !== false || strpos($txt, 'approved by') !== false) {
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

                $PER_PAGE = 14;
                $totalPages = max(1, ceil($dataColsCount / $PER_PAGE));
                $targetCols = $totalPages * $PER_PAGE;

                $opTr = $doc->createElement('tr');
                $tdOpLbl = $doc->createElement('td', 'Operator');
                $tdOpLbl->setAttribute('colspan', (string)$identityCols);
                $opTr->appendChild($tdOpLbl);

                for ($i = 0; $i < $targetCols; $i++) {
                    if (isset($alldata[$i])) {
                        $opName = $getVal($alldata[$i], ['operator', 'op_start', 'nama_operator', 'pic', 'created_by', 'name']);
                        $tdOpData = $doc->createElement('td', htmlspecialchars($opName));
                    } else {
                        $tdOpData = $doc->createElement('td', '-');
                    }
                    $opTr->appendChild($tdOpData);
                }
                $noteTr->parentNode->insertBefore($opTr, $noteTr);

                $appTr = $doc->createElement('tr');
                $tdAppLbl = $doc->createElement('td', 'Approved by');
                $tdAppLbl->setAttribute('colspan', (string)$identityCols);
                $appTr->appendChild($tdAppLbl);

                for ($i = 0; $i < $targetCols; $i++) {
                    if (isset($alldata[$i])) {
                        $status = strtolower(trim($getVal($alldata[$i], ['status_approval', 'status', 'is_approved', 'approval'])));
                        if (strpos($status, 'approve') !== false || strpos($status, 'bypass') !== false) {
                            $spv = $getVal($alldata[$i], ['supervisor']);
                            $ldr = $getVal($alldata[$i], ['leader']);
                            $frm = $getVal($alldata[$i], ['foreman']);
                            $appText = 'Approved';
                            if ($spv !== '-') $appText = trim($spv) . "\n(Supervisor)";
                            elseif ($ldr !== '-') $appText = trim($ldr) . "\n(Leader)";
                            elseif ($frm !== '-') $appText = trim($frm) . "\n(Foreman)";

                            $tdAppData = $doc->createElement('td');
                            $tdAppData->appendChild($doc->createTextNode($appText));
                        } else {
                            $tdAppData = $doc->createElement('td', '-');
                        }
                    } else {
                        $tdAppData = $doc->createElement('td', '-');
                    }
                    $appTr->appendChild($tdAppData);
                }
                $noteTr->parentNode->insertBefore($appTr, $noteTr);
            }
        }
        return ['table' => $table, 'identityCols' => $identityCols];
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

    private function insertKopSuratHorizontal($sheet, int $startRow, int $targetDataCols, string $namaProduk, string $judulProses, string $noDok, string $machNo, string $tglBerlaku, string $namaApprover, string $revisi, string $typeProcess, int $identityCols, int $PER_PAGE) {
        $r1 = $startRow; $r2 = $startRow + 1; $r3 = $startRow + 2; $r4 = $startRow + 3;

        $lastIdentityLetter = Coordinate::stringFromColumnIndex($identityCols + 1);

        $sheet->setCellValue("B{$r1}", "PT. FOXCONN TECHNOLOGIES INDONESIA\nProduction Engineering Department\nProcess Engineering Section\n" . $namaProduk);
        $sheet->mergeCells("B{$r1}:{$lastIdentityLetter}{$r3}");
        $sheet->getStyle("B{$r1}")->getAlignment()->setWrapText(true)->setVertical(Alignment::VERTICAL_TOP);
        $sheet->getStyle("B{$r1}")->getFont()->setBold(true)->setSize(10);
        
        $sheet->setCellValue("B{$r4}", "MACHINE No : " . $machNo);
        $sheet->mergeCells("B{$r4}:{$lastIdentityLetter}{$r4}");
        $sheet->getStyle("B{$r4}")->getFont()->setBold(true)->setSize(10);
        $sheet->getStyle("B{$r1}:{$lastIdentityLetter}{$r4}")->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        if ($typeProcess === 'startup') {
            $totalPages = max(1, ceil($targetDataCols / $PER_PAGE));
            for ($p = 0; $p < $totalPages; $p++) {
                $chunkStartCol = ($identityCols + 2) + ($p * $PER_PAGE);
                $chunkEndCol = $chunkStartCol + $PER_PAGE - 1; 
                $docStartCol = $chunkEndCol - 2; 

                $this->drawCenterAndRightKopSurat($sheet, $r1, $r2, $r3, $r4, $chunkStartCol, $chunkEndCol, $docStartCol, $namaProduk, $judulProses, $noDok, $tglBerlaku, $namaApprover, $revisi, $typeProcess);
            }
        } else {
            $chunkStartCol = $identityCols + 2;
            $chunkEndCol = $chunkStartCol + $targetDataCols - 1; 
            $docStartCol = max($chunkStartCol + 1, $chunkEndCol - 2);
            $this->drawCenterAndRightKopSurat($sheet, $r1, $r2, $r3, $r4, $chunkStartCol, $chunkEndCol, $docStartCol, $namaProduk, $judulProses, $noDok, $tglBerlaku, $namaApprover, $revisi, $typeProcess);
        }

        for ($r = $r1; $r <= $r3; $r++) $sheet->getRowDimension($r)->setRowHeight(20);
        $sheet->getRowDimension($r4)->setRowHeight(38); 
    }

    private function drawCenterAndRightKopSurat($sheet, $r1, $r2, $r3, $r4, $chunkStartCol, $chunkEndCol, $docStartCol, $namaProduk, $judulProses, $noDok, $tglBerlaku, $namaApprover, $revisi, $typeProcess) {
        $docStartLetter = Coordinate::stringFromColumnIndex($docStartCol);
        $docMidLetter   = Coordinate::stringFromColumnIndex($docStartCol + 1);
        $docEndLetter   = Coordinate::stringFromColumnIndex($chunkEndCol);

        $sheet->setCellValue("{$docStartLetter}{$r1}", "No. Dok / No."); $sheet->setCellValue("{$docMidLetter}{$r1}", ": " . $noDok);
        $sheet->setCellValue("{$docStartLetter}{$r2}", "Revisi");       $sheet->setCellValue("{$docMidLetter}{$r2}", ": " . $revisi);
        $sheet->setCellValue("{$docStartLetter}{$r3}", "Berlaku");      $sheet->setCellValue("{$docMidLetter}{$r3}", ": " . $tglBerlaku);

        $sheet->mergeCells("{$docMidLetter}{$r1}:{$docEndLetter}{$r1}");
        $sheet->mergeCells("{$docMidLetter}{$r2}:{$docEndLetter}{$r2}");
        $sheet->mergeCells("{$docMidLetter}{$r3}:{$docEndLetter}{$r3}");

        if ($typeProcess === 'startup') {
            $sheet->setCellValue("{$docStartLetter}{$r4}", "QC"); 
            $sheet->setCellValue("{$docMidLetter}{$r4}", "Production");
            $sheet->mergeCells("{$docMidLetter}{$r4}:{$docEndLetter}{$r4}");
            $sheet->getStyle("{$docStartLetter}{$r4}:{$docEndLetter}{$r4}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
        } else {
            $ttdText = $namaApprover !== '' ? "Checked\n\nApproved by: " . $namaApprover : "Checked";
            $sheet->setCellValue("{$docStartLetter}{$r4}", $ttdText); 
            $sheet->mergeCells("{$docStartLetter}{$r4}:{$docEndLetter}{$r4}");
            $sheet->getStyle("{$docStartLetter}{$r4}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER)->setWrapText(true);
        }

        $sheet->getStyle("{$docStartLetter}{$r1}:{$docStartLetter}{$r3}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

        $midEndLetter = Coordinate::stringFromColumnIndex(max($chunkStartCol, $docStartCol - 1));
        $centerStartLetter = Coordinate::stringFromColumnIndex($chunkStartCol);
        
        $sheet->setCellValue("{$centerStartLetter}{$r1}", $judulProses . "\n(" . $namaProduk . ")");
        $sheet->mergeCells("{$centerStartLetter}{$r1}:{$midEndLetter}{$r3}");
        $sheet->getStyle("{$centerStartLetter}{$r1}")->getAlignment()->setWrapText(true)->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle("{$centerStartLetter}{$r1}")->getFont()->setBold(true)->setSize(12)->setUnderline(true);
        $sheet->mergeCells("{$centerStartLetter}{$r4}:{$midEndLetter}{$r4}");
        
        $sheet->getStyle("{$centerStartLetter}{$r1}:{$docEndLetter}{$r4}")->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
    }

    private function writeBlockFromGrid(array $grid, $sheet, int $startRow, int $maxGridCols, int $targetDataCols, int $identityCols, int $dataColsCount) {
        $occupied = $grid['occupied'] ?? [];
        $origins = $grid['origins'] ?? [];
        $maxRow = $grid['totalRows'];
        
        $targetGridCols = $identityCols + $targetDataCols;

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

                    // FIX UTAMA: Lebarkan header (seperti "Hasil Start Up Check") agar menutupi penuh 14 kolom
                    if ($colspan > 1 && $dataColsCount > 0 && ($c + $colspan - 1) === ($identityCols + $dataColsCount)) {
                        $oldColspan = $colspan;
                        $colspan += ($targetDataCols - $dataColsCount);
                        
                        // Tandai area yang baru saja dilebarkan sebagai 'terisi' agar tidak tertimpa strip (-)
                        for ($rr = $r; $rr < $r + $rowspan; $rr++) {
                            for ($cc = $c + $oldColspan; $cc < $c + $colspan; $cc++) {
                                $occupied[$rr][$cc] = true;
                            }
                        }
                    }

                    $actualColspan = min($colspan, $targetGridCols - $c + 1);

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

            // FIX UTAMA: Looping pengisian sel kosong (-) disederhanakan dan dijamin sejajar dengan colspan
            for ($c = 1; $c <= $targetGridCols; $c++) {
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
                    $sheet->getStyle($coord)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER)->setHorizontal(Alignment::HORIZONTAL_CENTER);
                }
            }
        }
    }
}