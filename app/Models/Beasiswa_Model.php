<?php

namespace App\Models;

use CodeIgniter\Model;

class Beasiswa_Model extends Model
{


    protected $table = 'beasiswa';
    protected $primaryKey = 'id_beasiswa';
    protected $allowedFields = ['jenis', 'tahun',];
    protected $useAutoIncrement = true;
    protected $returntype = 'array';


    // fungsi edit

    public function getedit($id_beasiswa)
    {
        return $this->where(['id_beasiswa' => $id_beasiswa])->first();
    }
}
