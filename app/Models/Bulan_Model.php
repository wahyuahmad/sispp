<?php

namespace App\Models;

use CodeIgniter\Model;

class Bulan_Model extends Model
{


    protected $table = 'bulan';
    protected $primaryKey = 'id_bulan';
    protected $allowedFields = ['bulan'];
    protected $useAutoIncrement = true;
    
}