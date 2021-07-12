<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_dataakademikmodel extends Model
{
    protected $table = 'data_akademik';
    protected $primaryKey = 'id_dataakademik';
    protected $allowedFields = ['tahun_akademik', 'tanggal_mulai', 'tanggal_akhir', 'semester', 'status'];

    public function get_dataakademik()
    {

        return $this->db->table('data_akademik')
            ->where(['status' => 'aktif'])

            ->get()->getResultArray();
    }
}
