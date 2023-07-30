<?php

namespace App\Controllers\Api;


use App\Models\Spp_Model;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class input_tunggakan extends ResourceController
{
    use ResponseTrait;
    public function show($id = null)
    {
        $model = new Spp_Model();
        $data = $model->find($id);
        return $this->respond($data);
    }
}
