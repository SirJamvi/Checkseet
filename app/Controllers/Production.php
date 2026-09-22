<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductionModel;
use CodeIgniter\CodeIgniter;

class Production extends BaseController
{
    protected $session;
    private $ProductionModel;
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->ProductionModel = new ProductionModel();
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Data Production | Startup Management',
            'alldata' => $this->ProductionModel->getAllData()
        ];
        return view('production', $data);
    }

    public function formInputProduction()
    {

        // jika belum login tidak dapat membuka form production
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
        
        return view('/layout/'.$_GET['device']."/input/production/".$_GET['process'],$data);
    }

    public function edit($number)
    {
        if(!$this->session->has('empid')){
            session()->setFlashdata('message', 'Login terlebih dahulu');
            return redirect()->to(base_url()."login");
        }
        $data = [
            'title' => 'History | Startup Management',
            'validation' => \Config\Services::validation(),
            'alldata' => $this->ProductionModel->getByNumber($number)
        ];
        
        return view('edit',$data);
    }

    public function formEdit()
    {
        $data = [
            'title' => 'History | Startup Management',
            'alldata' => $this->ProductionModel->getByNumber($_GET['number']),
            'process' => $_GET['process'],
            'number' => $_GET['number'],
        ];
        return view("/layout/".$_GET['device']."/input/production/".$_GET['process'],$data);
    }

    public function deleteProduction($number)
    {
        if(!$this->session->has('empid')){
            session()->setFlashdata('message', 'Login terlebih dahulu');
            return redirect()->to(base_url()."login");
        }
        $data = [
            'title' => 'History | Startup Management',
            'validation' => \Config\Services::validation(),
            'alldata' => $this->ProductionModel->deleteByNumber($number)
        ];
        return "berhasil";
    }

    
    public function productionByNumber($number)
    {
        $data = [
            'alldata' => $this->ProductionModel->getByNumber($number)
        ];

        return view("/layout/".$data['alldata'][0]['device']."/history/production/".$data['alldata'][0]['process'],$data);
    }
    
    public function dataProduction()
    {
        // Penjaga Harga Mati: Kalau kosong, otomatis jadi "ALL"
        $machno = (isset($_GET['machno']) && $_GET['machno'] !== '' && $_GET['machno'] !== 'null') ? $_GET['machno'] : 'ALL';
        
        $data = [
            'title' => 'History | Startup Management',
            'alldata' => $this->ProductionModel->getAll($_GET['dateStart'],$_GET['dateEnd'],$_GET['process'],$_GET['model'],$_GET['lotno'],$machno)
        ];

        return view("/layout/".$_GET['device']."/history/production/".$_GET['process'],$data);
    }

    public function createProduction()
    {
        // jika belum login tidak bisa input data production
        if(!$this->session->has('empid')){
            return redirect()->to(base_url()."login");
        }
        $data = [
            'title' => 'Input | Startup Management',
            'validation' => \Config\Services::validation()
        ];


        // if (!$this->validate([
        //     'device-txt' => 'required',
        //     'model-txt' => 'required',
        //     'process-txt' => 'required',
        //     'lotno-txt' => 'required',
        //     'empid-txt' => 'required'
        //     ]))
        // {
        //     $validation = \Config\Services::validation();
        //     return view('index', $data)->withInput()->with('validation', $validation);
        // }
        $result="";
        $process=$this->request->getVar('process-txt');
        $cnt_input = $this->request->getVar('cnt-proses') ? $this->request->getVar('cnt-proses') : 1; 
        $number = $this->request->getVar('number-edit') ? $this->request->getVar('number-edit') : ($this->ProductionModel->getLatestId()+1);
        
        $par001a=1;
        $par002a=$this->request->getVar('par002a')!==null ? $this->request->getVar('par002a') : ($this->request->getVar('par002')!==null ? $this->request->getVar('par002') : null);
        $par003a=$this->request->getVar('par003a')!==null ? $this->request->getVar('par003a') : ($this->request->getVar('par003')!==null ? $this->request->getVar('par003') : null);
        $par004a=$this->request->getVar('par004a')!==null ? $this->request->getVar('par004a') : ($this->request->getVar('par004')!==null ? $this->request->getVar('par004') : null);
        $par005a=$this->request->getVar('par005a')!==null ? $this->request->getVar('par005a') : ($this->request->getVar('par005')!==null ? $this->request->getVar('par005') : null);
        $par006a=$this->request->getVar('par006a')!==null ? $this->request->getVar('par006a') : ($this->request->getVar('par006')!==null ? $this->request->getVar('par006') : null);
        $par007a=$this->request->getVar('par007a')!==null ? $this->request->getVar('par007a') : ($this->request->getVar('par007')!==null ? $this->request->getVar('par007') : null);
        $par008a=date("Y-m-d H:i:s");
        $par009a=date('Y-m-d H:i:s');
        $par010a=$this->request->getVar('par010a')!==null ? $this->request->getVar('par010a') : ($this->request->getVar('par010')!==null ? $this->request->getVar('par010') : null);

        $par011a=$this->request->getVar('par011a')!==null ? $this->request->getVar('par011a') : ($this->request->getVar('par011')!==null ? $this->request->getVar('par011') : null);
        $par012a=$this->request->getVar('par012a')!==null ? $this->request->getVar('par012a') : ($this->request->getVar('par012')!==null ? $this->request->getVar('par012') : null);
        $par013a=$this->request->getVar('par013a')!==null ? $this->request->getVar('par013a') : ($this->request->getVar('par013')!==null ? $this->request->getVar('par013') : null);
        $par014a=$this->request->getVar('par014a')!==null ? $this->request->getVar('par014a') : ($this->request->getVar('par014')!==null ? $this->request->getVar('par014') : null);
        $par015a=$this->request->getVar('par015a')!==null ? $this->request->getVar('par015a') : ($this->request->getVar('par015')!==null ? $this->request->getVar('par015') : null);
        $par016a=$this->request->getVar('par016a')!==null ? $this->request->getVar('par016a') : ($this->request->getVar('par016')!==null ? $this->request->getVar('par016') : null);
        $par017a=$this->request->getVar('par017a')!==null ? $this->request->getVar('par017a') : ($this->request->getVar('par017')!==null ? $this->request->getVar('par017') : null);
        $par018a=$this->request->getVar('par018a')!==null ? $this->request->getVar('par018a') : ($this->request->getVar('par018')!==null ? $this->request->getVar('par018') : null);
        $par019a=$this->request->getVar('par019a')!==null ? $this->request->getVar('par019a') : ($this->request->getVar('par019')!==null ? $this->request->getVar('par019') : null);
        $par020a=$this->request->getVar('par020a')!==null ? $this->request->getVar('par020a') : ($this->request->getVar('par020')!==null ? $this->request->getVar('par020') : null);

        $par021a=$this->request->getVar('par021a')!==null ? $this->request->getVar('par021a') : ($this->request->getVar('par021')!==null ? $this->request->getVar('par021') : null);
        $par022a=$this->request->getVar('par022a')!==null ? $this->request->getVar('par022a') : ($this->request->getVar('par022')!==null ? $this->request->getVar('par022') : null);
        $par023a=$this->request->getVar('par023a')!==null ? $this->request->getVar('par023a') : ($this->request->getVar('par023')!==null ? $this->request->getVar('par023') : null);
        $par024a=$this->request->getVar('par024a')!==null ? $this->request->getVar('par024a') : ($this->request->getVar('par024')!==null ? $this->request->getVar('par024') : null);
        $par025a=$this->request->getVar('par025a')!==null ? $this->request->getVar('par025a') : ($this->request->getVar('par025')!==null ? $this->request->getVar('par025') : null);
        $par026a=$this->request->getVar('par026a')!==null ? $this->request->getVar('par026a') : ($this->request->getVar('par026')!==null ? $this->request->getVar('par026') : null);
        $par027a=$this->request->getVar('par027a')!==null ? $this->request->getVar('par027a') : ($this->request->getVar('par027')!==null ? $this->request->getVar('par027') : null);
        $par028a=$this->request->getVar('par028a')!==null ? $this->request->getVar('par028a') : ($this->request->getVar('par028')!==null ? $this->request->getVar('par028') : null);
        $par029a=$this->request->getVar('par029a')!==null ? $this->request->getVar('par029a') : ($this->request->getVar('par029')!==null ? $this->request->getVar('par029') : null);
        $par030a=$this->request->getVar('par030a')!==null ? $this->request->getVar('par030a') : ($this->request->getVar('par030')!==null ? $this->request->getVar('par030') : null);

        $par031a=$this->request->getVar('par031a')!==null ? $this->request->getVar('par031a') : ($this->request->getVar('par031')!==null ? $this->request->getVar('par031') : null);
        $par032a=$this->request->getVar('par032a')!==null ? $this->request->getVar('par032a') : ($this->request->getVar('par032')!==null ? $this->request->getVar('par032') : null);
        $par033a=$this->request->getVar('par033a')!==null ? $this->request->getVar('par033a') : ($this->request->getVar('par033')!==null ? $this->request->getVar('par033') : null);
        $par034a=$this->request->getVar('par034a')!==null ? $this->request->getVar('par034a') : ($this->request->getVar('par034')!==null ? $this->request->getVar('par034') : null);
        $par035a=$this->request->getVar('par035a')!==null ? $this->request->getVar('par035a') : ($this->request->getVar('par035')!==null ? $this->request->getVar('par035') : null);
        $par036a=$this->request->getVar('par036a')!==null ? $this->request->getVar('par036a') : ($this->request->getVar('par036')!==null ? $this->request->getVar('par036') : null);
        $par037a=$this->request->getVar('par037a')!==null ? $this->request->getVar('par037a') : ($this->request->getVar('par037')!==null ? $this->request->getVar('par037') : null);
        $par038a=$this->request->getVar('par038a')!==null ? $this->request->getVar('par038a') : ($this->request->getVar('par038')!==null ? $this->request->getVar('par038') : null);
        $par039a=$this->request->getVar('par039a')!==null ? $this->request->getVar('par039a') : ($this->request->getVar('par039')!==null ? $this->request->getVar('par039') : null);
        $par040a=$this->request->getVar('par040a')!==null ? $this->request->getVar('par040a') : ($this->request->getVar('par040')!==null ? $this->request->getVar('par040') : null);

        $par041a=$this->request->getVar('par041a')!==null ? $this->request->getVar('par041a') : ($this->request->getVar('par041')!==null ? $this->request->getVar('par041') : null);
        $par042a=$this->request->getVar('par042a')!==null ? $this->request->getVar('par042a') : ($this->request->getVar('par042')!==null ? $this->request->getVar('par042') : null);
        $par043a=$this->request->getVar('par043a')!==null ? $this->request->getVar('par043a') : ($this->request->getVar('par043')!==null ? $this->request->getVar('par043') : null);
        $result = $this->ProductionModel->addProses
        (
            [
                'number' => $number,
                'device' => $this->request->getVar('device-txt'),
                'model' => $this->request->getVar('model-txt'),
                'process' => $this->request->getVar('process-txt'),
                'lotno' => $this->request->getVar('lotno-txt'),
                'machno' => $this->request->getVar('machno-txt'),
                'empid' => $this->request->getVar('empid-txt'),
                'group' => $this->request->getVar('group-txt'),
                'shift' => $this->request->getVar('shift-txt'),
                'name' => $this->request->getVar('name-txt') ? $this->request->getVar('name-txt') : "" ,
                'empid2' => $this->request->getVar('empid2-txt') ? $this->request->getVar('empid2-txt') : ($this->request->getVar('empid-txt') ? $this->request->getVar('empid-txt') : ""),
                'group2' => $this->request->getVar('group2-txt') ? $this->request->getVar('group2-txt') : ($this->request->getVar('group-txt') ? $this->request->getVar('group-txt') : ""),
                'shift2' => $this->request->getVar('shift2-txt') ? $this->request->getVar('shift2-txt') : ($this->request->getVar('shift-txt') ? $this->request->getVar('shift-txt') : ""),
                'name2' => $this->request->getVar('name2-txt') ? $this->request->getVar('name2-txt') : ($this->request->getVar('name-txt') ? $this->request->getVar('name-txt') : ""),
                
                'par001' => $par001a,'par002' => $par002a,'par003' => $par003a,'par004' => $par004a,'par005' => $par005a,
                'par006' => $par006a,'par007' => $par007a,'par008' => $par008a,'par009' => $par009a,'par010' => $par010a,
                'par011' => $par011a,'par011' => $par012a,'par013' => $par013a,'par014' => $par014a,'par015' => $par015a,
                'par016' => $par016a,'par017' => $par017a,'par018' => $par018a,'par019' => $par019a,'par020' => $par020a,
                'par021' => $par021a,'par022' => $par022a,'par023' => $par023a,'par024' => $par024a,'par025' => $par025a,
                'par026' => $par026a,'par027' => $par027a,'par028' => $par028a,'par029' => $par029a,'par030' => $par030a,
                'par031' => $par031a,'par032' => $par032a,'par033' => $par033a,'par034' => $par034a,'par035' => $par035a,
                'par036' => $par036a,'par037' => $par037a,'par038' => $par038a,'par039' => $par039a,'par040' => $par040a,
                'par041' => $par041a,'par042' => $par042a,'par043' => $par043a,'par045'=>'Process Complete'
            ]
        );

        if($cnt_input==1){
            if ($result)
            {
                session()->setFlashdata('message', 'Input success!');
            }
            else
            {
                session()->setFlashdata('message', 'Input Failed!'); 
            }
            
            return redirect()->to(base_url().'production');
        }

        $par001b=2;
        $par002b=$this->request->getVar('par002b')!==null ? $this->request->getVar('par002b') : ($this->request->getVar('par002')!==null ? $this->request->getVar('par002') : null);
        $par003b=$this->request->getVar('par003b')!==null ? $this->request->getVar('par003b') : ($this->request->getVar('par003')!==null ? $this->request->getVar('par003') : null);
        $par004b=$this->request->getVar('par004b')!==null ? $this->request->getVar('par004b') : ($this->request->getVar('par004')!==null ? $this->request->getVar('par004') : null);
        $par005b=$this->request->getVar('par005b')!==null ? $this->request->getVar('par005b') : ($this->request->getVar('par005')!==null ? $this->request->getVar('par005') : null);
        $par006b=$this->request->getVar('par006b')!==null ? $this->request->getVar('par006b') : ($this->request->getVar('par006')!==null ? $this->request->getVar('par006') : null);
        $par007b=$this->request->getVar('par007b')!==null ? $this->request->getVar('par007b') : ($this->request->getVar('par007')!==null ? $this->request->getVar('par007') : null);
        $par008b=date("Y-m-d H:i:s");
        $par009b=date('Y-m-d H:i:s');
        $par010b=$this->request->getVar('par010b')!==null ? $this->request->getVar('par010b') : ($this->request->getVar('par010')!==null ? $this->request->getVar('par010') : null);

        $par011b=$this->request->getVar('par011b')!==null ? $this->request->getVar('par011b') : ($this->request->getVar('par011')!==null ? $this->request->getVar('par011') : null);
        $par012b=$this->request->getVar('par012b')!==null ? $this->request->getVar('par012b') : ($this->request->getVar('par012')!==null ? $this->request->getVar('par012') : null);
        $par013b=$this->request->getVar('par013b')!==null ? $this->request->getVar('par013b') : ($this->request->getVar('par013')!==null ? $this->request->getVar('par013') : null);
        $par014b=$this->request->getVar('par014b')!==null ? $this->request->getVar('par014b') : ($this->request->getVar('par014')!==null ? $this->request->getVar('par014') : null);
        $par015b=$this->request->getVar('par015b')!==null ? $this->request->getVar('par015b') : ($this->request->getVar('par015')!==null ? $this->request->getVar('par015') : null);
        $par016b=$this->request->getVar('par016b')!==null ? $this->request->getVar('par016b') : ($this->request->getVar('par016')!==null ? $this->request->getVar('par016') : null);
        $par017b=$this->request->getVar('par017b')!==null ? $this->request->getVar('par017b') : ($this->request->getVar('par017')!==null ? $this->request->getVar('par017') : null);
        $par018b=$this->request->getVar('par018b')!==null ? $this->request->getVar('par018b') : ($this->request->getVar('par018')!==null ? $this->request->getVar('par018') : null);
        $par019b=$this->request->getVar('par019b')!==null ? $this->request->getVar('par019b') : ($this->request->getVar('par019')!==null ? $this->request->getVar('par019') : null);
        $par020b=$this->request->getVar('par020b')!==null ? $this->request->getVar('par020b') : ($this->request->getVar('par020')!==null ? $this->request->getVar('par020') : null);

        $par021b=$this->request->getVar('par021b')!==null ? $this->request->getVar('par021b') : ($this->request->getVar('par021')!==null ? $this->request->getVar('par021') : null);
        $par022b=$this->request->getVar('par022b')!==null ? $this->request->getVar('par022b') : ($this->request->getVar('par022')!==null ? $this->request->getVar('par022') : null);
        $par023b=$this->request->getVar('par023b')!==null ? $this->request->getVar('par023b') : ($this->request->getVar('par023')!==null ? $this->request->getVar('par023') : null);
        $par024b=$this->request->getVar('par024b')!==null ? $this->request->getVar('par024b') : ($this->request->getVar('par024')!==null ? $this->request->getVar('par024') : null);
        $par025b=$this->request->getVar('par025b')!==null ? $this->request->getVar('par025b') : ($this->request->getVar('par025')!==null ? $this->request->getVar('par025') : null);
        $par026b=$this->request->getVar('par026b')!==null ? $this->request->getVar('par026b') : ($this->request->getVar('par026')!==null ? $this->request->getVar('par026') : null);
        $par027b=$this->request->getVar('par027b')!==null ? $this->request->getVar('par027b') : ($this->request->getVar('par027')!==null ? $this->request->getVar('par027') : null);
        $par028b=$this->request->getVar('par028b')!==null ? $this->request->getVar('par028b') : ($this->request->getVar('par028')!==null ? $this->request->getVar('par028') : null);
        $par029b=$this->request->getVar('par029b')!==null ? $this->request->getVar('par029b') : ($this->request->getVar('par029')!==null ? $this->request->getVar('par029') : null);
        $par030b=$this->request->getVar('par030b')!==null ? $this->request->getVar('par030b') : ($this->request->getVar('par030')!==null ? $this->request->getVar('par030') : null);

        $par031b=$this->request->getVar('par031b')!==null ? $this->request->getVar('par031b') : ($this->request->getVar('par031')!==null ? $this->request->getVar('par031') : null);
        $par032b=$this->request->getVar('par032b')!==null ? $this->request->getVar('par032b') : ($this->request->getVar('par032')!==null ? $this->request->getVar('par032') : null);
        $par033b=$this->request->getVar('par033b')!==null ? $this->request->getVar('par033b') : ($this->request->getVar('par033')!==null ? $this->request->getVar('par033') : null);
        $par034b=$this->request->getVar('par034b')!==null ? $this->request->getVar('par034b') : ($this->request->getVar('par034')!==null ? $this->request->getVar('par034') : null);
        $par035b=$this->request->getVar('par035b')!==null ? $this->request->getVar('par035b') : ($this->request->getVar('par035')!==null ? $this->request->getVar('par035') : null);
        $par036b=$this->request->getVar('par036b')!==null ? $this->request->getVar('par036b') : ($this->request->getVar('par036')!==null ? $this->request->getVar('par036') : null);
        $par037b=$this->request->getVar('par037b')!==null ? $this->request->getVar('par037b') : ($this->request->getVar('par037')!==null ? $this->request->getVar('par037') : null);
        $par038b=$this->request->getVar('par038b')!==null ? $this->request->getVar('par038b') : ($this->request->getVar('par038')!==null ? $this->request->getVar('par038') : null);
        $par039b=$this->request->getVar('par039b')!==null ? $this->request->getVar('par039b') : ($this->request->getVar('par039')!==null ? $this->request->getVar('par039') : null);
        $par040b=$this->request->getVar('par040b')!==null ? $this->request->getVar('par040b') : ($this->request->getVar('par040')!==null ? $this->request->getVar('par040') : null);

        $par041b=$this->request->getVar('par041b')!==null ? $this->request->getVar('par041b') : ($this->request->getVar('par041')!==null ? $this->request->getVar('par041') : null);
        $par042b=$this->request->getVar('par042b')!==null ? $this->request->getVar('par042b') : ($this->request->getVar('par042')!==null ? $this->request->getVar('par042') : null);
        $par043b=$this->request->getVar('par043b')!==null ? $this->request->getVar('par043b') : ($this->request->getVar('par043')!==null ? $this->request->getVar('par043') : null);
        $resultb = $this->ProductionModel->addProses
        (
            [
                'number' => $number,
                'device' => $this->request->getVar('device-txt'),
                'model' => $this->request->getVar('model-txt'),
                'process' => $this->request->getVar('process-txt'),
                'lotno' => $this->request->getVar('lotno-txt'),
                'machno' => $this->request->getVar('machno-txt'),
                'empid' => $this->request->getVar('empid-txt'),
                'group' => $this->request->getVar('group-txt'),
                'shift' => $this->request->getVar('shift-txt'),
                'name' => $this->request->getVar('name-txt') ? $this->request->getVar('name-txt') : "" ,
                'empid2' => $this->request->getVar('empid2-txt') ? $this->request->getVar('empid2-txt') : ($this->request->getVar('empid-txt') ? $this->request->getVar('empid-txt') : ""),
                'group2' => $this->request->getVar('group2-txt') ? $this->request->getVar('group2-txt') : ($this->request->getVar('group-txt') ? $this->request->getVar('group-txt') : ""),
                'shift2' => $this->request->getVar('shift2-txt') ? $this->request->getVar('shift2-txt') : ($this->request->getVar('shift-txt') ? $this->request->getVar('shift-txt') : ""),
                'name2' => $this->request->getVar('name2-txt') ? $this->request->getVar('name2-txt') : ($this->request->getVar('name-txt') ? $this->request->getVar('name-txt') : ""),
                
                'par001' => $par001b,'par002' => $par002b,'par003' => $par003b,'par004' => $par004b,'par005' => $par005b,
                'par006' => $par006b,'par007' => $par007b,'par008' => $par008b,'par009' => $par009b,'par010' => $par010b,
                'par011' => $par011b,'par011' => $par012b,'par013' => $par013b,'par014' => $par014b,'par015' => $par015b,
                'par016' => $par016b,'par017' => $par017b,'par018' => $par018b,'par019' => $par019b,'par020' => $par020b,
                'par021' => $par021b,'par022' => $par022b,'par023' => $par023b,'par024' => $par024b,'par025' => $par025b,
                'par026' => $par026b,'par027' => $par027b,'par028' => $par028b,'par029' => $par029b,'par030' => $par030b,
                'par031' => $par031b,'par032' => $par032b,'par033' => $par033b,'par034' => $par034b,'par035' => $par035b,
                'par036' => $par036b,'par037' => $par037b,'par038' => $par038b,'par039' => $par039b,'par040' => $par040b,
                'par041' => $par041b,'par042' => $par042b,'par043' => $par043b,'par045'=>'Process Complete'
            ]
        );

        if($cnt_input==2){
            if ($resultb)
            {
                session()->setFlashdata('message', 'Input success!');
            }
            else
            {
                session()->setFlashdata('message', 'Input Failed!'); 
            }
            return redirect()->to(base_url().'production');
        }

        $par001c=3;
        $par002c=$this->request->getVar('par002c')!==null ? $this->request->getVar('par002c') : ($this->request->getVar('par002')!==null ? $this->request->getVar('par002') : null);
        $par003c=$this->request->getVar('par003c')!==null ? $this->request->getVar('par003c') : ($this->request->getVar('par003')!==null ? $this->request->getVar('par003') : null);
        $par004c=$this->request->getVar('par004c')!==null ? $this->request->getVar('par004c') : ($this->request->getVar('par004')!==null ? $this->request->getVar('par004') : null);
        $par005c=$this->request->getVar('par005c')!==null ? $this->request->getVar('par005c') : ($this->request->getVar('par005')!==null ? $this->request->getVar('par005') : null);
        $par006c=$this->request->getVar('par006c')!==null ? $this->request->getVar('par006c') : ($this->request->getVar('par006')!==null ? $this->request->getVar('par006') : null);
        $par007c=$this->request->getVar('par007c')!==null ? $this->request->getVar('par007c') : ($this->request->getVar('par007')!==null ? $this->request->getVar('par007') : null);
        $par008c=date("Y-m-d H:i:s");
        $par009c=date('Y-m-d H:i:s');
        $par010c=$this->request->getVar('par010c')!==null ? $this->request->getVar('par010c') : ($this->request->getVar('par010')!==null ? $this->request->getVar('par010') : null);

        $par011c=$this->request->getVar('par011c')!==null ? $this->request->getVar('par011c') : ($this->request->getVar('par011')!==null ? $this->request->getVar('par011') : null);
        $par012c=$this->request->getVar('par012c')!==null ? $this->request->getVar('par012c') : ($this->request->getVar('par012')!==null ? $this->request->getVar('par012') : null);
        $par013c=$this->request->getVar('par013c')!==null ? $this->request->getVar('par013c') : ($this->request->getVar('par013')!==null ? $this->request->getVar('par013') : null);
        $par014c=$this->request->getVar('par014c')!==null ? $this->request->getVar('par014c') : ($this->request->getVar('par014')!==null ? $this->request->getVar('par014') : null);
        $par015c=$this->request->getVar('par015c')!==null ? $this->request->getVar('par015c') : ($this->request->getVar('par015')!==null ? $this->request->getVar('par015') : null);
        $par016c=$this->request->getVar('par016c')!==null ? $this->request->getVar('par016c') : ($this->request->getVar('par016')!==null ? $this->request->getVar('par016') : null);
        $par017c=$this->request->getVar('par017c')!==null ? $this->request->getVar('par017c') : ($this->request->getVar('par017')!==null ? $this->request->getVar('par017') : null);
        $par018c=$this->request->getVar('par018c')!==null ? $this->request->getVar('par018c') : ($this->request->getVar('par018')!==null ? $this->request->getVar('par018') : null);
        $par019c=$this->request->getVar('par019c')!==null ? $this->request->getVar('par019c') : ($this->request->getVar('par019')!==null ? $this->request->getVar('par019') : null);
        $par020c=$this->request->getVar('par020c')!==null ? $this->request->getVar('par020c') : ($this->request->getVar('par020')!==null ? $this->request->getVar('par020') : null);

        $par021c=$this->request->getVar('par021c')!==null ? $this->request->getVar('par021c') : ($this->request->getVar('par021')!==null ? $this->request->getVar('par021') : null);
        $par022c=$this->request->getVar('par022c')!==null ? $this->request->getVar('par022c') : ($this->request->getVar('par022')!==null ? $this->request->getVar('par022') : null);
        $par023c=$this->request->getVar('par023c')!==null ? $this->request->getVar('par023c') : ($this->request->getVar('par023')!==null ? $this->request->getVar('par023') : null);
        $par024c=$this->request->getVar('par024c')!==null ? $this->request->getVar('par024c') : ($this->request->getVar('par024')!==null ? $this->request->getVar('par024') : null);
        $par025c=$this->request->getVar('par025c')!==null ? $this->request->getVar('par025c') : ($this->request->getVar('par025')!==null ? $this->request->getVar('par025') : null);
        $par026c=$this->request->getVar('par026c')!==null ? $this->request->getVar('par026c') : ($this->request->getVar('par026')!==null ? $this->request->getVar('par026') : null);
        $par027c=$this->request->getVar('par027c')!==null ? $this->request->getVar('par027c') : ($this->request->getVar('par027')!==null ? $this->request->getVar('par027') : null);
        $par028c=$this->request->getVar('par028c')!==null ? $this->request->getVar('par028c') : ($this->request->getVar('par028')!==null ? $this->request->getVar('par028') : null);
        $par029c=$this->request->getVar('par029c')!==null ? $this->request->getVar('par029c') : ($this->request->getVar('par029')!==null ? $this->request->getVar('par029') : null);
        $par030c=$this->request->getVar('par030c')!==null ? $this->request->getVar('par030c') : ($this->request->getVar('par030')!==null ? $this->request->getVar('par030') : null);

        $par031c=$this->request->getVar('par031c')!==null ? $this->request->getVar('par031c') : ($this->request->getVar('par031')!==null ? $this->request->getVar('par031') : null);
        $par032c=$this->request->getVar('par032c')!==null ? $this->request->getVar('par032c') : ($this->request->getVar('par032')!==null ? $this->request->getVar('par032') : null);
        $par033c=$this->request->getVar('par033c')!==null ? $this->request->getVar('par033c') : ($this->request->getVar('par033')!==null ? $this->request->getVar('par033') : null);
        $par034c=$this->request->getVar('par034c')!==null ? $this->request->getVar('par034c') : ($this->request->getVar('par034')!==null ? $this->request->getVar('par034') : null);
        $par035c=$this->request->getVar('par035c')!==null ? $this->request->getVar('par035c') : ($this->request->getVar('par035')!==null ? $this->request->getVar('par035') : null);
        $par036c=$this->request->getVar('par036c')!==null ? $this->request->getVar('par036c') : ($this->request->getVar('par036')!==null ? $this->request->getVar('par036') : null);
        $par037c=$this->request->getVar('par037c')!==null ? $this->request->getVar('par037c') : ($this->request->getVar('par037')!==null ? $this->request->getVar('par037') : null);
        $par038c=$this->request->getVar('par038c')!==null ? $this->request->getVar('par038c') : ($this->request->getVar('par038')!==null ? $this->request->getVar('par038') : null);
        $par039c=$this->request->getVar('par039c')!==null ? $this->request->getVar('par039c') : ($this->request->getVar('par039')!==null ? $this->request->getVar('par039') : null);
        $par040c=$this->request->getVar('par040c')!==null ? $this->request->getVar('par040c') : ($this->request->getVar('par040')!==null ? $this->request->getVar('par040') : null);

        $par041c=$this->request->getVar('par041c')!==null ? $this->request->getVar('par041c') : ($this->request->getVar('par041')!==null ? $this->request->getVar('par041') : null);
        $par042c=$this->request->getVar('par042c')!==null ? $this->request->getVar('par042c') : ($this->request->getVar('par042')!==null ? $this->request->getVar('par042') : null);
        $par043c=$this->request->getVar('par043c')!==null ? $this->request->getVar('par043c') : ($this->request->getVar('par043')!==null ? $this->request->getVar('par043') : null);
        $resultc = $this->ProductionModel->addProses
        (
            [
                'number' => $number,
                'device' => $this->request->getVar('device-txt'),
                'model' => $this->request->getVar('model-txt'),
                'process' => $this->request->getVar('process-txt'),
                'lotno' => $this->request->getVar('lotno-txt'),
                'machno' => $this->request->getVar('machno-txt'),
                'empid' => $this->request->getVar('empid-txt'),
                'group' => $this->request->getVar('group-txt'),
                'shift' => $this->request->getVar('shift-txt'),
                'name' => $this->request->getVar('name-txt') ? $this->request->getVar('name-txt') : "" ,
                'empid2' => $this->request->getVar('empid2-txt') ? $this->request->getVar('empid2-txt') : ($this->request->getVar('empid-txt') ? $this->request->getVar('empid-txt') : ""),
                'group2' => $this->request->getVar('group2-txt') ? $this->request->getVar('group2-txt') : ($this->request->getVar('group-txt') ? $this->request->getVar('group-txt') : ""),
                'shift2' => $this->request->getVar('shift2-txt') ? $this->request->getVar('shift2-txt') : ($this->request->getVar('shift-txt') ? $this->request->getVar('shift-txt') : ""),
                'name2' => $this->request->getVar('name2-txt') ? $this->request->getVar('name2-txt') : ($this->request->getVar('name-txt') ? $this->request->getVar('name-txt') : ""),
                
                'par001' => $par001c,'par002' => $par002c,'par003' => $par003c,'par004' => $par004c,'par005' => $par005c,
                'par006' => $par006c,'par007' => $par007c,'par008' => $par008c,'par009' => $par009c,'par010' => $par010c,
                'par011' => $par011c,'par011' => $par012c,'par013' => $par013c,'par014' => $par014c,'par015' => $par015c,
                'par016' => $par016c,'par017' => $par017c,'par018' => $par018c,'par019' => $par019c,'par020' => $par020c,
                'par021' => $par021c,'par022' => $par022c,'par023' => $par023c,'par024' => $par024c,'par025' => $par025c,
                'par026' => $par026c,'par027' => $par027c,'par028' => $par028c,'par029' => $par029c,'par030' => $par030c,
                'par031' => $par031c,'par032' => $par032c,'par033' => $par033c,'par034' => $par034c,'par035' => $par035c,
                'par036' => $par036c,'par037' => $par037c,'par038' => $par038c,'par039' => $par039c,'par040' => $par040c,
                'par041' => $par041c,'par042' => $par042c,'par043' => $par043c,'par045'=>'Process Complete'
            ]
        );

        if($cnt_input==3){
            if ($resultc)
            {
                session()->setFlashdata('message', 'Input success!');
            }
            else
            {
                session()->setFlashdata('message', 'Input Failed!'); 
            }
            return redirect()->to(base_url().'production');
        }

        $par001d=4;
        $par002d=$this->request->getVar('par002d')!==null ? $this->request->getVar('par002d') : ($this->request->getVar('par002')!==null ? $this->request->getVar('par002') : null);
        $par003d=$this->request->getVar('par003d')!==null ? $this->request->getVar('par003d') : ($this->request->getVar('par003')!==null ? $this->request->getVar('par003') : null);
        $par004d=$this->request->getVar('par004d')!==null ? $this->request->getVar('par004d') : ($this->request->getVar('par004')!==null ? $this->request->getVar('par004') : null);
        $par005d=$this->request->getVar('par005d')!==null ? $this->request->getVar('par005d') : ($this->request->getVar('par005')!==null ? $this->request->getVar('par005') : null);
        $par006d=$this->request->getVar('par006d')!==null ? $this->request->getVar('par006d') : ($this->request->getVar('par006')!==null ? $this->request->getVar('par006') : null);
        $par007d=$this->request->getVar('par007d')!==null ? $this->request->getVar('par007d') : ($this->request->getVar('par007')!==null ? $this->request->getVar('par007') : null);
        $par008d=date("Y-m-d H:i:s");
        $par009d=date('Y-m-d H:i:s');
        $par010d=$this->request->getVar('par010d')!==null ? $this->request->getVar('par010d') : ($this->request->getVar('par010')!==null ? $this->request->getVar('par010') : null);

        $par011d=$this->request->getVar('par011d')!==null ? $this->request->getVar('par011d') : ($this->request->getVar('par011')!==null ? $this->request->getVar('par011') : null);
        $par012d=$this->request->getVar('par012d')!==null ? $this->request->getVar('par012d') : ($this->request->getVar('par012')!==null ? $this->request->getVar('par012') : null);
        $par013d=$this->request->getVar('par013d')!==null ? $this->request->getVar('par013d') : ($this->request->getVar('par013')!==null ? $this->request->getVar('par013') : null);
        $par014d=$this->request->getVar('par014d')!==null ? $this->request->getVar('par014d') : ($this->request->getVar('par014')!==null ? $this->request->getVar('par014') : null);
        $par015d=$this->request->getVar('par015d')!==null ? $this->request->getVar('par015d') : ($this->request->getVar('par015')!==null ? $this->request->getVar('par015') : null);
        $par016d=$this->request->getVar('par016d')!==null ? $this->request->getVar('par016d') : ($this->request->getVar('par016')!==null ? $this->request->getVar('par016') : null);
        $par017d=$this->request->getVar('par017d')!==null ? $this->request->getVar('par017d') : ($this->request->getVar('par017')!==null ? $this->request->getVar('par017') : null);
        $par018d=$this->request->getVar('par018d')!==null ? $this->request->getVar('par018d') : ($this->request->getVar('par018')!==null ? $this->request->getVar('par018') : null);
        $par019d=$this->request->getVar('par019d')!==null ? $this->request->getVar('par019d') : ($this->request->getVar('par019')!==null ? $this->request->getVar('par019') : null);
        $par020d=$this->request->getVar('par020d')!==null ? $this->request->getVar('par020d') : ($this->request->getVar('par020')!==null ? $this->request->getVar('par020') : null);

        $par021d=$this->request->getVar('par021d')!==null ? $this->request->getVar('par021d') : ($this->request->getVar('par021')!==null ? $this->request->getVar('par021') : null);
        $par022d=$this->request->getVar('par022d')!==null ? $this->request->getVar('par022d') : ($this->request->getVar('par022')!==null ? $this->request->getVar('par022') : null);
        $par023d=$this->request->getVar('par023d')!==null ? $this->request->getVar('par023d') : ($this->request->getVar('par023')!==null ? $this->request->getVar('par023') : null);
        $par024d=$this->request->getVar('par024d')!==null ? $this->request->getVar('par024d') : ($this->request->getVar('par024')!==null ? $this->request->getVar('par024') : null);
        $par025d=$this->request->getVar('par025d')!==null ? $this->request->getVar('par025d') : ($this->request->getVar('par025')!==null ? $this->request->getVar('par025') : null);
        $par026d=$this->request->getVar('par026d')!==null ? $this->request->getVar('par026d') : ($this->request->getVar('par026')!==null ? $this->request->getVar('par026') : null);
        $par027d=$this->request->getVar('par027d')!==null ? $this->request->getVar('par027d') : ($this->request->getVar('par027')!==null ? $this->request->getVar('par027') : null);
        $par028d=$this->request->getVar('par028d')!==null ? $this->request->getVar('par028d') : ($this->request->getVar('par028')!==null ? $this->request->getVar('par028') : null);
        $par029d=$this->request->getVar('par029d')!==null ? $this->request->getVar('par029d') : ($this->request->getVar('par029')!==null ? $this->request->getVar('par029') : null);
        $par030d=$this->request->getVar('par030d')!==null ? $this->request->getVar('par030d') : ($this->request->getVar('par030')!==null ? $this->request->getVar('par030') : null);

        $par031d=$this->request->getVar('par031d')!==null ? $this->request->getVar('par031d') : ($this->request->getVar('par031')!==null ? $this->request->getVar('par031') : null);
        $par032d=$this->request->getVar('par032d')!==null ? $this->request->getVar('par032d') : ($this->request->getVar('par032')!==null ? $this->request->getVar('par032') : null);
        $par033d=$this->request->getVar('par033d')!==null ? $this->request->getVar('par033d') : ($this->request->getVar('par033')!==null ? $this->request->getVar('par033') : null);
        $par034d=$this->request->getVar('par034d')!==null ? $this->request->getVar('par034d') : ($this->request->getVar('par034')!==null ? $this->request->getVar('par034') : null);
        $par035d=$this->request->getVar('par035d')!==null ? $this->request->getVar('par035d') : ($this->request->getVar('par035')!==null ? $this->request->getVar('par035') : null);
        $par036d=$this->request->getVar('par036d')!==null ? $this->request->getVar('par036d') : ($this->request->getVar('par036')!==null ? $this->request->getVar('par036') : null);
        $par037d=$this->request->getVar('par037d')!==null ? $this->request->getVar('par037d') : ($this->request->getVar('par037')!==null ? $this->request->getVar('par037') : null);
        $par038d=$this->request->getVar('par038d')!==null ? $this->request->getVar('par038d') : ($this->request->getVar('par038')!==null ? $this->request->getVar('par038') : null);
        $par039d=$this->request->getVar('par039d')!==null ? $this->request->getVar('par039d') : ($this->request->getVar('par039')!==null ? $this->request->getVar('par039') : null);
        $par040d=$this->request->getVar('par040d')!==null ? $this->request->getVar('par040d') : ($this->request->getVar('par040')!==null ? $this->request->getVar('par040') : null);

        $par041d=$this->request->getVar('par041d')!==null ? $this->request->getVar('par041d') : ($this->request->getVar('par041')!==null ? $this->request->getVar('par041') : null);
        $par042d=$this->request->getVar('par042d')!==null ? $this->request->getVar('par042d') : ($this->request->getVar('par042')!==null ? $this->request->getVar('par042') : null);
        $par043d=$this->request->getVar('par043d')!==null ? $this->request->getVar('par043d') : ($this->request->getVar('par043')!==null ? $this->request->getVar('par043') : null);
        $resultd = $this->ProductionModel->addProses
        (
            [
                'number' => $number,
                'device' => $this->request->getVar('device-txt'),
                'model' => $this->request->getVar('model-txt'),
                'process' => $this->request->getVar('process-txt'),
                'lotno' => $this->request->getVar('lotno-txt'),
                'machno' => $this->request->getVar('machno-txt'),
                'empid' => $this->request->getVar('empid-txt'),
                'group' => $this->request->getVar('group-txt'),
                'shift' => $this->request->getVar('shift-txt'),
                'name' => $this->request->getVar('name-txt') ? $this->request->getVar('name-txt') : "" ,
                'empid2' => $this->request->getVar('empid2-txt') ? $this->request->getVar('empid2-txt') : ($this->request->getVar('empid-txt') ? $this->request->getVar('empid-txt') : ""),
                'group2' => $this->request->getVar('group2-txt') ? $this->request->getVar('group2-txt') : ($this->request->getVar('group-txt') ? $this->request->getVar('group-txt') : ""),
                'shift2' => $this->request->getVar('shift2-txt') ? $this->request->getVar('shift2-txt') : ($this->request->getVar('shift-txt') ? $this->request->getVar('shift-txt') : ""),
                'name2' => $this->request->getVar('name2-txt') ? $this->request->getVar('name2-txt') : ($this->request->getVar('name-txt') ? $this->request->getVar('name-txt') : ""),
                
                'par001' => $par001d,'par002' => $par002d,'par003' => $par003d,'par004' => $par004d,'par005' => $par005d,
                'par006' => $par006d,'par007' => $par007d,'par008' => $par008d,'par009' => $par009d,'par010' => $par010d,
                'par011' => $par011d,'par011' => $par012d,'par013' => $par013d,'par014' => $par014d,'par015' => $par015d,
                'par016' => $par016d,'par017' => $par017d,'par018' => $par018d,'par019' => $par019d,'par020' => $par020d,
                'par021' => $par021d,'par022' => $par022d,'par023' => $par023d,'par024' => $par024d,'par025' => $par025d,
                'par026' => $par026d,'par027' => $par027d,'par028' => $par028d,'par029' => $par029d,'par030' => $par030d,
                'par031' => $par031d,'par032' => $par032d,'par033' => $par033d,'par034' => $par034d,'par035' => $par035d,
                'par036' => $par036d,'par037' => $par037d,'par038' => $par038d,'par039' => $par039d,'par040' => $par040d,
                'par041' => $par041d,'par042' => $par042d,'par043' => $par043d,'par045'=>'Process Complete'
            ]
        );

        if($cnt_input==4){
            if ($resultd)
            {
                session()->setFlashdata('message', 'Input success!');
            }
            else
            {
                session()->setFlashdata('message', 'Input Failed!'); 
            }
            return redirect()->to(base_url().'production');
        }

        $par001e=5;
        $par002e=$this->request->getVar('par002e')!==null ? $this->request->getVar('par002e') : ($this->request->getVar('par002')!==null ? $this->request->getVar('par002') : null);
        $par003e=$this->request->getVar('par003e')!==null ? $this->request->getVar('par003e') : ($this->request->getVar('par003')!==null ? $this->request->getVar('par003') : null);
        $par004e=$this->request->getVar('par004e')!==null ? $this->request->getVar('par004e') : ($this->request->getVar('par004')!==null ? $this->request->getVar('par004') : null);
        $par005e=$this->request->getVar('par005e')!==null ? $this->request->getVar('par005e') : ($this->request->getVar('par005')!==null ? $this->request->getVar('par005') : null);
        $par006e=$this->request->getVar('par006e')!==null ? $this->request->getVar('par006e') : ($this->request->getVar('par006')!==null ? $this->request->getVar('par006') : null);
        $par007e=$this->request->getVar('par007e')!==null ? $this->request->getVar('par007e') : ($this->request->getVar('par007')!==null ? $this->request->getVar('par007') : null);
        $par008e=date("Y-m-d H:i:s");
        $par009e=date('Y-m-d H:i:s');
        $par010e=$this->request->getVar('par010e')!==null ? $this->request->getVar('par010e') : ($this->request->getVar('par010')!==null ? $this->request->getVar('par010') : null);

        $par011e=$this->request->getVar('par011e')!==null ? $this->request->getVar('par011e') : ($this->request->getVar('par011')!==null ? $this->request->getVar('par011') : null);
        $par012e=$this->request->getVar('par012e')!==null ? $this->request->getVar('par012e') : ($this->request->getVar('par012')!==null ? $this->request->getVar('par012') : null);
        $par013e=$this->request->getVar('par013e')!==null ? $this->request->getVar('par013e') : ($this->request->getVar('par013')!==null ? $this->request->getVar('par013') : null);
        $par014e=$this->request->getVar('par014e')!==null ? $this->request->getVar('par014e') : ($this->request->getVar('par014')!==null ? $this->request->getVar('par014') : null);
        $par015e=$this->request->getVar('par015e')!==null ? $this->request->getVar('par015e') : ($this->request->getVar('par015')!==null ? $this->request->getVar('par015') : null);
        $par016e=$this->request->getVar('par016e')!==null ? $this->request->getVar('par016e') : ($this->request->getVar('par016')!==null ? $this->request->getVar('par016') : null);
        $par017e=$this->request->getVar('par017e')!==null ? $this->request->getVar('par017e') : ($this->request->getVar('par017')!==null ? $this->request->getVar('par017') : null);
        $par018e=$this->request->getVar('par018e')!==null ? $this->request->getVar('par018e') : ($this->request->getVar('par018')!==null ? $this->request->getVar('par018') : null);
        $par019e=$this->request->getVar('par019e')!==null ? $this->request->getVar('par019e') : ($this->request->getVar('par019')!==null ? $this->request->getVar('par019') : null);
        $par020e=$this->request->getVar('par020e')!==null ? $this->request->getVar('par020e') : ($this->request->getVar('par020')!==null ? $this->request->getVar('par020') : null);

        $par021e=$this->request->getVar('par021e')!==null ? $this->request->getVar('par021e') : ($this->request->getVar('par021')!==null ? $this->request->getVar('par021') : null);
        $par022e=$this->request->getVar('par022e')!==null ? $this->request->getVar('par022e') : ($this->request->getVar('par022')!==null ? $this->request->getVar('par022') : null);
        $par023e=$this->request->getVar('par023e')!==null ? $this->request->getVar('par023e') : ($this->request->getVar('par023')!==null ? $this->request->getVar('par023') : null);
        $par024e=$this->request->getVar('par024e')!==null ? $this->request->getVar('par024e') : ($this->request->getVar('par024')!==null ? $this->request->getVar('par024') : null);
        $par025e=$this->request->getVar('par025e')!==null ? $this->request->getVar('par025e') : ($this->request->getVar('par025')!==null ? $this->request->getVar('par025') : null);
        $par026e=$this->request->getVar('par026e')!==null ? $this->request->getVar('par026e') : ($this->request->getVar('par026')!==null ? $this->request->getVar('par026') : null);
        $par027e=$this->request->getVar('par027e')!==null ? $this->request->getVar('par027e') : ($this->request->getVar('par027')!==null ? $this->request->getVar('par027') : null);
        $par028e=$this->request->getVar('par028e')!==null ? $this->request->getVar('par028e') : ($this->request->getVar('par028')!==null ? $this->request->getVar('par028') : null);
        $par029e=$this->request->getVar('par029e')!==null ? $this->request->getVar('par029e') : ($this->request->getVar('par029')!==null ? $this->request->getVar('par029') : null);
        $par030e=$this->request->getVar('par030e')!==null ? $this->request->getVar('par030e') : ($this->request->getVar('par030')!==null ? $this->request->getVar('par030') : null);

        $par031e=$this->request->getVar('par031e')!==null ? $this->request->getVar('par031e') : ($this->request->getVar('par031')!==null ? $this->request->getVar('par031') : null);
        $par032e=$this->request->getVar('par032e')!==null ? $this->request->getVar('par032e') : ($this->request->getVar('par032')!==null ? $this->request->getVar('par032') : null);
        $par033e=$this->request->getVar('par033e')!==null ? $this->request->getVar('par033e') : ($this->request->getVar('par033')!==null ? $this->request->getVar('par033') : null);
        $par034e=$this->request->getVar('par034e')!==null ? $this->request->getVar('par034e') : ($this->request->getVar('par034')!==null ? $this->request->getVar('par034') : null);
        $par035e=$this->request->getVar('par035e')!==null ? $this->request->getVar('par035e') : ($this->request->getVar('par035')!==null ? $this->request->getVar('par035') : null);
        $par036e=$this->request->getVar('par036e')!==null ? $this->request->getVar('par036e') : ($this->request->getVar('par036')!==null ? $this->request->getVar('par036') : null);
        $par037e=$this->request->getVar('par037e')!==null ? $this->request->getVar('par037e') : ($this->request->getVar('par037')!==null ? $this->request->getVar('par037') : null);
        $par038e=$this->request->getVar('par038e')!==null ? $this->request->getVar('par038e') : ($this->request->getVar('par038')!==null ? $this->request->getVar('par038') : null);
        $par039e=$this->request->getVar('par039e')!==null ? $this->request->getVar('par039e') : ($this->request->getVar('par039')!==null ? $this->request->getVar('par039') : null);
        $par040e=$this->request->getVar('par040e')!==null ? $this->request->getVar('par040e') : ($this->request->getVar('par040')!==null ? $this->request->getVar('par040') : null);

        $par041e=$this->request->getVar('par041e')!==null ? $this->request->getVar('par041e') : ($this->request->getVar('par041')!==null ? $this->request->getVar('par041') : null);
        $par042e=$this->request->getVar('par042e')!==null ? $this->request->getVar('par042e') : ($this->request->getVar('par042')!==null ? $this->request->getVar('par042') : null);
        $par043e=$this->request->getVar('par043e')!==null ? $this->request->getVar('par043e') : ($this->request->getVar('par043')!==null ? $this->request->getVar('par043') : null);
        $resulte = $this->ProductionModel->addProses
        (
            [
                'number' => $number,
                'device' => $this->request->getVar('device-txt'),
                'model' => $this->request->getVar('model-txt'),
                'process' => $this->request->getVar('process-txt'),
                'lotno' => $this->request->getVar('lotno-txt'),
                'machno' => $this->request->getVar('machno-txt'),
                'empid' => $this->request->getVar('empid-txt'),
                'group' => $this->request->getVar('group-txt'),
                'shift' => $this->request->getVar('shift-txt'),
                'name' => $this->request->getVar('name-txt') ? $this->request->getVar('name-txt') : "" ,
                'empid2' => $this->request->getVar('empid2-txt') ? $this->request->getVar('empid2-txt') : ($this->request->getVar('empid-txt') ? $this->request->getVar('empid-txt') : ""),
                'group2' => $this->request->getVar('group2-txt') ? $this->request->getVar('group2-txt') : ($this->request->getVar('group-txt') ? $this->request->getVar('group-txt') : ""),
                'shift2' => $this->request->getVar('shift2-txt') ? $this->request->getVar('shift2-txt') : ($this->request->getVar('shift-txt') ? $this->request->getVar('shift-txt') : ""),
                'name2' => $this->request->getVar('name2-txt') ? $this->request->getVar('name2-txt') : ($this->request->getVar('name-txt') ? $this->request->getVar('name-txt') : ""),
                
                'par001' => $par001e,'par002' => $par002e,'par003' => $par003e,'par004' => $par004e,'par005' => $par005d,
                'par006' => $par006e,'par007' => $par007e,'par008' => $par008e,'par009' => $par009e,'par010' => $par010d,
                'par011' => $par011e,'par011' => $par012e,'par013' => $par013e,'par014' => $par014e,'par015' => $par015d,
                'par016' => $par016e,'par017' => $par017e,'par018' => $par018e,'par019' => $par019e,'par020' => $par020d,
                'par021' => $par021e,'par022' => $par022e,'par023' => $par023e,'par024' => $par024e,'par025' => $par025d,
                'par026' => $par026e,'par027' => $par027e,'par028' => $par028e,'par029' => $par029e,'par030' => $par030d,
                'par031' => $par031e,'par032' => $par032e,'par033' => $par033e,'par034' => $par034e,'par035' => $par035d,
                'par036' => $par036e,'par037' => $par037e,'par038' => $par038e,'par039' => $par039e,'par040' => $par040d,
                'par041' => $par041e,'par042' => $par042e,'par043' => $par043e,'par045'=>'Process Complete'
            ]
        );

        if ($resulte)
        {
            session()->setFlashdata('message', 'Input success!');
        }
        else
        {
            session()->setFlashdata('message', 'Input Failed!'); 
        }
        return redirect()->to(base_url().'production');
        
        
    }

}