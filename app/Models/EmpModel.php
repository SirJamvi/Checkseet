<?php 

namespace App\Models;

use CodeIgniter\Model;

class EmpModel extends Model {

    public function getEmp($empid)
    {        
        // Cek apakah sedang mode lokal atau server kantor
        if (getenv('CI_ENVIRONMENT') === 'development') {
            $db = \Config\Database::connect('default');
            $query = "SELECT username AS empid, username AS cardid, name, 'dev_process' AS process, 'dev_device' AS device, 'dev_group' AS groupid, '1' AS acc
            FROM users WHERE username = '$empid'";
        } else {
            $db = \Config\Database::connect('second');
            $query = "SELECT tbtcardemp.empid, tbtcardemp.cardid, tbempinfa.firstname + ' ' + tbempinfa.midname + ' ' + tbempinfa.lastname as name, tb_emp_proc.process, tb_emp_proc.device, tbtschemp.groupid, RIGHT(tbarawdata.acc, 1) AS acc
            FROM tbtcardemp
            INNER JOIN tbempinfa ON tbtcardemp.empid = tbempinfa.empid
            INNER JOIN tbarawdata ON tbtcardemp.empid = tbarawdata.empid
            INNER JOIN tb_emp_proc ON tbtcardemp.empid = tb_emp_proc.empid
            INNER JOIN tbtschemp ON tbtcardemp.empid = tbtschemp.empid
            WHERE (tbtcardemp.empid = '$empid' OR tbtcardemp.cardid = '$empid') AND tbempinfa.empstsid <> '3,Not Active' AND tbtcardemp.datetl = '1900-01-01' AND tbtschemp.datetl = '1900-01-01' AND (tbarawdata.datet = CAST( GETDATE() AS Date ))";
        }
        
        $query = $db->query($query);
        return $query->getRow();
    }

    public function getDataEmp($empid)
    {
        if (getenv('CI_ENVIRONMENT') === 'development') {
            $db = \Config\Database::connect('default');
            // Menyesuaikan kolom agar tidak merusak logic lama
            $q = "SELECT username AS empid, name, section AS deptid, level AS positionid, state AS empstsid
            FROM users WHERE username = '$empid'";
        } else {
            $db = \Config\Database::connect('second');
            $q = "SELECT empid, firstname+' '+midname+' '+lastname as name, deptid, positionid, titleid, empstsid
            FROM tbempinfa
            WHERE empstsid <> '3,Not Active' AND empid = '$empid'";
        }

        $data = $db->query($q);
        return $data->getRow();
    }

    public function login($empid, $password)
    {
        $session = \Config\Services::session();
        $session->start();

        // admin
        if($empid==$password && $password=='admin'){
            $data = [
                'empid' =>  'admin',
                'name' =>  'admin',
                'positionid' =>  'admin',
                'role' => 'all',
                'state' => 'Admin', // Penambahan state untuk pengkondisian Navbar
                'isadmin' => true
            ];
            $session->sess_expiration = '3600';
            $session->set($data); 
            return $data;
        }

        if($password==$empid){
            $q = $this->getDataEmp($empid);
            
            if(!$q){
                return 'User Tidak Ditemukan !!!';
            }

            // PERTAHANKAN LOGIC LAMA DENGAN PENYESUAIAN ENVIRONMENT
            if (getenv('CI_ENVIRONMENT') === 'development') {
                $level = $q->positionid; // Data dummy murni angka
            } else {
                $level = preg_split('/,/', $q->positionid, -1, PREG_SPLIT_NO_EMPTY)[0]; // Split text dari database asli
            }

            $role = 'bebas';
            if($q->deptid == '017,FRAME LASER 1.8'){
                $role = 'fl';
            }
            else if($q->deptid == '044,SINGLE LASER 5.6'){
                $role = 'sl';
            }

            // Jika role diatas Assisten Supervisor bisa mengakses semua device
            if($level <= 7){
                $role = 'all';
            }

            if($q){
                $data = [
                    'empid' =>  $empid,
                    'name' =>  $q->name,
                    'positionid' =>  $q->positionid,
                    'role' => $role,
                    'level' => $level,
                    'state' => $q->empstsid, // Kirim status (Approver/Originator) ke session agar dibaca oleh Navbar
                    'isadmin' => false
                ];
                return $data;
            }
        }
        else{
            return 'Wrong username or password !!!';
        }
    }
}
?>