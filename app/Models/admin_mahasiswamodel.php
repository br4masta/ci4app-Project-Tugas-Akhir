<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_mahasiswamodel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mhs';
    protected $allowedFields = ['nama_mhs', 'nim_mhs', 'jk_mhs', 'id_user', 'id_dataakademik'];


    public function get_mahasiswa()
    {
        return $this->db->table('mahasiswa')

            // ->join('user', 'user.id_user = mahasiswa.id_user')
            ->join('data_akademik', 'data_akademik.id_dataakademik = mahasiswa.id_dataakademik')
            ->where(['status' => 'aktif'])
            ->get()->getResultArray();
    }
    public function get_detailmhs($id = false)
    {
        if ($id == false) {
            # code...

            return $this->db->table('mahasiswa')

                ->join('user', 'user.id_user = mahasiswa.id_user')
                ->join('data_akademik', 'data_akademik.id_dataakademik = mahasiswa.id_dataakademik')
                ->where(['status' => 'aktif'])
                ->get()->getResultArray();
        }
        return $this->db->table('mahasiswa')

            ->join('user', 'user.id_user = mahasiswa.id_user')
            ->join('data_akademik', 'data_akademik.id_dataakademik = mahasiswa.id_dataakademik')
            ->where(['status' => 'aktif'])
            ->where(['id_mhs' => $id])

            ->get()->getResultArray();
    }
}
