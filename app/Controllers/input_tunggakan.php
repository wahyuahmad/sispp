<?php

namespace App\Controllers;

use App\Models\Tunggakan_Model;
use App\Models\Siswa_Model;

class input_tunggakan extends BaseController
{
    protected $Tunggakan_Model;
    public function __construct()
    {
        $this->Tunggakan_Model = new Tunggakan_Model();
        $this->Siswa_Model = new Siswa_Model();
    }
    public function index()
    {
        $model = new Siswa_Model();
        $data = $model->findAll();
        return view('form/input_tunggakan', [
            'spp' => $data
        ]);
    }
    
  
}
