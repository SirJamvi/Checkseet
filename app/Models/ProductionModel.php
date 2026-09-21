<?php 

namespace App\Models;

use CodeIgniter\Model;

class ProductionModel extends Model {

	protected $table = 'production';
    protected $useTimestamps = true;
    protected $allowedFields = ['id','number', 'device', 'process', 'model', 'lotno', 'machno', 'empid', 'group', 'shift', 'name', 'empid2', 'group2', 'shift2', 'name2', 'par001', 'par002', 'par003', 'par004', 'par005', 'par006', 'par007', 'par008',
    'par009', 'par010', 'par011', 'par012', 'par013', 'par014', 'par015', 'par016', 'par017', 'par018', 'par019', 'par020', 'par021', 'par022', 'par023', 'par024', 'par025', 'par026', 'par027', 
    'par028', 'par029', 'par030', 'par031', 'par032', 'par033', 'par034', 'par035', 'par036', 'par037', 'par038', 'par039', 'par040', 'par041', 'par042', 'par043','par044','par045','foreman','leader','supervisor'];

    public function getCsheet($slug = false)
    {
        if ($slug == false)
        {
            return $this->findall();
        }

        return $this->where(['slug' => $slug])->first();

    }
    public function getAllData()
    {
        $query = "SELECT * FROM production 
        WHERE 
        par001 = '1'";
        $data = $this->query($query);
        return $data->getResultArray();
    }
  public function getAll($dateStart='1970-1-1',$dateEnd='2070-1-1',$process='',$model='',$lotno='',$machno='')
    {
        $machnoCondition = "";
        if ($machno !== '') {$machnoCondition = "AND s.machno LIKE '%$machno%'";
        } else {
            $machnoCondition = "AND (s.machno LIKE '%%' OR s.machno IS NULL)";
        }

        $query = "SELECT DISTINCT * 
        FROM `production` as s
        INNER JOIN (SELECT device, type, process_code, name as process_name, docno, revisi, berlaku FROM proses) as p ON s.process=p.process_code 
        INNER JOIN (SELECT code, name as device_name FROM device) as d ON p.device=d.code
        WHERE 
        s.created_at >= '$dateStart' AND 
        s.created_at <= '$dateEnd' AND
        s.process = '$process' AND
        s.model LIKE '%$model%' AND   
        s.lotno LIKE '%$lotno\%'$machnoCondition
        ORDER BY s.id";
        
        $data = $this->query($query);
        return $data->getResultArray();
    }
    
    public function getByNumber($number)
    {
        $query = "SELECT * FROM production as cs
        INNER JOIN (SELECT device, type, process_code, name as process_name, docno FROM proses ) as p ON cs.process = p.process_code
        INNER JOIN (SELECT code, name as device_name FROM device) as d ON d.code = p.device
        WHERE 
        `number` = $number 
        ORDER BY `par001`";
        $data = $this->query($query);
        return $data->getResultArray();
    }


    public function getLatestId()
    {
        $query = "SELECT `number` FROM production ORDER BY `number` DESC LIMIT 1 " ;
        $result=$this->query($query);
        if($result==null){
            return 0;
        }
        return $result->getRow()->number ?? 0;
    }

    public function getApprovalData($status="PENDING")
    {
        $query= "SELECT DISTINCT `number`, `created_at`, `process`, `machno`, `model`, `lotno`, `empid`, `shift`, `group`, `par044` , `foreman` , `leader` , `supervisor` 
        FROM production
        WHERE `par001`<=1";
        return $this->query($query)->getResultArray();
    }

    public function getLotHistory($dateStart='1970-1-1',$dateEnd='2070-1-1',$process='',$model='',$lotno='',$machno='',$device='',$status='Process Start')
    {
        $query= "SELECT DISTINCT `number`,p.name as name,d.name as device_name, cs.created_at, `process`, cs.device, `machno`, `model`, `lotno`, `empid`, `shift`, `group`,`par009`, `par045` 
        FROM production as cs
        INNER JOIN proses as p ON cs.process=p.process_code 
        INNER JOIN device as d ON p.device = d.code
        WHERE `par001`<=1 AND
        cs.created_at >= '$dateStart' AND 
        cs.created_at <= '$dateEnd' AND
        `process` LIKE '%$process%' AND
        cs.device LIKE '%$device%' AND
        `model` LIKE '%$model%' AND   
        `lotno` LIKE '%$lotno%' AND 
        `machno` LIKE '%$machno%' AND
        `par045` = '$status'
        ORDER BY created_at DESC" ;
        return $this->query($query)->getResultArray();
    }

    public function addProses($data)
    {
        $query = 'SELECT * FROM production  WHERE `number` = ' . $data["number"] . ' AND `par001` = ' . $data["par001"];
        $result=$this->query($query)->getRow();

        if($result==null){
            $data["empid2"]=null;
            $data["group2"]=null;
            $data["shift2"]=null;
            $data["name2"]=null;
            $data["par009"]=null;
            $data["par045"]="Process Start";
            $this->insert($data);
            return 'Add Production (Process Start)';
        }
        else{
            if($result->par045=="Process Complete"){
                $this->update($result->id,$data);
                return 'Update Production';
            }
            $data["empid"]=$result->empid;
            $data["group"]=$result->group;
            $data["shift"]=$result->shift;
            $data["name"]=$result->name;
            $data["par008"]=$result->par008;
            $data["par045"]="Process Complete";
            $this->update($result->id,$data);
            return 'Add Production (Process Complete)';
        }

    }

    public function deleteByNumber($number)
    {
        $query = "DELETE FROM `production` WHERE `number` = $number ";
        $result = $this->query($query);
        if($result){
            return "Berhasil";
        }
        else{
            return "Gagal";
        }
    }

    public function testProses($number,$par)
    {
        $query = 'SELECT * FROM production  WHERE `number` = ' . $number . ' AND `par001` = ' . $par;
        $result=$this->query($query);

        return $result->getRow()->id;
    }
}

?>