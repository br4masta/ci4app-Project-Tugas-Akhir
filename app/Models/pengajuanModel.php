<?php

namespace App\Models;

use CodeIgniter\Model;

class pengajuanModel extends Model
{
    public function get_pengajuan()
    {
        return $this->db->table('pengajuan_judul')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->get()->getResultArray();
    }
}
