<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_profilmodel extends Model
{
    protected $table = 'leveling_dosen';


    public function get_profil()
    {
        $where = "username='admin'";
        return $this->db->table('leveling_dosen')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = leveling_dosen.id_dosenta')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->where($where)
            ->get()->getResultArray();
    }
}
