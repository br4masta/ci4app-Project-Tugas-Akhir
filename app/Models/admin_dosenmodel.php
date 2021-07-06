<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_dosenmodel extends Model
{
    // protected $table = 'dosen';
    // protected $primaryKey = 'id_dosen';
    // protected $allowedFields = ['nidn_dosen', 'nama_dosen', 'foto_dosen', 'status', 'semester'];

    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $this->dosen = $this->db->table('dosen');
        $this->user = $this->db->table('user');
        $this->leveling_dosen = $this->db->table('leveling_dosen');
        $this->dosen_tugasakhir = $this->db->table('dosen_tugasakhir');
    }
    public function get_detaildosen()
    {
        return $this->db->table('leveling_dosen')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = leveling_dosen.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->get()->getResultArray();
    }
    public function get_dosen()
    {
        return $this->db->table('dosen')

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

    public function insert_pengajuan()
    {
        return $this->table_pengajuan->insert();
    }
}
