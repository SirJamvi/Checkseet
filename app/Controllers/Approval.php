<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StartupModel;
use App\Models\ProductionModel; // Pastikan model ini dipanggil karena dipakai di approvalById

class Approval extends BaseController
{
    protected $session;
    protected $StartupModel;
    protected $ProductionModel;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->StartupModel = new StartupModel();
        $this->ProductionModel = new ProductionModel(); // Deklarasikan jika digunakan
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    // Menampilkan data 
    public function index()
    {
        if(!$this->session->has('name')){
            return redirect()->to(base_url().'login');
        }
        $data = [
            'title' => 'Approval | Startup Management'
        ];

        return view("approval",$data);
    }

    public function formApproval()
    {
        if(!$this->session->has('name')){
            return redirect()->to(base_url().'login');
        }
        
        // Perbaikan: Gunakan getGet() untuk mencegah error jika parameter URL kosong
        // Default menampilkan data 1 bulan terakhir hingga hari ini
        $dateStart = $this->request->getGet('dateStart') ?? date('Y-m-d', strtotime('-1 month'));
        $dateEnd = $this->request->getGet('dateEnd') ?? date('Y-m-d');

        $data = [
            'title' => 'Approval | Startup Management',
            'alldata' => $this->StartupModel->getApprovalData($dateStart, $dateEnd)
        ];

        return view("layout/approval-table",$data);
    }

    public function approvalById($id)
    {
        $data = [
            'title' => 'History | Startup Management',
            'alldata' => $this->ProductionModel->getByNumber($id)
        ];

        return view("/layout/history/".$this->ProductionModel->getByNumber($id)[0]['process'],$data);
    }
    
    public function updateApproval()
    {
        if(!$this->session->has('empid')){
            return redirect()->to(base_url()."login");
        }
        
        $number = $this->request->getVar('number');
        $name = $this->request->getVar('name');
        $level = $this->request->getVar('level');
        
        $update = $this->StartupModel->updateApproval($number, $name, $level);
        return redirect()->to(base_url().'approve');
    }
}