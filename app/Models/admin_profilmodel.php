<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_profilmodel extends Model
{
    protected $table = 'leveling_dosen';
<<<<<<< HEAD
    protected $primaryKey = 'id_level';
=======

>>>>>>> 3adf5c0a6001d2b452dcd80227518304077ca312

    public function get_profil()
    {
        $where = "username='admin'";
        return $this->db->table('leveling_dosen')
<<<<<<< HEAD

            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = leveling_dosen.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
=======
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = leveling_dosen.id_dosenta')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
>>>>>>> 3adf5c0a6001d2b452dcd80227518304077ca312
            ->where($where)
            ->get()->getResultArray();
    }
}
