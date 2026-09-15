<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InputModel;
use App\Models\StartupModel;
use App\Models\ProductionModel;
use App\Models\ForegoingModel;
use App\Models\EmpModel;
use CodeIgniter\CodeIgniter;
// TAMBAHAN: library untuk export Excel
use PhpOffice\PhpSpreadsheet\IOFactory;

class History extends BaseController
{
    protected $session;
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
        $data = [
            'title' => 'History | Startup Management',
        ];
        return view('history', $data);
    }
    
    
    public function dataForegoing()
    {
        $data = [
            'title' => 'History | Startup Management',
            'alldata' => $this->ForegoingModel->getAll($_GET['dateStart'],$_GET['dateEnd'],$_GET['device'],$_GET['process'])
        ];

        return view("/layout/".$_GET['device']."/history/foregoing/".$_GET['process'],$data);
    }
    
    public function foregoingByNumber($number)
    {
        $data = [
            'alldata' => $this->ForegoingModel->getByNumber($number)
        ];

        return view("/layout/".$data['alldata'][0]['device']."/history/foregoing/".$data['alldata'][0]['process'],$data); 
    }

    // TAMBAHAN: Fungsi export Excel
    public function exportExcel()
    {
        // Ambil data yang dikirim dari Javascript
        $typeProcess = $this->request->getGet('typeProcess');
        $process     = $this->request->getGet('process');
        $model       = $this->request->getGet('model');
        $lotNo       = $this->request->getGet('lotno');
        $machno      = $this->request->getGet('machno');
        $dateStart   = $this->request->getGet('dateStart');
        $dateEnd     = $this->request->getGet('dateEnd');
        $device      = $this->request->getGet('device');

        // Arahkan ke file template yang sudah Anda siapkan
        $templatePath = FCPATH . 'templates/SM-CS-002-Rev00.xlsx';

        if (!file_exists($templatePath)) {
            die("Error: File template tidak ditemukan di folder public/templates/");
        }

        // Buka template Excel
        $spreadsheet = IOFactory::load($templatePath);
        $sheet = $spreadsheet->getActiveSheet();

        // --- SESUAIKAN BAGIAN INI DENGAN FORMAT TEMPLATE ASLI ANDA ---
        $sheet->setCellValue('D5', $lotNo);
        $sheet->setCellValue('D6', $model);
        $sheet->setCellValue('H5', $machno);

        // Contoh jika ingin mengisi data tabel dari database:
        // $dataList = $this->ForegoingModel->getAll($dateStart, $dateEnd, $device, $process);
        // $row = 15; // baris awal tabel di template
        // foreach ($dataList as $row_data) {
        //     $sheet->setCellValue('A'.$row, $row_data['waktu']);
        //     $sheet->setCellValue('B'.$row, $row_data['suhu']);
        //     $row++;
        // }
        // ---------------------------------------------------------------

        // Download file yang sudah dimodifikasi
        $fileName = 'Report_' . $typeProcess . '_' . $process . '_' . date('Ymd') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit();
    }
}