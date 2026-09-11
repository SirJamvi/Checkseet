<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InputModel;
use App\Models\ProductionModel;
use App\Models\StartupModel;
use App\Models\ForegoingModel;
use App\Models\EmpModel;
use App\Models\LogActivityModel;
use CodeIgniter\CodeIgniter;

class Input extends BaseController
{
    protected $session;
    public $InputModel;
    public $ProductionModel;
    public $EmpModel;
    public $StartupModel;
    public $ForegoingModel;
    public $LogActivityModel;
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->InputModel = new InputModel();
        $this->ProductionModel = new ProductionModel();
        $this->EmpModel = new EmpModel();
        $this->StartupModel = new StartupModel();
        $this->ForegoingModel = new ForegoingModel();
        $this->LogActivityModel = new LogActivityModel();
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        $data = [
            'title' => 'Input | Startup Management'
        ];
        if(!$this->session->has('empid')){
            return redirect()->to(base_url()."login");
        }
        return view('input', $data);
    }
    public function formInputStartup()
    {
        // jika belum login tidak dapat membuka form startup
        if(!$this->session->has('empid')){
            return redirect()->to(base_url()."login");
        }

        $data = [
            'title' => 'Input | Startup Management',
            'validation' => \Config\Services::validation()
        ];
        
        if($_GET['device']=='' || $_GET['process']==''){
            return "";
        }

        // jika role tidak sesuai tidak dapat membuka form production
        if(substr($_GET['device'], 0, 2)!=$this->session->get('role') && $this->session->get('role')!='all'){
            return view('forbidden',$data);
        }
        return view('/layout/'.$_GET['device']."/input/startup/".$_GET['process'],$data);
    }

    public function edit($number)
    {
        if(!$this->session->has('empid')){
            return redirect()->to(base_url()."login");
        }
        $data = [
            'title' => 'Edit | Startup Management',
            'validation' => \Config\Services::validation(),
            'alldata' => $this->ProductionModel->getByNumber($number)
        ];

        // jika role tidak sesuai tidak dapat membuka form production
        if(substr($_GET['device'], 0, 2)!=$this->session->get('role') && $this->session->get('role')!='all'){
            return view('forbidden',$data);
        }

        // jika data finish telah diisi, maka user tidak boleh untuk mengisi kembali
        if($data['alldata'][0]['name2']){
            if(!$this->session->get('isadmin')){
                return view('forbidden',$data);
            }
        }

        return view('edit',$data);
    }

    public function formEdit($process,$number)
    {
        if(!$this->session->has('empid')){
            return redirect()->to(base_url()."login");
        }
        $data = [
            'title' => 'Edit | Startup Management',
            'alldata' => $this->ProductionModel->getByNumber($number),
            'process' => $process,
            'number' => $number,
        ];

        // jika role tidak sesuai tidak dapat membuka form production
        if(substr($_GET['device'], 0, 2)!=$this->session->get('role') && $this->session->get('role')!='all'){
            return view('forbidden',$data);
        }

        // jika data finish telah diisi, maka user tidak boleh untuk mengisi kembali
        if($data['alldata'][0]['name2']){
            if(!$this->session->get('isadmin')){
                return view('forbidden',$data);
            }
        }
        
        return view("/layout/form/production/".$process,$data);
    }

    public function formStandard($process)
    {
        $words = preg_split('/-/', $process, -1, PREG_SPLIT_NO_EMPTY);

        return view('/layout/'.$words[0].'/note/'.$process);
    }

    
}
