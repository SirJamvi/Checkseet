<?php

namespace App\Libraries;

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExcelGenerator
{
    // =========================================================================
    // HELPER UNIVERSAL: Ambil <table id="..."> dari HTML
    // =========================================================================
    public function extractTableElement(string $html, string $id = 'table1'): ?\DOMElement
    {
        $doc = new \DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML('<?xml encoding="UTF-8">' . $html);
        libxml_clear_errors();

        $xpath = new \DOMXPath($doc);
        $nodes = $xpath->query("//table[@id='{$id}']");

        return $nodes->length > 0 ? $nodes->item(0) : null;
    }

    // =========================================================================
    // MESIN UNIVERSAL: HTML <table> -> Excel (Dengan Auto-Clamping Colspan)
    // =========================================================================
    public function htmlTableToSheet(\DOMElement $table, Worksheet $sheet, int $startRow): array
    {
        // ---------------------------------------------------------------------
        // TAHAP 1: PRE-PASS (Mendeteksi Lebar Asli Tabel)
        // Mencegah judul tabel dengan colspan="100" merusak lebar Kop Surat
        // ---------------------------------------------------------------------
        $realMaxCol = 1;
        $hasMultiCellRow = false;

        foreach ($table->getElementsByTagName('tr') as $tr) {
            $nodeCount = 0;
            $rowWidth = 0;
            foreach ($tr->childNodes as $cell) {
                if (!($cell instanceof \DOMElement)) continue;
                if (!in_array(strtolower($cell->tagName), ['td', 'th'])) continue;
                
                $nodeCount++;
                $rowWidth += max(1, (int) ($cell->getAttribute('colspan') ?: 1));
            }
            
            // Jadikan baris yang memiliki lebih dari 1 cell sebagai patokan lebar asli
            if ($nodeCount > 1) {
                $hasMultiCellRow = true;
                if ($rowWidth > $realMaxCol) {
                    $realMaxCol = $rowWidth;
                }
            }
        }

        // Fallback jika tabel benar-benar hanya berisi 1 sel
        if (!$hasMultiCellRow) {
            $realMaxCol = $rowWidth;
        }
        if ($realMaxCol < 1) $realMaxCol = 1;

        // ---------------------------------------------------------------------
        // TAHAP 2: RENDERING CELL EXCEL
        // ---------------------------------------------------------------------
        $occupied = []; 
        $currentRow = $startRow;

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

                // Lompati sel yang sudah terisi oleh merge dari baris/kolom sebelumnya
                while (!empty($occupied[$currentRow][$col])) {
                    $col++;
                }

                // Jangan proses jika sudah melebihi batas kolom asli
                if ($col > $realMaxCol) break; 

                $colspan = max(1, (int) ($cell->getAttribute('colspan') ?: 1));
                $rowspan = max(1, (int) ($cell->getAttribute('rowspan') ?: 1));

                // CLAMPING: Paksa colspan agar tidak melebihi lebar tabel asli
                if ($col + $colspan - 1 > $realMaxCol) {
                    $colspan = $realMaxCol - $col + 1;
                    if ($colspan < 1) $colspan = 1;
                }

                $value = preg_replace('/\s+/u', ' ', trim($cell->textContent));

                // Koordinat awal
                $coord = Coordinate::stringFromColumnIndex($col) . $currentRow;
                $sheet->setCellValue($coord, $value);

                // Hitung koordinat akhir untuk merge
                $endCol = $col + $colspan - 1;
                $endRow = $currentRow + $rowspan - 1;
                $endCoord = Coordinate::stringFromColumnIndex($endCol) . $endRow;

                // Tentukan jangkauan (range)
                $range = ($colspan > 1 || $rowspan > 1) ? "{$coord}:{$endCoord}" : $coord;

                // Lakukan Merge
                if ($colspan > 1 || $rowspan > 1) {
                    $sheet->mergeCells($range);
                }

                // PERBAIKAN BORDER:
                // Terapkan Styling dan Border ke SELURUH RANGE secara bersamaan.
                // Ini mencegah garis putus-putus pada cell yang digabungkan.
                $style = $sheet->getStyle($range);
                $style->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                $style->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                    ->setVertical(Alignment::VERTICAL_CENTER)
                    ->setWrapText(true);

                if ($tag === 'th') {
                    $style->getFont()->setBold(true);
                    $style->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('F8F9FA');
                }

                // Tandai grid yang terisi agar dilompati di iterasi berikutnya
                for ($r = $currentRow; $r <= $endRow; $r++) {
                    for ($c = $col; $c <= $endCol; $c++) {
                        $occupied[$r][$c] = true;
                    }
                }

                $col = $endCol + 1;
            }

            $currentRow++;
        }

        return ['lastRow' => $currentRow - 1, 'maxCol' => $realMaxCol];
    }

    // =========================================================================
    // Sisipkan kop surat (universal, proporsional terhadap jumlah kolom tabel)
    // =========================================================================
    public function injectKopSuratExcel(
        Worksheet $sheet,
        int $maxCol,
        string $docType,
        string $namaProduk,
        string $judulProsesLengkap,
        string $noDok,
        string $revisi,
        string $berlaku,
        string $machNo
    ): void {
        $sheet->insertNewRowBefore(1, 8); 

        $maxCol = max($maxCol, 4);

        $colRight = 2;
        $colLeft = (int) floor($maxCol * 0.3);
        $colLeft = max(1, min($colLeft, $maxCol - $colRight - 1));
        $colCenterEnd = $maxCol - $colRight;

        $colLabel = $maxCol - 1;
        $colValue = $maxCol;

        $leftEndColLetter = Coordinate::stringFromColumnIndex($colLeft);
        $centerStartColLetter = Coordinate::stringFromColumnIndex($colLeft + 1);
        $centerEndColLetter = Coordinate::stringFromColumnIndex($colCenterEnd);
        $colLabelLetter = Coordinate::stringFromColumnIndex($colLabel);
        $colValueLetter = Coordinate::stringFromColumnIndex($colValue);

        // A. Blok kiri
        $sheet->mergeCells("A1:{$leftEndColLetter}4");
        $sheet->setCellValue("A1", "PT. FOXCONN TECHNOLOGIES INDONESIA\nProduction Engineering Department\n" . strtoupper($docType) . "\n" . strtoupper($namaProduk));
        $sheet->getStyle("A1")->getAlignment()->setWrapText(true)->setVertical(Alignment::VERTICAL_TOP)->setHorizontal(Alignment::HORIZONTAL_LEFT);

        // B. Blok tengah
        $sheet->mergeCells("{$centerStartColLetter}1:{$centerEndColLetter}2");
        $sheet->setCellValue("{$centerStartColLetter}1", strtoupper($judulProsesLengkap));
        $sheet->getStyle("{$centerStartColLetter}1")->getAlignment()->setWrapText(true)
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle("{$centerStartColLetter}1")->getFont()->setBold(true)->setUnderline(true)->setSize(14);

        $sheet->mergeCells("{$centerStartColLetter}3:{$centerEndColLetter}3");
        $sheet->setCellValue("{$centerStartColLetter}3", "(" . strtoupper($namaProduk) . ")");
        $sheet->getStyle("{$centerStartColLetter}3")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // C. Blok kanan
        $sheet->setCellValue("{$colLabelLetter}1", "No. Dok");
        $sheet->setCellValue("{$colValueLetter}1", ": " . $noDok);
        $sheet->setCellValue("{$colLabelLetter}2", "Revisi");
        $sheet->setCellValue("{$colValueLetter}2", ": " . $revisi);
        $sheet->setCellValue("{$colLabelLetter}3", "Berlaku");
        $sheet->setCellValue("{$colValueLetter}3", ": " . $berlaku);

        $sheet->mergeCells("{$colLabelLetter}4:{$colValueLetter}4");
        $sheet->setCellValue("{$colLabelLetter}4", "Checked");
        $sheet->getStyle("{$colLabelLetter}4")->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);

        $sheet->getStyle("{$colLabelLetter}1:{$colValueLetter}4")->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // D. Keterangan mesin
        $sheet->setCellValue("A6", "MACHINE No");
        $sheet->setCellValue("C6", ": " . $machNo);
        $sheet->setCellValue("A7", "AG Paste Type");
        $sheet->setCellValue("C7", ": ");
    }
}