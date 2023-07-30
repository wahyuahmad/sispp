<?php

namespace App\Models;

use CodeIgniter\Model;

class Spp_Model extends Model
{


    protected $table = 'spp';
    protected $primaryKey = 'id_spp';
    protected $allowedFields = ['tahun', 'nominal'];
    protected $useAutoIncrement = true;
    protected $returntype = 'array';


    // fungsi edit

    public function getedit($id_spp)
    {
        return $this->where(['id_spp' => $id_spp])->first();
    }
}
