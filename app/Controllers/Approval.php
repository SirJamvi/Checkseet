<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StartupModel;
use CodeIgniter\CodeIgniter;

class Approval extends BaseController
{
    protected $session;
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->StartupModel = new StartupModel();
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
        $data = [
            'title' => 'Approval | Startup Management',
            'alldata' => $this->StartupModel->getApprovalData($_GET['dateStart'],$_GET['dateEnd'])
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
        $update = $this->StartupModel->updateApproval($this->request->getVar('number'),$this->request->getVar('name'),$this->request->getVar('level'));
        return redirect()->to(base_url().'approve');
    }
}
