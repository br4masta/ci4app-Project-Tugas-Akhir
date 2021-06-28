<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_mahasiswa extends Model
{
    public function get_mahasiswa($id)
    {
        return $this->db->table('mahasiswa')
            ->join('user', 'user.id_user = mahasiswa.id_user')
            ->where('mahasiswa.id_user',$id)
            ->get()->getResultArray();
    }
}
