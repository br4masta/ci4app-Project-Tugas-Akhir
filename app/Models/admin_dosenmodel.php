<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_dosenmodel extends Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'id_dosen';
    protected $allowedFields = ['nidn_dosen', 'nama_dosen', 'foto_dosen'];

    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $this->dosen = $this->db->table('dosen');
        $this->user = $this->db->table('user');
        $this->leveling_dosen = $this->db->table('leveling_dosen');
        $this->dosen_tugasakhir = $this->db->table('dosen_tugasakhir');
        $this->data_akademik = $this->db->table('data_akademik');
    }
    public function get_detaildosen()
    {
        return $this->db->table('leveling_dosen')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = leveling_dosen.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->get()->getResultArray();
    }
    public function get_dosen($id = false)
    {
        if ($id == false) {
            return $this->db->table('dosen_tugasakhir')
                ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
                ->join('data_akademik', 'data_akademik.id_dataakademik = dosen_tugasakhir.id_dataakademik')
                ->where(['status' => 'aktif'])

                ->get()->getResultArray();
        }
        return $this->db->table('leveling_dosen')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = leveling_dosen.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            // ->select([
            //     'leveling_dosen.id_dosenta as id_dosenta1',
            // ])
            ->where(['leveling_dosen.id_dosenta' => $id])
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
    //-------------- simpan data ----------------------------------
    public function insert_dosen($data)
    {
    }
    public function insert_user($user)
    {
        return $this->user->insert($user);
    }
    public function insert_dosenta($datadosenta)
    {
        // $this->db->trans_start();
        return $this->dosen_tugasakhir->insert($datadosenta);
    }
    public function insert_hakakses($akses)
    {
        return $this->leveling_dosen->insert($akses);
    }
}
