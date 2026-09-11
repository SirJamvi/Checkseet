<?php 

namespace App\Models;

use CodeIgniter\Model;

class LogActivityModel extends Model {

	protected $table = 'log_activity';
    protected $useTimestamps = true;
    protected $allowedFields = ['id','emp_id','type_activity','activity','user','table_name','created_at'];

    public function addLogActivity($data)
    {
        return $this->insert($data);
    }
    public function getAll($dateStart='1970-1-1',$dateEnd='2070-1-1')
    {
        $query = "SELECT *
        FROM log_activity
        WHERE 
        `created_at` >= '$dateStart' AND 
        `created_at` <= '$dateEnd' ";
        
        $data = $this->query($query);
        return $data->getResultArray();
    }
}

?>