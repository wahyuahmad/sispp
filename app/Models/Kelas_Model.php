<?php

namespace App\Models;

use CodeIgniter\Model;

class Kelas_Model extends Model
{


    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $allowedFields = ['kelas', 'jurusan'];
    protected $useAutoIncrement = true;
    protected $returntype = 'array';



  
    // fungsi edit

    public function getedit($id_kelas)
    {
        return $this->where(['id_kelas' => $id_kelas])->first();
    }
}
