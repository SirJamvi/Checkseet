<?php 

namespace App\Models;

use CodeIgniter\Model;

class InputModel extends Model {

	protected $table = 'checksheet';
    protected $useTimestamps = true;
    protected $allowedFields = ['idcsheet', 'device', 'process', 'lotno', 'model', 'machno', 'empid', 'group', 'shift', 'par001', 'par002', 'par003', 'par004', 'par005', 'par006', 'par007', 'par008',
    'par009', 'par010', 'par011', 'par012', 'par013', 'par014', 'par015', 'par016', 'par017', 'par018', 'par019', 'par020', 'par021', 'par022', 'par023', 'par024', 'par025', 'par026', 'par027', 'par028', 'par029',
    'par030', 'par031'];

    public function getCsheet($slug = false)
    {
        if ($slug == false)
        {
            return $this->findall();
        }

        return $this->where(['slug' => $slug])->first();

    }
    
}

?>