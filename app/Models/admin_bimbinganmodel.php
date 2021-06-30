<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_bimbinganmodel extends Model
{
    protected $table = 'pengajuan_judul';
    protected $primaryKey = 'id_pengajuan';

    public function get_bimbingan_pembimbing1($data = false)
    {
        if ($data == false) {
            return $this->db->table('pengajuan_judul')

                ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
                ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
                ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
                ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')

                ->get()->getResultArray();
        }
        return $this->db->table('pengajuan_judul')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->where(['dosenpembimbing1' => $data])
            ->get()->getResultArray();
    }
    public function get_bimbingan_pembimbing2($data = false)
    {
        if ($data == false) {
            return $this->db->table('pengajuan_judul')

                ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
                ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
                ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
                ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')

                ->get()->getResultArray();
        }
        return $this->db->table('pengajuan_judul')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->where(['dosenpembimbing2' => $data])
            ->get()->getResultArray();
    }
}
