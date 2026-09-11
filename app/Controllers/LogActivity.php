<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LogActivityModel;
use CodeIgniter\CodeIgniter;

class LogActivity extends BaseController
{
    protected $session;
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->LogActivityModel = new LogActivityModel();
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Data Production | Startup Management',
            'alldata' => $this->LogActivityModel->getAll()
        ];
        return view('log-activity', $data);
    }

}
