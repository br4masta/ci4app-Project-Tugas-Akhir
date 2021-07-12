<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_dosenpembimbingmodel extends Model
{
    protected $table = 'dosen_pembimbing';
    protected $primaryKey = 'id_dosenpembimbing';
    protected $allowedFields = ['id_dosenta', 'role_pembimbing'];

    public function get_pembimbing()
    {
        return $this->db->table('dosen_pembimbing')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->join('data_akademik', 'data_akademik.id_dataakademik = dosen_tugasakhir.id_dataakademik')
            ->where(['status' => 'aktif'])
            ->get()->getResultArray();
    }
}
