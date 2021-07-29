<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_mahasiswamodel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mhs';
    protected $allowedFields = ['nim_mhs', 'nama_mhs'];


    public function get_mahasiswa()
    {
        return $this->db->table('mahasiswa')

            // ->join('user', 'user.id_user = mahasiswa.id_user')
            ->join('data_akademik', 'data_akademik.id_dataakademik = mahasiswa.id_dataakademik')
            ->where(['status' => 'aktif'])
            ->get()->getResultArray();
    }
}
