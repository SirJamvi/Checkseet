<?php 

namespace App\Models;

use CodeIgniter\Model;

class EmpModel extends Model {

    public function getEmp($empid)
    {        
        $db = \Config\Database::connect('second');
        $query = "SELECT tbtcardemp.empid, tbtcardemp.cardid, tbempinfa.firstname + ' ' + tbempinfa.midname + ' ' + tbempinfa.lastname as name, tb_emp_proc.process, tb_emp_proc.device, tbtschemp.groupid, RIGHT(tbarawdata.acc, 1) AS acc
        FROM tbtcardemp
        INNER JOIN tbempinfa ON tbtcardemp.empid = tbempinfa.empid
        INNER JOIN tbarawdata ON tbtcardemp.empid = tbarawdata.empid
        INNER JOIN tb_emp_proc ON tbtcardemp.empid = tb_emp_proc.empid
        INNER JOIN tbtschemp ON tbtcardemp.empid = tbtschemp.empid
        WHERE (tbtcardemp.empid = '$empid' OR tbtcardemp.cardid = '$empid') AND tbempinfa.empstsid <> '3,Not Active' AND tbtcardemp.datetl = '1900-01-01' AND tbtschemp.datetl = '1900-01-01' AND (tbarawdata.datet = CAST( GETDATE() AS Date )) 
        ";
        // return $this->db->query($query)->row_array();
        // $query = $this->db->query($query);
        $query = $db->query($query);
        // return $query->getResultArray();
        return $query->getRow();
        // $num = $query->getNumRows();
        // if($num > 0)
        // {
        //     //Mengirimkan data array hasil query
        //     return $this->findall();
        //     //Function result() hampir sama dengan function mysql_fetch_array()
        // }
        // else
        // {
        //     return 0;
        //     //Kirimkan 0 jika tidak ada datanya
        // }
        // // return $query->row_array();
    }

    public function getDataEmp($empid)
    {
        $db = \Config\Database::connect('second');
        $q = 
        "SELECT empid, firstname+' '+midname+' '+lastname as name, deptid, positionid, titleid, empstsid
        FROM tbempinfa
        WHERE empstsid <> '3,Not Active' AND empid = '$empid'";
        $data = $db->query($q);
        return $data->getRow();
    }

    public function login($empid, $password)
    {
        $session = \Config\Services::session();
        $session->start();

        // 1. Validasi Super Admin Lokal
        if($empid == $password && $password == 'admin'){
            $data = [
                'empid' =>  'admin',
                'name' =>  'admin',
                'positionid' =>  'admin',
                'role' => 'all',
                'isadmin' => true
            ];
            return $data;
        }

        // 2. Validasi Karyawan Biasa
        if($password == $empid){
            $q = $this->getDataEmp($empid);
            
            // PERBAIKAN 1: Cek dulu apakah $q ada datanya SEBELUM membaca isinya!
            if(!$q){
                return false; // Kembalikan nilai boolean FALSE, BUKAN string!
            }

            // PERBAIKAN 2: Paksa (int) agar teks huruf diubah ke angka, lalu hindari angka 0
            $level_string = preg_split('/,/', $q->positionid, -1, PREG_SPLIT_NO_EMPTY)[0];
            $level = (int)$level_string;

            $role = 'bebas';
            if($q->deptid == '017,FRAME LASER 1.8'){
                $role = 'fl';
            }
            else if($q->deptid == '044,SINGLE LASER 5.6'){
                $role = 'sl';
            }
            
            // Syarat mutlak: Level harus di antara 1 sampai 7 (bukan 0)
            if($level > 0 && $level <= 7){
                $role = 'all';
            }

            $data = [
                'empid' =>  $empid,
                'name' =>  $q->name,
                'positionid' =>  $q->positionid,
                'role' => $role,
                'level' => $level,
                'isadmin' => false
            ];
            
            return $data;
        }
        else{
            // PERBAIKAN 3: Jika password salah, kembalikan FALSE agar ditolak oleh Controller
            return false; 
        }
    }

    // public function login($empid,$password){

    // }

    public function testing()
    {
        $db = \Config\Database::connect('second');
        
        // Memfilter departemen DAN memastikan statusnya bukan '3,Not Active'
        $query = "SELECT empid, firstname, lastname, deptid, positionid, empstsid 
                  FROM tbempinfa 
                  WHERE (deptid LIKE '%FRAME LASER 1.8%' OR deptid LIKE '%SINGLE LASER 5.6%')
                    AND empstsid <> '3,Not Active'";
        
        $query = $db->query($query);
        return $query->getResultArray();
    }

    // public function getEmp($cardemp)
    // {        
    //     $query = "SELECT tbtcardemp.*, tbempinfa.firstname, tbempinfa.midname, tbempinfa.lastname, tb_emp_proc.process, tb_emp_proc.device, tbtschemp.groupid
    //             FROM tbtcardemp
    //             INNER JOIN tbempinfa ON tbtcardemp.empid = tbempinfa.empid
    //             INNER JOIN tb_emp_proc ON tbtcardemp.empid = tb_emp_proc.empid
    //             INNER JOIN tbtschemp ON tbtcardemp.empid = tbtschemp.empid
    //             WHERE tbtcardemp.cardid = '$cardid' AND tbempinfa.empstsid <> '3,Not Active' AND tbtcardemp.datetl = '1900-01-01' AND tb_emp_proc.date_end IS NULL AND tbtschemp.datetl = '1900-01-01'
    //             ";
    //     // return $this->db->query($query)->row_array();
    //     $query = $this->db->query($query);
    //     $num = $query->num_rows();
    //     if($num > 0){
    //         //Mengirimkan data array hasil query
    //         return $query->row_array();
    //         //Function result() hampir sama dengan function mysql_fetch_array()
    //     }else{
    //         return 0;
    //         //Kirimkan 0 jika tidak ada datanya
    //     }
    //     // return $query->row_array();
    // }
}