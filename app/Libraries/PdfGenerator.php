<?php

namespace App\Libraries;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfGenerator
{
    private const PDF_MAX_COLS_LANDSCAPE = 20;
    private const PDF_MAX_ROWS_LANDSCAPE = 35;
    private const PDF_MAX_COLS_PORTRAIT = 6;
    private const PDF_MAX_ROWS_PORTRAIT = 35;

    public function generate(string $htmlString, array $context)
    {
        extract($context); 
        // Variabel yg tersedia: $alldata, $namaProduk, $judulProses, $noDok, $machNo, $prosesInfo, $typeProcess, $process

        $tableElement = $this->extractTableElement($htmlString, 'table1');
        if ($tableElement === null) die("Error: <table id=\"table1\"> tidak ditemukan di view!");

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

        $kopSuratHtml = $this->buildKopSuratHtml($namaProduk, $judulProses, $noDok, $machNo, $alldata, $prosesInfo, $typeProcess);

        $pagesHtml = '';
        $chunkCount = 0;
        
        foreach ($rowChunks as $j => $rRange) {
            foreach ($colChunks as $i => $cRange) {
                $pageBreakStyle = ($chunkCount > 0) ? ' style="page-break-before: always;"' : '';
                $tableHtml = $this->build2DChunkTableHtml($grid, $identityColCount, $cRange, $headerRowCount, $rRange);
                $pagesHtml .= "<div{$pageBreakStyle}>\n{$tableHtml}\n</div>";
                $chunkCount++;
            }
        }

        $customCSS = '
        <style>
            @page { size: A4 ' . $orientation . '; margin-top: 140px; margin-bottom: 30px; margin-left: 30px; margin-right: 30px; }
            body { font-family: Arial, Helvetica, sans-serif; font-size: 7px; }
            header { position: fixed; top: -125px; left: 0px; right: 0px; height: 110px; }
            table.table-cs { width: 100%; border-collapse: collapse; border: 1px solid black; }
            table.table-cs td, table.table-cs th { border: 1px solid black !important; padding: 3px !important; text-align: center; vertical-align: middle; word-wrap: break-word; }
            th { background-color: #f8f9fa; font-weight: bold; }
            tr { page-break-inside: avoid; }
        </style>';

        $finalHtml = "<html><head>{$customCSS}</head><body><header>{$kopSuratHtml}</header><main>{$pagesHtml}</main></body></html>";

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'Arial');

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($finalHtml);
        $dompdf->setPaper('A4', $orientation);
        $dompdf->render();

        $fileName = 'Report_' . strtoupper($process) . '_' . date('Ymd_Hi') . '.pdf';
        $dompdf->stream($fileName, ["Attachment" => true]);
        exit();
    }

