<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InputModel;
use App\Models\ProductionModel;
use App\Models\EmpModel;
use CodeIgniter\CodeIgniter;

class Home extends BaseController
{
    protected $session;
    protected $InputModel;
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->InputModel = new InputModel();
        $this->ProductionModel = new ProductionModel();
        $this->EmpModel = new EmpModel();
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Input | Startup Management',
            'validation' => \Config\Services::validation()
        ];
        return view('index', $data);
    }

    public function formProduction($device, $process): string
    {
        $data = [
            'title' => 'Input | Startup Management',
            'validation' => \Config\Services::validation()
        ];
        return view("/layout/" . $device . "/input/production/" . $process, $data);
    }
    public function formStartup($device, $process): string
    {
        $data = [
            'title' => 'Input | Startup Management',
            'validation' => \Config\Services::validation()
        ];
        return view("/layout/sl56/input/startup/" . $process, $data);
    }

    public function approve()
    {
        if (!$this->session->has('empid')) {
            session()->setFlashdata('message', 'Login terlebih dahulu');
            return redirect()->to('');
        }
        $data = [
            'title' => 'Approval | Startup Management',
            'validation' => \Config\Services::validation()
        ];
        return view('approval', $data);
    }
    public function approval(): string
    {
        $data = [
            'title' => 'History | Startup Management',
            'alldata' => $this->ProductionModel->getAll($_GET['dateStart'], $_GET['dateEnd'], $_GET['process'], $_GET['model'], $_GET['lotno'], $_GET['machno'])
        ];

        return view("/layout/approval/" . $_GET['process'], $data);
    }

    public function ajaxAutofill()
    {
        if ($this->request->isAJAX()) {
            $empid = $_GET['empid-txt'] ?? '';

            try {
                $q = $this->EmpModel->getEmp($empid);
            } catch (\Throwable $e) {
                log_message('error', 'ajaxAutofill gagal konek ke database employee: ' . $e->getMessage());
                return $this->response->setStatusCode(404)->setJSON(['message' => 'Data tidak ditemukan']);
            }

            if (empty($q)) {
                return $this->response->setStatusCode(404)->setJSON(['message' => 'Employee ID tidak ditemukan']);
            }

            $data = [
                'empid'   => $q->empid,
                'groupid' => $q->groupid,
                'acc'     => $q->acc,
                'name'    => $q->name
            ];

            return $this->response->setJSON($data);
        }
    }

    public function data()
    {
        $data = [
            'title' => 'History | Startup Management',
            'alldata' => $this->ProductionModel->getAll($_GET['dateStart'], $_GET['dateEnd'], $_GET['process'], $_GET['model'], $_GET['lotno'], $_GET['machno'])
        ];

        return view("/layout/" . $_GET['device'] . "/history/production/" . $_GET['process'], $data);
        // return view("/layout/history/production/".$_GET['process'],$data);
    }

    public function history(): string
    {
        $data = [
            'title' => 'History | Startup Management',
        ];
        return view('history', $data);
    }

    public function test2()
    {
        $data = [
            'title' => 'History | Startup Management',
            'alldata' => $this->ProductionModel->getLotHistory($_GET['dateStart'], $_GET['dateEnd'], $_GET['process'], $_GET['model'], $_GET['lotno'], $_GET['machno'], $_GET['device'])
        ];
        return view('data', $data);
        // return view("/layout/form/flcsa",$data);
    }
}
