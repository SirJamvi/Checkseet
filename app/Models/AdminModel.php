<?php 

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model {

	protected $table = 'admin';
    protected $useTimestamps = true;
    protected $allowedFields = ['id','empid'];

    public function getAll()
    {

        $query = "SELECT * FROM `admin`" ;
    
        $data = $this->query($query);
        return $data->getResultArray();
    }

    public function getById($empid)
    {
        // Menggunakan fungsi bawaan CodeIgniter 4
        $data = $this->where('empid', $empid)->first();
        
        if($data){
            return true;
        }
        else{
            return false;
        }
    }

    public function addAdmin($empid)
    {
        $add = $this->insert($empid);

        if ($add) {
            return "Berhasil menambahkan data";
        } else {
            return "Gagal menambahklan data";
        }
    }

    public function deleteAdmin($id)
    {
        $delete = $this->delete($id);

        if($delete){
            return "Berhasil menghapus data";
        }
        else{
            return "Gagal menghapus data";
        }
    }
}

?>