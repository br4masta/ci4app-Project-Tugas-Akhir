<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_levelingmodel extends Model
{
    protected $table = 'leveling_dosen';
    protected $primaryKey = 'id_level';
    protected $allowedFields = ['id_user', 'id_dosenta'];


    public function get_deletedosen($id)
    {
        return $this->db->table('leveling_dosen')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = leveling_dosen.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->where(['id_level' => $id])
            ->select([
                'user.id_user',


            ])
            ->get()->getResultArray();
    }
}
