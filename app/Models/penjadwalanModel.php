<?php

namespace App\Models;

use CodeIgniter\Model;

class penjadwalanModel extends Model
{
    public function get_penjadwalan()
    {
        return $this->db->table('penjadwalan_sidang')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang.penguji_1')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->get()->getResultArray();
    }
    public function get_penjadwalan2()
    {
        return $this->db->table('penjadwalan_sidang')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang.penguji_2')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->get()->getResultArray();
    }
}