<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InputModel;
use App\Models\StartupModel;
use App\Models\ProductionModel;
use App\Models\ForegoingModel;
use App\Models\EmpModel;
use App\Libraries\ExcelGenerator; // Panggil Library baru
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class History extends BaseController
{
    protected $session;
    protected $InputModel;
    protected $ProductionModel;
    protected $StartupModel;
    protected $ForegoingModel;
    protected $EmpModel;
    protected $excelGen; // Properti untuk library

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->InputModel = new InputModel();
        $this->ProductionModel = new ProductionModel();
        $this->StartupModel = new StartupModel();
        $this->ForegoingModel = new ForegoingModel();
        $this->EmpModel = new EmpModel();
        $this->excelGen = new ExcelGenerator(); // Inisiasi library
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

    public function exportExcel()
    {
        // 1. Tangkap semua parameter yang dikirim dari UI
        $typeProcess = $this->request->getGet('typeProcess');
        $process     = $this->request->getGet('process');
        $device      = $this->request->getGet('device');
        $model       = $this->request->getGet('model') ?? '';
        $lotno       = $this->request->getGet('lotno') ?? '';
        $machno      = $this->request->getGet('machno') ?? '';

        // 2. Bypass strtotime: Langsung gabungkan string URL agar identik dengan query UI
        $rawStart  = $this->request->getGet('dateStart');
        $rawEnd    = $this->request->getGet('dateEnd');
        $dateStart = $rawStart ? $rawStart . ' 00:00:00' : '1970-01-01 00:00:00';
        $dateEnd   = $rawEnd ? $rawEnd . ' 23:59:59' : '2070-01-01 23:59:59';

        $docType = ucfirst($typeProcess);

        // 3. Tarik Data dengan menyuntikkan seluruh parameter (agar Model baru/lama tetap aman)
        $data = [];
        if ($typeProcess === 'production') {
            $data['alldata'] = $this->ProductionModel->getAll($dateStart, $dateEnd, $process, $model, $lotno, $machno);
        } elseif ($typeProcess === 'foregoing') {
            $data['alldata'] = $this->ForegoingModel->getAll($dateStart, $dateEnd, $device, $process, $model, $lotno, $machno);
        } else {
            $data['alldata'] = $this->StartupModel->getAll($dateStart, $dateEnd, $device, $process, $model, $lotno, $machno);
        }

        if (empty($data['alldata'])) {
            die("Data tidak ditemukan untuk diekspor pada rentang tanggal: " . $dateStart . " hingga " . $dateEnd);
        }

        // ==========================================
        // DATA 100% DINAMIS (Ditarik murni dari Database)
        // ==========================================
        $namaProduk  = !empty($data['alldata'][0]['device_name']) ? strtoupper($data['alldata'][0]['device_name']) : strtoupper($device);
        $judulProses = !empty($data['alldata'][0]['process_name']) ? strtoupper($data['alldata'][0]['process_name']) : strtoupper($process);
        
        $noDok   = !empty($data['alldata'][0]['docno']) ? $data['alldata'][0]['docno'] : "-";
        $revisi  = !empty($data['alldata'][0]['revisi']) ? $data['alldata'][0]['revisi'] : "-"; 
        $berlaku = !empty($data['alldata'][0]['berlaku']) ? $data['alldata'][0]['berlaku'] : "-"; 

        $judulProsesLengkap = $docType . ' - ' . $namaProduk . ' - ' . $judulProses;

        $_SERVER['REQUEST_URI'] = 'exportExcel';
        $viewPath = "/layout/" . $device . "/history/" . $typeProcess . "/" . $process;
        try {
            $htmlString = view($viewPath, $data);
        } catch (\Exception $e) {
            die("Error: File View " . $viewPath . " tidak ditemukan!");
        }

        $tableElement = $this->excelGen->extractTableElement($htmlString, 'table1');
        if ($tableElement === null) {
            die("Error: <table id=\"table1\"> tidak ditemukan di view " . $viewPath);
        }

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $result = $this->excelGen->htmlTableToSheet($tableElement, $sheet, 1);
        $maxCol = max(1, $result['maxCol']);
        
        $this->excelGen->injectKopSuratExcel($sheet, $maxCol, $docType, $namaProduk, $judulProsesLengkap, $noDok, $revisi, $berlaku, $machno);

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

    public function exportPDF()
    {
        // 1. Tangkap semua parameter yang dikirim dari UI
        $typeProcess = $this->request->getGet('typeProcess');
        $process     = $this->request->getGet('process');
        $device      = $this->request->getGet('device');
        $model       = $this->request->getGet('model') ?? '';
        $lotno       = $this->request->getGet('lotno') ?? '';
        $machno      = $this->request->getGet('machno') ?? '';

        // 2. Bypass strtotime
        $rawStart  = $this->request->getGet('dateStart');
        $rawEnd    = $this->request->getGet('dateEnd');
        $dateStart = $rawStart ? $rawStart . ' 00:00:00' : '1970-01-01 00:00:00';
        $dateEnd   = $rawEnd ? $rawEnd . ' 23:59:59' : '2070-01-01 23:59:59';

        $docType = ucfirst($typeProcess);

        // 3. Tarik Data
        $data = [];
        if ($typeProcess === 'production') {
            $data['alldata'] = $this->ProductionModel->getAll($dateStart, $dateEnd, $process, $model, $lotno, $machno);
        } elseif ($typeProcess === 'foregoing') {
            $data['alldata'] = $this->ForegoingModel->getAll($dateStart, $dateEnd, $device, $process, $model, $lotno, $machno);
        } else {
            $data['alldata'] = $this->StartupModel->getAll($dateStart, $dateEnd, $device, $process, $model, $lotno, $machno);
        }

        if (empty($data['alldata'])) {
            die("Data tidak ditemukan untuk diekspor pada rentang tanggal: " . $dateStart . " hingga " . $dateEnd);
        }

        $namaProduk  = !empty($data['alldata'][0]['device_name']) ? strtoupper($data['alldata'][0]['device_name']) : strtoupper($device);
        $judulProses = !empty($data['alldata'][0]['process_name']) ? strtoupper($data['alldata'][0]['process_name']) : strtoupper($process);
        $noDok       = !empty($data['alldata'][0]['docno']) ? $data['alldata'][0]['docno'] : "-";
        $revisi      = !empty($data['alldata'][0]['revisi']) ? $data['alldata'][0]['revisi'] : "-"; 
        $berlaku     = !empty($data['alldata'][0]['berlaku']) ? $data['alldata'][0]['berlaku'] : "-"; 
        
        $judulProsesLengkap = $docType . ' - ' . $namaProduk . ' - ' . $judulProses;

        $_SERVER['REQUEST_URI'] = 'exportPDF';
        $viewPath = "/layout/" . $device . "/history/" . $typeProcess . "/" . $process;
        try {
            $htmlString = view($viewPath, $data);
        } catch (\Exception $e) {
            die("Error: File View " . $viewPath . " tidak ditemukan!");
        }

        $tableElement = $this->excelGen->extractTableElement($htmlString, 'table1');
        if ($tableElement === null) {
            die("Error: <table id=\"table1\"> tidak ditemukan di view " . $viewPath);
        }
        $tableOnly = $tableElement->ownerDocument->saveHTML($tableElement);

        $kopSuratDOMPDF = '
        <table width="100%" style="margin-bottom: 15px; font-size: 10px;">
            <tr>
                <td width="30%" valign="top" style="line-height: 1.2;">
                    PT. FOXCONN TECHNOLOGIES INDONESIA<br>
                    Production Engineering Department<br>
                    ' . strtoupper($docType) . '<br>
                    <b>' . $namaProduk . '</b>
                </td>
                <td width="50%" align="center" valign="top">
                    <b style="font-size: 14px; text-decoration: underline;">' . $judulProsesLengkap . '</b><br>
                    <span style="font-size: 11px;">(' . $namaProduk . ')</span>
                </td>
                <td width="20%" align="right" valign="top">
                    <table width="100%" border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse; font-size: 9px;">
                        <tr><td width="40%">No. Dok</td><td>: ' . $noDok . '</td></tr>
                        <tr><td>Revisi</td><td>: ' . $revisi . '</td></tr>
                        <tr><td>Berlaku</td><td>: ' . $berlaku . '</td></tr>
                        <tr><td colspan="2" align="center" style="height: 18px; vertical-align: middle;">Checked</td></tr>
                    </table>
                </td>
            </tr>
        </table>
        <div style="font-size: 10px; margin-bottom: 5px;">
            MACHINE No &nbsp;&nbsp;&nbsp;: ' . $machno . '<br>
            AG Paste Type &nbsp;&nbsp;: 
        </div>
        ';

        $customCSS = '
        <style>
            @page { margin: 20px; }
            body { font-family: Arial, Helvetica, sans-serif; font-size: 8px; }
            table { width: 100%; border-collapse: collapse; }
            table td, table th { border: 1px solid black !important; padding: 3px !important; text-align: center; vertical-align: middle; }
            th { background-color: #f8f9fa; font-weight: bold; }
        </style>';

        $finalHtml = $customCSS . $kopSuratDOMPDF . $tableOnly;

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