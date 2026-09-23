<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InputModel;
use App\Models\StartupModel;
use App\Models\ProductionModel;
use App\Models\ForegoingModel;
use App\Models\EmpModel;
use App\Libraries\PdfGenerator;
use App\Libraries\ExcelGenerator;

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
    // DATA RESOLVER UNTUK GENERATOR EXPORT
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

    private function resolveExportContext(string $typeProcess, string $process, string $device, string $dateStart, string $dateEnd, string $model = '', string $lotno = '', string $machno = ''): array
    {
        $alldata = [];
        if ($typeProcess === 'production') {
            $alldata = $this->ProductionModel->getAll($dateStart, $dateEnd, $process, $model, $lotno, $machno);
        } elseif ($typeProcess === 'foregoing') {
            $alldata = $this->ForegoingModel->getAll($dateStart, $dateEnd, $device, $process, $model, $lotno, $machno);
        } else {
            $alldata = $this->StartupModel->getAll($dateStart, $dateEnd, $device, $process, $model, $lotno, $machno);
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
        $machNo = !empty($alldata) ? ($alldata[0]['machno'] ?? '') : '';
        
        // Return context komplit untuk dilempar ke Library
        return compact('alldata', 'namaProduk', 'judulProses', 'noDok', 'machNo', 'prosesInfo', 'typeProcess', 'process');
    }

    // =========================================================================
    // EXPORT METHOD INTI (HANYA MEMANGGIL LIBRARY PENGHASIL FILE)
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

        $model = $this->request->getGet('model') ?? '';
        $lotno = $this->request->getGet('lotno') ?? '';
        $machno = $this->request->getGet('machno') === 'null' ? '' : ($this->request->getGet('machno') ?? '');

        // 1. Ambil Data Context
        $context = $this->resolveExportContext($typeProcess, $process, $device, $dateStart, $dateEnd, $model, $lotno, $machno);

        // 2. Render View HTML Tabel
        $_SERVER['REQUEST_URI'] = 'exportExcel';
        $viewPath = "/layout/" . $device . "/history/" . $typeProcess . "/" . $process;
        try { 
            $htmlString = view($viewPath, ['alldata' => $context['alldata']]); 
        } catch (\Exception $e) { 
            die("Error: File View tidak ditemukan!"); 
        }

        // 3. Panggil Mandor Excel (Library)
        $excelGen = new ExcelGenerator();
        $excelGen->generate($htmlString, $context);
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

        $model = $this->request->getGet('model') ?? '';
        $lotno = $this->request->getGet('lotno') ?? '';
        $machno = $this->request->getGet('machno') === 'null' ? '' : ($this->request->getGet('machno') ?? '');

        // 1. Ambil Data Context
        $context = $this->resolveExportContext($typeProcess, $process, $device, $dateStart, $dateEnd, $model, $lotno, $machno);

        // 2. Render View HTML Tabel
        $_SERVER['REQUEST_URI'] = 'exportPDF';
        $viewPath = "/layout/" . $device . "/history/" . $typeProcess . "/" . $process;
        try {
            $htmlString = view($viewPath, ['alldata' => $context['alldata']]);
        } catch (\Exception $e) {
            die("Error: File View " . $viewPath . " tidak ditemukan!");
        }

        // 3. Panggil Mandor PDF (Library)
        $pdfGen = new PdfGenerator();
        $pdfGen->generate($htmlString, $context);
    }
}