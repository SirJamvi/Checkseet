<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MachineModel;

class Machine extends BaseController
{
    public function getList()
    {
        $processCode = $this->request->getGet('process');

        if (!$processCode) {
            return $this->response->setJSON([]);
        }

        $machineModel = new MachineModel();
        $machines = $machineModel->getMachineByProcess($processCode);

        return $this->response->setJSON($machines);
    }
}