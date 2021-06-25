<?php

namespace App\Models;

use CodeIgniter\Model;

class pengajuanModel extends Model
{
    public function get_pengajuan()
    {
        return $this->db->table('pengajuan_judul')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')

            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->get()->getResultArray();
    }
    public function get_pengajuan2()
    {
        return $this->db->table('pengajuan_judul')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->get()->getResultArray();
    }
}
