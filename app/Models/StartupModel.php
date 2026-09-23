<?php

namespace App\Models;

use CodeIgniter\Model;

class StartupModel extends Model
{

    protected $table = 'startup';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'number',
        'idcsheet',
        'device',
        'process',
        'lotno',
        'model',
        'machno',
        'empid',
        'group',
        'shift',
        'par000',
        'par001',
        'par002',
        'par003',
        'par004',
        'par005',
        'par006',
        'par007',
        'par008',
        'par009',
        'par010',
        'par011',
        'par012',
        'par013',
        'par014',
        'par015',
        'par016',
        'par017',
        'par018',
        'par019',
        'par020',
        'par021',
        'par022',
        'par023',
        'par024',
        'par025',
        'par026',
        'par027',
        'par028',
        'par029',
        'par030',
        'par031',
        'par032',
        'par033',
        'par034',
        'par035',
        'par036',
        'par037',
        'par038',
        'par039',
        'par040',
        'par041',
        'par042',
        'par043',
        'par044',
        'status',
        'role',
        'foreman',
        'leader',
        'supervisor',
        'name'
    ];

    public function getCsheet($slug = false)
    {
        if ($slug == false) {
            return $this->findall();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function getAllData()
    {
        $query = "SELECT DISTINCT s.id,`number`, s.created_at, `process`,d.name as device_name, `machno`, `model`, `lotno`, `empid`, `shift`, `group` ,`status`,`role`, `foreman` , `leader` , `supervisor`, p.name
        FROM `startup` as s
        INNER JOIN `proses` as p ON s.process=p.process_code 
        INNER JOIN `device` as d ON p.device=d.code
        WHERE `par000`='1'";
        $data = $this->query($query);
        return $data->getResultArray();
    }

    // update approval 
    public function updateApproval($number, $name, $level)
    {
        // Get Data by Id
        $query = "SELECT * FROM `startup` WHERE `number`=$number";
        $data = $this->query($query)->getResultArray();
        $query = "";

        // Level Foreman
        if ($level == 14) {

            $status = "Approve by Foreman";
            $role = "foreman";

            $query =
                "UPDATE `startup` SET " .
                "`status` = '" . $status . "' , " .
                "`role` = '" . $role . "' , " .
                "`foreman` = '" . $name . "' " .
                "WHERE `number` = '" . $number . "'";
        }
        //Level Leader
        else if ($level == 10) {
            $role = "leader";

            if (!$data[0]['foreman'] != null) {
                $status = "Bypass Leader";
                $query =
                    "UPDATE `startup` SET " .
                    "`status` = '" . $status . "' , " .
                    "`role` = '" . $role . "' , " .
                    "`foreman` = '" . $name . "' , " .
                    "`leader` = '" . $name . "' " .
                    "WHERE `number` = '" . $number . "'";
            } else {
                $status = "Approve Leader";
                $query =
                    "UPDATE `startup` SET " .
                    "`status` = '" . $status . "' , " .
                    "`role` = '" . $role . "' , " .
                    "`leader` = '" . $name . "' " .
                    "WHERE `number` = '" . $number . " ' ";
            }
        }
        //Level diatas assisten supervisor
        else if ($level <= 7) {
            $role = "supervisor";

            if ($data[0]['leader'] != null) {
                $status = "Approve Supervisor";
                $query =
                    "UPDATE `startup` SET " .
                    "`status` = '" . $status . "' , " .
                    "`role` = '" . $role . "' , " .
                    "`supervisor` = '" . $name . "' " .
                    "WHERE `number` = '" . $number . "'";
            } else if ($data[0]['foreman'] != null) {
                $status = "Bypass Supervisor";
                $query =
                    "UPDATE `startup` SET " .
                    "`status` = '" . $status . "' , " .
                    "`role` = '" . $role . "' , " .
                    "`leader` = '" . $name . "' , " .
                    "`supervisor` = '" . $name . "' " .
                    "WHERE `number` = '" . $number . "'";
            } else {
                $status = "Bypass Supervisor";
                $query =
                    "UPDATE `startup` SET " .
                    "`status` = '" . $status . "' , " .
                    "`role` = '" . $role . "' , " .
                    "`foreman` = '" . $name . "' , " .
                    "`leader` = '" . $name . "' , " .
                    "`supervisor` = '" . $name . "' " .
                    "WHERE `number` = '" . $number . "'";
            }
        }


        return $this->query($query);
    }
    public function addProses($data)
    {
        // --- TAMBAHAN BARU: SNAPSHOT REVISI & BERLAKU ---
        $db = \Config\Database::connect();$prosesMaster = $db->table('proses')->where('process_code',$data['process'])->get()->getRowArray();
        
        if ($prosesMaster) {
            $data['par041'] =$prosesMaster['revisi'];
            $data['par042'] =$prosesMaster['berlaku'];
        }
        // ------------------------------------------------

        $query = 'SELECT * FROM startup  WHERE `number` = ' . $data["number"] . ' AND `par000` = ' . $data["par000"];
        $result = $this->query($query)->getRow();

        if ($result == null) {
            $this->insert($data);
            return "Add Startup";
        } else {
            $this->update($result->id, $data);
            return "Update Startup";
        }
    }
    public function getLatestId()
    {
        $query = "SELECT `number` FROM startup ORDER BY `number` DESC LIMIT 1 ";
        $result = $this->query($query);
        if ($result == null) {
            return 0;
        }
        return $result->getRow()->number ?? 0;
    }
   public function getAll($dateStart='1970-1-1',$dateEnd='2070-1-1',$device='',$process='',$model='',$lotno='',$machno='')
    {
        // Gunakan Query Dinamis: Filter hanya dipasang JIKA ada isinya
        $sql = "SELECT DISTINCT *
                FROM `startup` as s
                INNER JOIN (SELECT device, type, process_code, name as process_name, docno FROM proses ) as p ON s.process=p.process_code 
                INNER JOIN (SELECT code, name as device_name FROM device ) as d ON p.device=d.code
                WHERE s.created_at >= '$dateStart' 
                AND s.created_at <= '$dateEnd' 
                AND s.device LIKE '%$device%' 
                AND s.process LIKE '%$process%'";

        if ($model !== '') {$sql .= " AND s.model LIKE '%$model%'";
        }
        
        if ($lotno !== '') {$sql .= " AND s.lotno LIKE '%$lotno%'";
        }
        
        // Perbaikan: abaikan jika kosong ATAU bernilai "ALL"
        if ($machno !== '' && $machno !== 'ALL') {
            $sql .= " AND s.machno = '$machno'"; 
        }

        $sql .= " ORDER BY s.id";
        
        $data = $this->query($sql);
        return $data->getResultArray();
    }

    public function deleteByNumber($number)
    {
        $query = "DELETE FROM `startup` WHERE `number` = $number ";
        $result = $this->query($query);
        if ($result) {
            return "Berhasil";
        } else {
            return "Gagal";
        }
    }

    public function getApprovalData($dateStart = '1970-1-1', $dateEnd = '2070-1-1', $device = '', $process = '')
    {
        $query = "SELECT DISTINCT *
        FROM `startup` as s
        INNER JOIN (SELECT device, type, process_code, name as process_name, docno FROM proses ) as p ON s.process=p.process_code 
        INNER JOIN (SELECT code, name as device_name FROM device ) as d ON p.device=d.code
        WHERE 
        s.created_at >= '$dateStart' AND 
        s.created_at <= '$dateEnd' AND
        s.device LIKE '%$device%' AND
        `process` LIKE '%$process%' AND
        s.par000 = 1
        ORDER BY created_at DESC";

        $data = $this->query($query);
        return $data->getResultArray();
    }

    public function getByNumber($number)
    {
        $query = "SELECT *
        FROM startup as s
        INNER JOIN (SELECT device, type, process_code, name as process_name, docno FROM proses ) as p ON s.process=p.process_code
        WHERE 
        `number` = $number 
        ORDER BY `par000`";
        $data = $this->query($query);
        return $data->getResultArray();
    }
}
