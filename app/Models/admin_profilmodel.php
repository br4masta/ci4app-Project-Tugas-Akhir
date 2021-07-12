<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_profilmodel extends Model
{
    protected $table = 'leveling_dosen';
    protected $primaryKey = 'id_level';

    public function get_profil($id = false)
    {
        if ($id == false) {
            return $this->db->table('leveling_dosen')
                // $where = "username='admin'";
                ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = leveling_dosen.id_dosenta')
                ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
                ->join('user', 'user.id_user = leveling_dosen.id_user')
                // ->where($where)
                ->get()->getResultArray();
        }
        return $this->db->table('leveling_dosen')

            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = leveling_dosen.id_dosenta')
            ->join('data_akademik', 'data_akademik.id_dataakademik = dosen_tugasakhir.id_dataakademik')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            ->where('user.id_user', $id)
            ->get()->getResultArray();
    }
    public function get_jadwalseminar1($data = false)
    {
        if ($data == false) {
            // $where = "acara_sidang='seminar proposal'";
            return $this->db->table('penjadwalan_sidang')
                ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
                ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

                ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
                // --------------tidak memerlukan dosen penguji-------
                // --------------karena penguji =null(belum di inputkan oleh kaprodi)-------
                ->where(['status_penjadwalan_kaprodi' => 'belum terjadwal'])
                ->get()->getResultArray();
        }
        return $this->db->table('penjadwalan_sidang')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            // --------------tidak memerlukan dosen penguji-------
            // --------------karena penguji =null(belum di inputkan oleh kaprodi)-------
            ->where(['id_jadwal' => $data])
            // ->where($where)
            ->get()->getResultArray();
    }
}
