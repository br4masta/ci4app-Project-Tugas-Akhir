<?php

namespace App\Models;

use CodeIgniter\Model;

class dosen_pembimbingmodel extends Model
{

    protected $table = 'dosen_pembimbing';
    protected $primaryKey = 'id_dosenpembimbing';


    public function get_status_pembimbing($data)
    {

        return $this->db->table('dosen_pembimbing')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
            ->join('leveling_dosen', 'leveling_dosen.id_dosenta = dosen_tugasakhir.id_dosenta')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')

            ->where(['user.id_user' => $data])
            ->get()->getResultArray();
    }
}
