<?php

namespace App\Models;

use CodeIgniter\Model;

class dosenModel extends Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'id_dosen';
    protected $allowedFields = ['nidn_dosen', 'nama_dosen', 'jeniskelamin', 'alamat', 'email', 'notelpon', 'status', 'semester'];


    public function get_dosen()
    {
        return $this->db->table('leveling_dosen')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = leveling_dosen.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->get()->getResultArray();
    }

    public function get_pembimbing($data = false)
    {
        if ($data == false) {
            return $this->db->table('dosen_pembimbing')
                ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
                ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
                ->join('data_akademik', 'data_akademik.id_dataakademik = dosen_tugasakhir.id_dataakademik')
                ->get()->getResultArray();
        }

        return $this->db->table('dosen_pembimbing')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->join('data_akademik', 'data_akademik.id_dataakademik = dosen_tugasakhir.id_dataakademik')
            ->where(['id_dosenpembimbing' => $data])
            ->get()->getResultArray();
    }

    public function get_penguji()
    {
        return $this->db->table('dosen_penguji')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->join('data_akademik', 'data_akademik.id_dataakademik = dosen_tugasakhir.id_dataakademik')
            ->get()->getResultArray();
    }

    public function get_dosen_tugasakhir()
    {
        return $this->db->table('dosen_tugasakhir')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->join('data_akademik', 'data_akademik.id_dataakademik = dosen_tugasakhir.id_dataakademik')
            ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenta = dosen_tugasakhir.id_dosenta')
            ->join('dosen_penguji', 'dosen_penguji.id_dosenta = dosen_tugasakhir.id_dosenta')
            ->get()->getResultArray();
    }
}
