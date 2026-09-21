<?php

namespace App\Models;

use CodeIgniter\Model;

class MachineModel extends Model
{
    protected $table            = 'machine_list';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['process_code', 'machine_name', 'created_at', 'updated_at', 'deleted_at'];

    // Fungsi tambahan untuk mengambil data berdasarkan process_code
    public function getMachineByProcess($processCode)
    {
        return $this->where('process_code', $processCode)->findAll();
    }
}