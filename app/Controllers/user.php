<?php

namespace App\Controllers;

use App\Models\Home_Model;
use App\Models\User_Model;


class user extends BaseController
{
    public function __construct()
    {
        $this->Home_Model = new Home_Model();
        $this->User_Model = new User_Model();
    }

    public function index()
    {
        $data = ['user' => $this->User_Model->get_users()];
        return view("content/user", $data);
    }

    public function delete($id)
    {
        $User = new User_Model();
        $User->delete($id);
        session()->setFlashdata('pesan', 'dihapus');
        return redirect()->to('/user');
    }
}
