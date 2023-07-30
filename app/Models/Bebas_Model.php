<?php

namespace App\Models;

use CodeIgniter\Model;

class Bebas_Model extends Model
{


    protected $table = 'bebas';
    protected $primaryKey = 'id_bebas';
    protected $allowedFields = ['jenis', 'tahun', 'nominal'];
    protected $useAutoIncrement = true;
    protected $returntype = 'array';


    // fungsi edit

    public function getedit($id_bebas)
    {
        return $this->where(['id_bebas' => $id_bebas])->first();
    }
}