    // --- HELPER PDF ---
    private function extractTableElement(string $html, string $id = 'table1'): ?\DOMElement {
        $doc = new \DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML('<?xml encoding="UTF-8">' . $html);
        libxml_clear_errors();
        $xpath = new \DOMXPath($doc);
        $nodes = $xpath->query("//table[@id='{$id}']");
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
                $maxCol = max($maxCol, $col + $colspan - 1);
                $col += $colspan;
            }
            $currentRow++;
        }
        return ['origins' => $origins, 'isHeaderMap' => $isHeaderMap, 'totalRows' => $currentRow - 1, 'totalCols' => $maxCol];
    }

    private function decideOrientation(int $totalCols): string { return $totalCols <= 12 ? 'portrait' : 'landscape'; }

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
        $requiredSpan = $headerRowCount - $startRow + 1;
        $count = 0; $c = 1;
        while ($c <= $grid['totalCols']) {
            $origin = $grid['origins'][$startRow][$c] ?? null;
            if ($origin === null || $origin['rowspan'] !== $requiredSpan) break;
            $count += $origin['colspan']; $c += $origin['colspan'];
        }
        return $count;
    }

    private function computeUnsafeRowBoundaries(array $grid, int $headerRowCount): array {
        $unsafe = [];
        for ($c = 1; $c <= $grid['totalCols']; $c++) {
            for ($r = $headerRowCount + 1; $r <= $grid['totalRows']; $r++) {
                $cell = $grid['origins'][$r][$c] ?? null;
                if ($cell !== null && $cell['rowspan'] > 1) {
                    for ($p = $r; $p < $r + $cell['rowspan'] - 1; $p++) $unsafe[$p] = true; 
                }
            }
        }
        return $unsafe;
    }

    private function computeColumnChunks(int $totalCols, int $identityColCount, int $dataColsPerPage): array {
        $chunks = []; $start = $identityColCount + 1;
        while ($start <= $totalCols) {
            $end = min($totalCols, $start + $dataColsPerPage - 1);
            $chunks[] = [$start, $end];
            $start = $end + 1;
        }
        return $chunks ?: [[$identityColCount + 1, $totalCols]];
    }

    private function computeRowChunks(int $totalRows, int $headerRowCount, array $unsafeRowBoundaries, int $maxRowsPerPage): array {
        $chunks = []; $start = $headerRowCount + 1;
        if ($start > $totalRows) return [[$start, $start]];
        while ($start <= $totalRows) {
            $target = min($totalRows, $start + $maxRowsPerPage - 1); $end = $target;
            while ($end > $start && !empty($unsafeRowBoundaries[$end])) $end--;
            if ($end === $start && !empty($unsafeRowBoundaries[$end])) {
                $end = $target; while ($end < $totalRows && !empty($unsafeRowBoundaries[$end])) $end++;
            }
            $chunks[] = [$start, $end]; $start = $end + 1;
        }
        return $chunks;
    }

    private function build2DChunkTableHtml(array $grid, int $identityColCount, array $colRange, int $headerRowCount, array $rowRange): string {
        [$startCol, $endCol] = $colRange; [$startRow, $endRow] = $rowRange;
        $colMap = [];
        for ($c = 1; $c <= $identityColCount; $c++) $colMap[$c] = count($colMap) + 1;
        for ($c = $startCol; $c <= $endCol; $c++) $colMap[$c] = count($colMap) + 1;
        $totalOriginalCols = $grid['totalCols'];
        
        $renderRow = function (int $r) use ($grid, $colMap, $totalOriginalCols): string {
            $html = '<tr>'; 
            if (isset($grid['origins'][$r])) {
                foreach ($grid['origins'][$r] as $c => $origin) {
                    $actualColspan = 0;
                    $overlapEndCol = min($c + $origin['colspan'] - 1, $totalOriginalCols);
                    for($i = $c; $i <= $overlapEndCol; $i++) if (isset($colMap[$i])) $actualColspan++;
                    if ($actualColspan > 0) {
                        $tag = $origin['isHeader'] ? 'th' : 'td';
                        $rowspanAttr = $origin['rowspan'] > 1 ? ' rowspan="' . $origin['rowspan'] . '"' : '';
                        $colspanAttr = $actualColspan > 1 ? ' colspan="' . $actualColspan . '"' : '';
                        $value = htmlspecialchars($origin['value'], ENT_QUOTES, 'UTF-8');
                        $html .= "<{$tag}{$rowspanAttr}{$colspanAttr}>{$value}</{$tag}>";
                    }
                }
            }
            $html .= '</tr>'; return $html;
        };

        $thead = '<thead>'; for ($r = 1; $r <= $headerRowCount; $r++) $thead .= $renderRow($r); $thead .= '</thead>';
        $tbody = '<tbody>'; for ($r = $startRow; $r <= $endRow; $r++) if ($r <= $grid['totalRows']) $tbody .= $renderRow($r); $tbody .= '</tbody>';
        return '<table class="table-cs">' . $thead . $tbody . '</table>';
    }

    private function buildKopSuratHtml(string $namaProduk, string $judulProses, string $noDok, string $machNo, array $alldata, array $prosesInfo, string $typeProcess): string {
        $revisi = str_pad(!empty($prosesInfo['revisi']) ? $prosesInfo['revisi'] : 0, 2, '0', STR_PAD_LEFT);
        $tglBerlaku = '-'; $timestamp = 0;
        
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

        $kotakTtdHtml = '';
        if ($typeProcess === 'startup') {
            $kotakTtdHtml = '<tr><td style="width: 50%; text-align: center; padding: 2px;">QC</td><td style="text-align: center; padding: 2px;">Production</td></tr><tr><td style="height: 25px;"></td><td style="height: 25px;"></td></tr>';
        } else {
            $namaApprover = '';
            if (!empty($alldata)) {
                if (!empty($alldata[0]['supervisor'])) $namaApprover = $alldata[0]['supervisor']; 
                elseif (!empty($alldata[0]['leader'])) $namaApprover = $alldata[0]['leader']; 
                elseif (!empty($alldata[0]['foreman'])) $namaApprover = $alldata[0]['foreman'];
            }
            $ttd = $namaApprover !== '' ? '<span style="font-size: 8px;">Approved by:<br><b>' . htmlspecialchars($namaApprover) . '</b></span>' : '';
            $kotakTtdHtml = '<tr><td colspan="2" style="text-align: center; vertical-align: middle; padding: 2px;">Checked</td></tr><tr><td colspan="2" style="text-align: center; height: 25px; vertical-align: bottom; padding: 2px;">' . $ttd . '</td></tr>';
        }

        return '
        <table style="width: 100%; border: none; font-size: 9px; table-layout: fixed; margin-bottom: 5px;">
            <tr>
                <td style="width: 35%; vertical-align: top; border: none; padding: 0;">PT. FOXCONN TECHNOLOGIES INDONESIA<br>Production Engineering Department<br>Process Engineering Section<br><b>' . htmlspecialchars($namaProduk) . '</b></td>
                <td style="width: 40%; text-align: center; vertical-align: top; border: none; padding: 0;"><b style="font-size: 12px; text-decoration: underline;">' . htmlspecialchars($judulProses) . '</b><br><span style="font-size: 10px;">(' . htmlspecialchars($namaProduk) . ')</span></td>
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
        <div style="font-size: 9px; text-align: left;">MACHINE No &nbsp;&nbsp;&nbsp;: ' . htmlspecialchars($machNo) . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AG Paste Type &nbsp;&nbsp;: </div>';
    }
}