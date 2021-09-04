<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_seminarmodel extends Model
{
    protected $table = 'seminar_proposal';
    protected $primaryKey = 'id_seminar';
    protected $allowedFields = ['id_seminar', 'id_jadwal', 'status'];

    public function get_statuspenjadwalan($id)
    {
        return $this->db->table('penjadwalan_sidang')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang.penguji_2')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->where(['id_jadwal' => $id])

            // ->where($where)
            ->get()->getResultArray();
    }
}
