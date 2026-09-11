<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use CodeIgniter\CodeIgniter;

class Admin extends BaseController
{
    protected $session;
    private $AdminModel;
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->AdminModel = new AdminModel();
    }

    // Menampilkan data 
    public function index()
    {
        if(!$this->session->has('name')){
            return redirect()->to(base_url().'login');
        }
        $data = [
            'title' => 'Admin | Startup Management',
            'alldata' => $this->AdminModel->getAll()
        ];

        return view("admin",$data);
    }

    public function addAdmin($empid)
    {
        if(!$this->session->has('isadmin')){
            return redirect()->to(base_url().'login');
        }
        $add = $this->AdminModel->addAdmin($empid);
        session()->setFlashdata('message', (string)$add);
        return redirect()->to(base_url().'admin');
    }
    
    public function deleteAdmin($empid)
    {
        if(!$this->session->has('isadmin')){
            return redirect()->to(base_url().'login');
        }
        $delete = $this->AdminModel->deleteAdmin($empid);
        session()->setFlashdata('message', (string)$delete);
        return redirect()->to(base_url().'admin');
    }
}
