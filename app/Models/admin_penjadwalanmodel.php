<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_penjadwalanmodel extends Model
{
    protected $table = 'penjadwalan_sidang';
    protected $primaryKey = 'id_jadwal';
    protected $allowedFields = ['tanggal_sidang', 'tempat_sidang', 'penguji_1', 'penguji_2', 'status_penjadwalan_kaprodi'];


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
    public function get_jadwalseminar2($data = false)
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

    public function get_jadwalseminarterjadwal1($data = false)
    {
        if ($data == false) {
            // $where = "acara_sidang='seminar proposal'";
            return $this->db->table('penjadwalan_sidang')
                ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
                ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

                ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
                ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang.penguji_1')
                ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
                ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
                ->where(['status_penjadwalan_kaprodi' => 'sudah terjadwal'])
                ->get()->getResultArray();
        }
        return $this->db->table('penjadwalan_sidang')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang.penguji_1')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->where(['id_jadwal' => $data])
            // ->where($where)
            ->get()->getResultArray();
    }
    public function get_jadwalseminarterjadwal2($data = false)
    {
        if ($data == false) {
            // $where = "acara_sidang='seminar proposal'";
            return $this->db->table('penjadwalan_sidang')
                ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
                ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

                ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
                ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang.penguji_2')
                ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
                ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
                ->where(['status_penjadwalan_kaprodi' => 'sudah terjadwal'])
                ->get()->getResultArray();
        }
        return $this->db->table('penjadwalan_sidang')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang.penguji_2')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->where(['id_jadwal' => $data])
            // ->where($where)
            ->get()->getResultArray();
    }
    // public function get_jadwalseminar()
    // {
    //     // $where = "acara_sidang='seminar proposal'";
    //     return $this->db->table('penjadwalan_sidang')
    //         ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
    //         ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

    //         ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
    //         ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang.penguji_2')
    //         ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
    //         ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
    //         // ->where($where)
    //         ->get()->getResultArray();
    // }


}
