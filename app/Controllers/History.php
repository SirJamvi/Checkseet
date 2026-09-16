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
    // HELPER UNIVERSAL: Ambil <table id="..."> dari HTML apapun secara aman.
    // Pakai DOMDocument + XPath, BUKAN regex — supaya tidak rawan salah tangkap
    // (backtracking) seperti masalah yang pernah kita alami sebelumnya, dan
    // supaya konsisten untuk 171 view apapun strukturnya.
    // =========================================================================
    private function extractTableElement(string $html, string $id = 'table1'): ?\DOMElement
    {
        $doc = new \DOMDocument();
        libxml_use_internal_errors(true);
        // Prefix trik supaya karakter non-ASCII (±, θ, ✓, dll) tidak rusak.
        $doc->loadHTML('<?xml encoding="UTF-8">' . $html);
        libxml_clear_errors();

        $xpath = new \DOMXPath($doc);
        $nodes = $xpath->query("//table[@id='{$id}']");

        return $nodes->length > 0 ? $nodes->item(0) : null;
    }

    // =========================================================================
    // MESIN UNIVERSAL: HTML <table> (dengan colspan/rowspan apapun) -> Excel.
    // Ini yang membuat solusi jadi generik untuk SEMUA proses & device: kita
    // tidak perlu tahu "pola" tabelnya (row-per-record / grup-3 / grup-5 /
    // pivot-kolom) karena kita hanya membaca HASIL AKHIR HTML-nya, sama
    // seperti browser membacanya, lalu memetakan grid itu apa adanya ke cell
    // Excel + merge + border.
    //
    // Return: [lastRow, maxCol] supaya pemanggil tahu ukuran tabel yang
    // sesungguhnya (dipakai untuk menghitung proporsi kop surat).
    // =========================================================================
    private function htmlTableToSheet(\DOMElement $table, Worksheet $sheet, int $startRow): array
    {
        $occupied = []; // $occupied[row][col] = true jika sudah terisi (termasuk area rowspan/colspan)
        $currentRow = $startRow;
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

                // Lompati kolom yang sudah terisi oleh rowspan/colspan dari baris sebelumnya
                while (!empty($occupied[$currentRow][$col])) {
                    $col++;
                }

                $colspan = max(1, (int) ($cell->getAttribute('colspan') ?: 1));
                $rowspan = max(1, (int) ($cell->getAttribute('rowspan') ?: 1));

                // Ambil teks cell, rapikan whitespace berlebih (hasil indentasi HTML)
                $value = preg_replace('/\s+/u', ' ', trim($cell->textContent));

                $coord = Coordinate::stringFromColumnIndex($col) . $currentRow;
                $sheet->setCellValue($coord, $value);

                $style = $sheet->getStyle($coord);
                $style->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                $style->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                    ->setVertical(Alignment::VERTICAL_CENTER)
                    ->setWrapText(true);

                if ($tag === 'th') {
                    $style->getFont()->setBold(true);
                    $style->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('F8F9FA');
                }

                $endCol = $col + $colspan - 1;
                $endRow = $currentRow + $rowspan - 1;

                if ($colspan > 1 || $rowspan > 1) {
                    $endCoord = Coordinate::stringFromColumnIndex($endCol) . $endRow;
                    $sheet->mergeCells("{$coord}:{$endCoord}");
                }

                for ($r = $currentRow; $r <= $endRow; $r++) {
                    for ($c = $col; $c <= $endCol; $c++) {
                        $occupied[$r][$c] = true;
                    }
                }

                $maxCol = max($maxCol, $endCol);
                $col = $endCol + 1;
            }

            $currentRow++;
        }

        return ['lastRow' => $currentRow - 1, 'maxCol' => $maxCol];
    }

    // =========================================================================
    // Sisipkan kop surat (universal, proporsional terhadap jumlah kolom tabel)
    // di 8 baris teratas sheet. Dipakai bersama hasil htmlTableToSheet().
    // =========================================================================
    private function injectKopSuratExcel(
        Worksheet $sheet,
        int $maxCol,
        string $namaProduk,
        string $judulProses,
        string $noDok,
        string $machNo
    ): void {
        $sheet->insertNewRowBefore(1, 8); // ruang 8 baris kop surat di atas tabel data

        // Kop surat butuh minimal 4 kolom (1 kiri + 1 tengah + 2 kanan).
        // Kalau tabel datanya lebih sempit dari itu, paksa lebar layout kop
        // surat minimal 4 kolom (kop surat boleh lebih lebar dari tabel data,
        // ini hanya memengaruhi header, bukan grid tabel yang sudah ditulis).
        $maxCol = max($maxCol, 4);

        // Proporsi kolom: kiri (PT Foxconn) ~30%, kanan (No.Dok dkk) tetap 2 kolom,
        // sisanya untuk judul di tengah. $colLeft dijamin selalu menyisakan
        // minimal 1 kolom untuk blok tengah, supaya range merge tidak pernah terbalik.
        $colRight = 2;
        $colLeft = (int) floor($maxCol * 0.3);
        $colLeft = max(1, min($colLeft, $maxCol - $colRight - 1));
        $colCenterEnd = $maxCol - $colRight;
        $colCenterEnd = $maxCol - $colRight;

        $colLabel = $maxCol - 1;
        $colValue = $maxCol;

        $leftEndColLetter = Coordinate::stringFromColumnIndex($colLeft);
        $centerStartColLetter = Coordinate::stringFromColumnIndex($colLeft + 1);
        $centerEndColLetter = Coordinate::stringFromColumnIndex($colCenterEnd);
        $colLabelLetter = Coordinate::stringFromColumnIndex($colLabel);
        $colValueLetter = Coordinate::stringFromColumnIndex($colValue);

        // A. Blok kiri: PT Foxconn (baris 1-4)
        $sheet->mergeCells("A1:{$leftEndColLetter}4");
        $sheet->setCellValue("A1", "PT. FOXCONN TECHNOLOGIES INDONESIA\nProduction Engineering Department\nProcess Engineering Section\n" . $namaProduk);
        $sheet->getStyle("A1")->getAlignment()->setWrapText(true)->setVertical(Alignment::VERTICAL_TOP)->setHorizontal(Alignment::HORIZONTAL_LEFT);

        // B. Blok tengah: Judul proses (baris 1-2) + nama mesin (baris 3)
        $sheet->mergeCells("{$centerStartColLetter}1:{$centerEndColLetter}2");
        $sheet->setCellValue("{$centerStartColLetter}1", $judulProses);
        $sheet->getStyle("{$centerStartColLetter}1")->getAlignment()->setWrapText(true)
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle("{$centerStartColLetter}1")->getFont()->setBold(true)->setUnderline(true)->setSize(14);

        $sheet->mergeCells("{$centerStartColLetter}3:{$centerEndColLetter}3");
        $sheet->setCellValue("{$centerStartColLetter}3", "(" . $namaProduk . ")");
        $sheet->getStyle("{$centerStartColLetter}3")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // C. Blok kanan: No. Dok / Revisi / Berlaku (baris 1-3) + Checked (baris 4, SATU baris tipis saja)
        $sheet->setCellValue("{$colLabelLetter}1", "No. Dok");
        $sheet->setCellValue("{$colValueLetter}1", ": " . $noDok);
        $sheet->setCellValue("{$colLabelLetter}2", "Revisi");
        $sheet->setCellValue("{$colValueLetter}2", ": 12");
        $sheet->setCellValue("{$colLabelLetter}3", "Berlaku");
        $sheet->setCellValue("{$colValueLetter}3", ": 11 Mei 2026");

        // Checked: dibuat 1 baris saja (tidak digemukkan lagi seperti versi lama)
        $sheet->mergeCells("{$colLabelLetter}4:{$colValueLetter}4");
        $sheet->setCellValue("{$colLabelLetter}4", "Checked");
        $sheet->getStyle("{$colLabelLetter}4")->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);

        $sheet->getStyle("{$colLabelLetter}1:{$colValueLetter}4")->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // D. Keterangan mesin (baris 6-7), baris 5 & 8 dibiarkan sebagai spasi
        $sheet->setCellValue("A6", "MACHINE No");
        $sheet->setCellValue("C6", ": " . $machNo);
        $sheet->setCellValue("A7", "AG Paste Type");
        $sheet->setCellValue("C7", ": ");
    }

    // TAMBAHAN: Fungsi export Excel UNIVERSAL DINAMIS
    public function exportExcel()
    {
        $typeProcess = $this->request->getGet('typeProcess');
        $process     = $this->request->getGet('process');
        $device      = $this->request->getGet('device');

        // 1. FIX FORMAT TANGGAL AGAR DATABASE TIDAK KOSONG
        $rawStart = $this->request->getGet('dateStart');
        $rawEnd   = $this->request->getGet('dateEnd');
        $dateStart = $rawStart ? date('Y-m-d', strtotime($rawStart)) : '';
        $dateEnd   = $rawEnd ? date('Y-m-d', strtotime($rawEnd)) : '';

        // 2. KAMUS PENERJEMAH (Silakan Abang tambah mesin/proses lainnya di sini nanti)
        $kamusDevice = [
            'fl18' => 'FRAME LASER 1.8t AND 1.3t',
            'sl33' => 'SINGLE LASER 3.3',
            'sl56' => 'SINGLE LASER 5.6',
        ];

        $kamusProses = [
            'fl18-p-db2' => 'Production Process Control Sheet LD Die Bonding 2 Machine',
            'fl18-s-cs'  => 'Cap Seal Machine Start Up Check Sheet',
        ];

        $namaProduk  = isset($kamusDevice[$device]) ? $kamusDevice[$device] : strtoupper($device);
        $judulProses = isset($kamusProses[$process]) ? $kamusProses[$process] : strtoupper($process);

        // 3. AMBIL DATA
        $data = [];
        if ($typeProcess === 'production') {
            // >>> DIPERBAIKI: ProductionModel::getAll() punya signature BEDA dari
            // Startup/Foregoing (parameter ke-3 adalah $process, bukan $device;
            // model ini juga tidak memfilter berdasarkan device sama sekali).
            // Sebelumnya dipanggil dengan urutan yang sama seperti Startup/
            // Foregoing, sehingga $device tertukar masuk ke parameter $process,
            // dan hasil query selalu kosong. Di sini dipanggil sesuai urutan
            // ASLI method-nya. (Model tidak diubah, supaya pemanggil lain di
            // luar History.php yang mungkin sudah bergantung pada signature
            // lama tidak ikut rusak.)
            $data['alldata'] = $this->ProductionModel->getAll($dateStart, $dateEnd, $process);
        } elseif ($typeProcess === 'foregoing') {
            $data['alldata'] = $this->ForegoingModel->getAll($dateStart, $dateEnd, $device, $process);
        } else {
            $data['alldata'] = $this->StartupModel->getAll($dateStart, $dateEnd, $device, $process);
        }

        // 4. RENDER HTML VIEW APA ADANYA
        $_SERVER['REQUEST_URI'] = 'exportExcel';
        $viewPath = "/layout/" . $device . "/history/" . $typeProcess . "/" . $process;
        try {
            $htmlString = view($viewPath, $data);
        } catch (\Exception $e) {
            die("Error: File View " . $viewPath . " tidak ditemukan!");
        }

        // 5. EKSTRAK <table id="table1"> SECARA AMAN (DOM, bukan regex)
        $tableElement = $this->extractTableElement($htmlString, 'table1');
        if ($tableElement === null) {
            die("Error: <table id=\"table1\"> tidak ditemukan di view " . $viewPath);
        }

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // 6. TULIS GRID TABEL APA ADANYA (universal, berlaku untuk semua pola)
        $result = $this->htmlTableToSheet($tableElement, $sheet, 1);
        $maxCol = max(1, $result['maxCol']);

        // 7. INJEKSI KOP SURAT (proporsional terhadap lebar tabel asli)
        $noDok = "FF-" . strtoupper(explode('-', $process)[2] ?? '001') . "-001";
        $machNo = $this->request->getGet('machno') ?? '';
        $this->injectKopSuratExcel($sheet, $maxCol, $namaProduk, $judulProses, $noDok, $machNo);

        // 8. RAPIKAN UKURAN & SET PRINT PDF
        foreach ($sheet->getColumnIterator('A', Coordinate::stringFromColumnIndex($maxCol)) as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }
        $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getPageSetup()->setFitToWidth(1);

        $fileName = 'Report_' . $typeProcess . '_' . $process . '_' . date('Ymd_Hi') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit();
    }

    // =========================================================================
    // FITUR BARU: EXPORT TO PDF (Murni dari Backend)
    // =========================================================================
    public function exportPDF()
    {
        $typeProcess = $this->request->getGet('typeProcess');
        $process     = $this->request->getGet('process');
        $device      = $this->request->getGet('device');

        $rawStart = $this->request->getGet('dateStart');
        $rawEnd   = $this->request->getGet('dateEnd');
        $dateStart = $rawStart ? date('Y-m-d', strtotime($rawStart)) . ' 00:00:00' : '';
        $dateEnd   = $rawEnd ? date('Y-m-d', strtotime($rawEnd)) . ' 23:59:59' : '';

        // 2. Ambil Data
        $data = [];
        if ($typeProcess === 'production') {
            // >>> DIPERBAIKI: sama seperti exportExcel(), panggil sesuai
            // signature asli ProductionModel::getAll().
            $data['alldata'] = $this->ProductionModel->getAll($dateStart, $dateEnd, $process);
        } elseif ($typeProcess === 'foregoing') {
            $data['alldata'] = $this->ForegoingModel->getAll($dateStart, $dateEnd, $device, $process);
        } else {
            $data['alldata'] = $this->StartupModel->getAll($dateStart, $dateEnd, $device, $process);
        }

        // 3. Render HTML (Ambil tampilan web)
        $_SERVER['REQUEST_URI'] = 'exportPDF';
        $viewPath = "/layout/" . $device . "/history/" . $typeProcess . "/" . $process;
        try {
            $htmlString = view($viewPath, $data);
        } catch (\Exception $e) {
            die("Error: File View " . $viewPath . " tidak ditemukan!");
        }

        // >>> DIGANTI: ekstraksi <table id="table1"> pakai DOM (bukan regex
        // penghapus header lama yang rawan salah tangkap). Ini otomatis
        // membuang header lama bawaan web (doc-header/doc-info) TANPA perlu
        // tahu apakah header itu ada atau tidak di view yang bersangkutan —
        // aman untuk 171 view apapun strukturnya.
        $tableElement = $this->extractTableElement($htmlString, 'table1');
        if ($tableElement === null) {
            die("Error: <table id=\"table1\"> tidak ditemukan di view " . $viewPath);
        }
        $tableOnly = $tableElement->ownerDocument->saveHTML($tableElement);

        // 4. KOP SURAT BARU PAKAI TABEL MURNI (KHUSUS DOMPDF) — sudah universal
        // sejak awal karena width:100% dan tidak bergantung jumlah kolom tabel data.
        $kamusDevice = ['fl18' => 'FRAME LASER 1.8t AND 1.3t', 'sl33' => 'SINGLE LASER 3.3', 'sl56' => 'SINGLE LASER 5.6'];
        $kamusProses = ['fl18-p-db2' => 'Production Process Control Sheet LD Die Bonding 2 Machine', 'fl18-s-cs'  => 'Cap Seal Machine Start Up Check Sheet'];

        $namaProduk  = isset($kamusDevice[$device]) ? $kamusDevice[$device] : strtoupper($device);
        $judulProses = isset($kamusProses[$process]) ? $kamusProses[$process] : strtoupper($process);
        $noDok = "FF-" . strtoupper(explode('-', $process)[2] ?? '001') . "-001";
        $machNo = $this->request->getGet('machno') ?? '';

        $kopSuratDOMPDF = '
        <table width="100%" style="margin-bottom: 15px; font-size: 10px;">
            <tr>
                <td width="30%" valign="top" style="line-height: 1.2;">
                    PT. FOXCONN TECHNOLOGIES INDONESIA<br>
                    Production Engineering Department<br>
                    Process Engineering Section<br>
                    <b>' . $namaProduk . '</b>
                </td>
                <td width="50%" align="center" valign="top">
                    <b style="font-size: 14px; text-decoration: underline;">' . $judulProses . '</b><br>
                    <span style="font-size: 11px;">(' . $namaProduk . ')</span>
                </td>
                <td width="20%" align="right" valign="top">
                    <table width="100%" border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse; font-size: 9px;">
                        <tr><td width="40%">No. Dok</td><td>: ' . $noDok . '</td></tr>
                        <tr><td>Revisi</td><td>: 12</td></tr>
                        <tr><td>Berlaku</td><td>: 11 Mei 2026</td></tr>
                        <tr><td colspan="2" align="center" style="height: 18px; vertical-align: middle;">Checked</td></tr>
                    </table>
                </td>
            </tr>
        </table>
        <div style="font-size: 10px; margin-bottom: 5px;">
            MACHINE No &nbsp;&nbsp;&nbsp;: ' . $machNo . '<br>
            AG Paste Type &nbsp;&nbsp;: 
        </div>
        ';

        // 5. CSS SAKTI UNTUK DOMPDF
        $customCSS = '
        <style>
            @page { margin: 20px; }
            body { font-family: Arial, Helvetica, sans-serif; font-size: 8px; }
            table { width: 100%; border-collapse: collapse; }
            table td, table th { border: 1px solid black !important; padding: 3px !important; text-align: center; vertical-align: middle; }
            th { background-color: #f8f9fa; font-weight: bold; }
        </style>';

        $finalHtml = $customCSS . $kopSuratDOMPDF . $tableOnly;

        // 6. Proses Pembuatan PDF
        $options = new \Dompdf\Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'Arial');

        $dompdf = new \Dompdf\Dompdf($options);
        $dompdf->loadHtml($finalHtml);

        $dompdf->setPaper([0, 0, 609.44, 1000.43], 'landscape');
        $dompdf->render();

        $fileName = 'Report_' . strtoupper($process) . '_' . date('Ymd_Hi') . '.pdf';
        $dompdf->stream($fileName, array("Attachment" => true));
        exit();
    }
}
