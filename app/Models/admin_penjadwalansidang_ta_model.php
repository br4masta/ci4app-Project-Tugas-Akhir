<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_penjadwalansidang_ta_model extends Model
{
    protected $table = 'penjadwalan_sidang_ta';
    protected $primaryKey = 'id_jadwal_ta';
    protected $allowedFields = ['tanggal_sidang_ta', 'tempat_sidang_ta', 'penguji_1', 'penguji_2'];





    public function get_jadwalsidangta1($data = false)
    {
        if ($data == false) { // $where = "acara_sidang='sidang tugas akhir'";
            return $this->db->table('penjadwalan_sidang_ta')
                ->join('bimbingan_ta', 'bimbingan_ta.id_bimbingan_ta = penjadwalan_sidang_ta.id_bimbingan_ta')
                ->join('seminar_proposal', 'seminar_proposal.id_seminar = bimbingan_ta.id_seminar')
                ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_jadwal = seminar_proposal.id_jadwal')
                ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
                ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
                ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
                ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang_ta.penguji_1')
                ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
                ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
                // ->where($where)
                ->get()->getResultArray();
        }
        return $this->db->table('penjadwalan_sidang_ta')
            ->join('bimbingan_ta', 'bimbingan_ta.id_bimbingan_ta = penjadwalan_sidang_ta.id_bimbingan_ta')
            ->join('seminar_proposal', 'seminar_proposal.id_seminar = bimbingan_ta.id_seminar')
            ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_jadwal = seminar_proposal.id_jadwal')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang_ta.penguji_1')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->where(['id_jadwal_ta' => $data])

            ->get()->getResultArray();
    }
    public function get_jadwalsidangta2($data = false)
    {
        if ($data == false) { // $where = "acara_sidang='sidang tugas akhir'";
            return $this->db->table('penjadwalan_sidang_ta')
                ->join('bimbingan_ta', 'bimbingan_ta.id_bimbingan_ta = penjadwalan_sidang_ta.id_bimbingan_ta')
                ->join('seminar_proposal', 'seminar_proposal.id_seminar = bimbingan_ta.id_seminar')
                ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_jadwal = seminar_proposal.id_jadwal')
                ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
                ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
                ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
                ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang_ta.penguji_2')
                ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
                ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
                // ->where($where)
                ->get()->getResultArray();
        }
        return $this->db->table('penjadwalan_sidang_ta')
            ->join('bimbingan_ta', 'bimbingan_ta.id_bimbingan_ta = penjadwalan_sidang_ta.id_bimbingan_ta')
            ->join('seminar_proposal', 'seminar_proposal.id_seminar = bimbingan_ta.id_seminar')
            ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_jadwal = seminar_proposal.id_jadwal')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang_ta.penguji_2')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->where(['id_jadwal_ta' => $data])

            ->get()->getResultArray();
    }
}
