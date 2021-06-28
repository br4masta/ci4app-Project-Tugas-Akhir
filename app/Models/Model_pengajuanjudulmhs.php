<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_pengajuanjudulmhs extends Model
{
    public function get_pengajuanjudul($id)
    {
        return $this->db->table('pengajuan_judul')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('user', 'user.id_user = mahasiswa.id_user')
            ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->where('user.id_user',$id)
            ->get()->getResultArray();
    }
}
