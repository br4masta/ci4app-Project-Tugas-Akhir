<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_dosentamodel extends Model
{
    protected $table = 'dosen_tugasakhir';
    protected $primaryKey = 'id_dosenta';
    protected $allowedFields = ['id_dosen', 'id_dataakademik'];


    public function get_dosentapembimbing()
    {
        return $this->db->table('dosen_tugasakhir')
            ->join('leveling_dosen', 'leveling_dosen.id_dosenta = dosen_tugasakhir.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            ->join('data_akademik', 'data_akademik.id_dataakademik = dosen_tugasakhir.id_dataakademik')
            ->where(['level' => '2'])
            ->get()->getResultArray();
    }
    public function get_dosentapenguji()
    {
        return $this->db->table('dosen_tugasakhir')
            ->join('leveling_dosen', 'leveling_dosen.id_dosenta = dosen_tugasakhir.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            ->join('data_akademik', 'data_akademik.id_dataakademik = dosen_tugasakhir.id_dataakademik')
            ->where(['level' => '4'])
            ->get()->getResultArray();
    }
}
