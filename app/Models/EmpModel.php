<?php 

namespace App\Models;

use CodeIgniter\Model;

class EmpModel extends Model {

    /**
     * Urutan prioritas koneksi. Tambah/kurangi tier sesuai kebutuhan.
     * 'host' & 'port' dipakai untuk cek reachability cepat (fsockopen).
     * Untuk 'default' (local Laragon) tidak perlu dicek reachability, langsung dianggap tersedia.
     */
    private function getConnectionTiers(): array
    {
        return [
            ['group' => 'second',   'host' => '192.168.132.130', 'port' => 1433, 'check' => true],
            // aktifkan baris di bawah kalau kamu sudah isi konfigurasi 'external' di Database.php
            // ['group' => 'external', 'host' => 'ISI_HOST_EXTERNAL', 'port' => 1433, 'check' => true],
            ['group' => 'default',  'host' => null, 'port' => null, 'check' => false],
        ];
    }

    private function isHostReachable(string $host, int $port, int $timeout = 2): bool
    {
        $conn = @fsockopen($host, $port, $errno, $errstr, $timeout);
        if ($conn) {
            fclose($conn);
            return true;
        }
        return false;
    }

    /**
     * Coba konek sesuai urutan prioritas. Return object $db yang berhasil konek,
     * atau lempar exception kalau semua tier gagal.
     */
    private function getConnection()
    {
        $lastError = null;

        foreach ($this->getConnectionTiers() as $tier) {
            if ($tier['check'] && !$this->isHostReachable($tier['host'], $tier['port'], 2)) {
                log_message('info', "Server '{$tier['group']}' ({$tier['host']}:{$tier['port']}) tidak terjangkau, coba tier berikutnya.");
                continue;
            }

            try {
                $db = \Config\Database::connect($tier['group']);
                $db->initialize(); // paksa konek sekarang juga, bukan lazy
                log_message('info', "Berhasil konek ke tier '{$tier['group']}'.");
                return $db;
            } catch (\Throwable $e) {
                $lastError = $e;
                log_message('warning', "Gagal konek ke tier '{$tier['group']}': " . $e->getMessage());
                continue;
            }
        }

        // semua tier gagal
        throw $lastError ?? new \RuntimeException('Semua koneksi database gagal.');
    }

    public function getEmp($empid)
    {
        $db = $this->getConnection();

        if ($db->DBDriver === 'MySQLi') {
            // ini jalan kalau yang berhasil konek adalah DB local (dev/Laragon)
            $query = "SELECT username AS empid, username AS cardid, name, 'dev_process' AS process, 'dev_device' AS device, 'dev_group' AS groupid, '1' AS acc
            FROM users WHERE username = '$empid'";
        } else {
            // ini jalan kalau yang berhasil konek adalah SQL Server (kantor/external)
            $query = "SELECT tbtcardemp.empid, tbtcardemp.cardid, tbempinfa.firstname + ' ' + tbempinfa.midname + ' ' + tbempinfa.lastname as name, tb_emp_proc.process, tb_emp_proc.device, tbtschemp.groupid, RIGHT(tbarawdata.acc, 1) AS acc
            FROM tbtcardemp
            INNER JOIN tbempinfa ON tbtcardemp.empid = tbempinfa.empid
            INNER JOIN tbarawdata ON tbtcardemp.empid = tbarawdata.empid
            INNER JOIN tb_emp_proc ON tbtcardemp.empid = tb_emp_proc.empid
            INNER JOIN tbtschemp ON tbtcardemp.empid = tbtschemp.empid
            WHERE (tbtcardemp.empid = '$empid' OR tbtcardemp.cardid = '$empid') AND tbempinfa.empstsid <> '3,Not Active' AND tbtcardemp.datetl = '1900-01-01' AND tbtschemp.datetl = '1900-01-01' AND (tbarawdata.datet = CAST( GETDATE() AS Date ))";
        }

        $result = $db->query($query);
        return $result->getRow();
    }

    public function getDataEmp($empid)
    {
        $db = $this->getConnection();

        if ($db->DBDriver === 'MySQLi') {
            $q = "SELECT username AS empid, name, section AS deptid, level AS positionid, state AS empstsid
            FROM users WHERE username = '$empid'";
        } else {
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

        if($empid==$password && $password=='admin'){
            $data = [
                'empid' =>  'admin',
                'name' =>  'admin',
                'positionid' =>  'admin',
                'role' => 'all',
                'state' => 'Admin', 
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

            // deteksi sumber data berdasarkan struktur, bukan getenv, biar konsisten dengan fallback di atas
            if (!isset($q->titleid)) {
                $level = $q->positionid; 
            } else {
                $level = preg_split('/,/', $q->positionid, -1, PREG_SPLIT_NO_EMPTY)[0]; 
            }

            $role = 'bebas';
            if($q->deptid == '017,FRAME LASER 1.8'){
                $role = 'fl';
            }
            else if($q->deptid == '044,SINGLE LASER 5.6'){
                $role = 'sl';
            }

            if($level <= 7){
                $role = 'all';
            }

            $data = [
                'empid' =>  $empid,
                'name' =>  $q->name,
                'positionid' =>  $q->positionid,
                'role' => $role,
                'level' => $level,
                'state' => $q->empstsid, 
                'isadmin' => false
            ];
            return $data;
        }
        else{
            return 'Wrong username or password !!!';
        }
    }
}
?>