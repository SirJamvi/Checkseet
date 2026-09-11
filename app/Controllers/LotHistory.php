<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InputModel;
use App\Models\ProductionModel;
use App\Models\EmpModel;
use CodeIgniter\CodeIgniter;

class LotHistory extends BaseController
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

    public function index()
    {
        // ❌ HAPUS BARIS INI
        // print_r($_SESSION);
        
        // ❌ HAPUS BARIS INI JUGA
        // if($this->session->has('empid'))
        // {
        //     print_r($_SESSION);
        // }

        // ✅ KODE ASLI TETAP
        $device = "asdfqwedasqweasd";
        
        if($this->session->get('role') == 'sl'){
            $device = "sl";
        }
        else if($this->session->get('role') == 'fl'){
            $device = "fl";
        }
        else if($this->session->get('role') == 'all'){
            $device = "";
        }
        
        $data = [
            'title' => 'Lot History | Startup Management',
            'alldata' => $this->ProductionModel->getLotHistory(device: $device)
        ];

        return view("lot-history", $data);
    }
}