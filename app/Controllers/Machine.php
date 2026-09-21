<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MachineModel; // Pastikan Anda juga sudah membuat MachineModel.php

class Machine extends BaseController
{
    public function getList()
    {
        $processCode = $this->request->getGet('process');
        
        // Jika tidak ada process_code yang dikirim, kembalikan array kosong
        if (!$processCode) {
            return $this->response->setJSON([]);
        }

        // Panggil MachineModel untuk mengambil data dari database
        $machineModel = new MachineModel();
        $machines = $machineModel->getMachineByProcess($processCode);

        // Kembalikan data dalam format JSON agar bisa dibaca oleh AJAX (Select2)
        return $this->response->setJSON($machines);
    }
}