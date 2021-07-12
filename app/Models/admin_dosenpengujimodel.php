<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_dosenpengujimodel extends Model
{
    protected $table = 'dosen_penguji';
    protected $primaryKey = 'id_dosenpenguji';
    protected $allowedFields = ['id_dosenta', 'role_penguji'];

    public function get_penguji()
    {
        return $this->db->table('dosen_penguji')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->join('data_akademik', 'data_akademik.id_dataakademik = dosen_tugasakhir.id_dataakademik')
            ->where(['status' => 'aktif'])
            ->get()->getResultArray();
    }
}
