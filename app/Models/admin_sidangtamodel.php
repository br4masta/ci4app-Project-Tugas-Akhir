<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_sidangtamodel extends Model
{
    protected $table = 'sidang_tugasakhir';
    protected $primaryKey = 'id_sidangta';
    protected $allowedFields = ['id_sidangta', 'id_jadwal_ta', 'status_ta'];

    public function get_statuspenjadwalanta($id)
    {
        return $this->db->table('penjadwalan_sidang_ta')
            ->join('bimbingan_ta', 'bimbingan_ta.id_bimbingan_ta = penjadwalan_sidang_ta.id_bimbingan_ta')
            ->join('seminar_proposal', 'seminar_proposal.id_seminar = bimbingan_ta.id_seminar')
            ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_jadwal = seminar_proposal.id_jadwal')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')

            // =======penguji1======
            ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang_ta.penguji_1')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->where(['id_jadwal_ta' => $id])

            ->get()->getResultArray();
    }
}
