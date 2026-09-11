<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InputModel;
use App\Models\StartupModel;
use App\Models\ProductionModel;
use App\Models\ForegoingModel;
use App\Models\EmpModel;
use CodeIgniter\CodeIgniter;

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
    
}
