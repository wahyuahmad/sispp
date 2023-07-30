<?php

namespace App\Models;

use CodeIgniter\Model;

class User_Model extends Model
{


    protected $table = 'users';
    protected $useTimestamp = true;
    protected $usesoftdeletes = true;
    protected $allowedFields = ['email', 'username', 'password_hash', 'active'];
    public function get_users()
    {
        $builder = $this->db->table('users');
        $builder->join('auth_groups_users gs', 'users.id=gs.user_id')->join('auth_groups g', 'g.id=gs.group_id');
        $query = $builder->get();
        return $query->getResultArray();
    }



    // fungsi edit

    public function getedit($id_kelas)
    {
        return $this->where(['id_kelas' => $id_kelas])->first();
    }
}
