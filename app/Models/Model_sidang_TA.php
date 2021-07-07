<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_sidang_TA extends Model
{
    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $this->table_sempro1 = $this->db->table('penjadwalan_sidang');
        $this->table_sempro2 = $this->db->table('user');
    }

    // public function get_sidang_ta($id)
    // {
    //     return $this->table_sempro2
    //         ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
    //         ->join('seminar_proposal', 'seminar_proposal.id_jadwal = penjadwalan_sidang.id_jadwal')
    //         ->join('bimbingan_ta', 'bimbingan_ta.id_seminar = seminar_proposal.id_seminar')
    //         ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_bimbingan = bimbingan.id_bimbingan')
    //         ->join('penjadwalan_sidang_ta', 'penjadwalan_sidang_ta.id_jadwal_ta = bimbingan_ta.id_bimbingan_ta')
    //         ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
    //         ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')

    //         ->join('dosen_penguji as dosuji1', 'dosuji1.id_dosenpenguji = penjadwalan_sidang.penguji_1')
    //         ->join('dosen_tugasakhir as doshir1', 'doshir1.id_dosenta = dosuji1.id_dosenta')
    //         ->join('dosen as dos1', 'dos1.id_dosen = doshir1.id_dosen')
    //         //----------------------------------------------------------------------------
    //         ->join('dosen_penguji as dosuji2', 'dosuji2.id_dosenpenguji = penjadwalan_sidang.penguji_2')
    //         ->join('dosen_tugasakhir as doshir2', 'doshir2.id_dosenta = dosuji2.id_dosenta')
    //         ->join('dosen as dos2', 'dos2.id_dosen = doshir2.id_dosen')
    //         ->where('user.id_user', $id)
    //         ->select([
    //             'mahasiswa.nim_mhs',
    //             'mahasiswa.nama_mhs',
    //             'dos1.nama_dosen as dos1_nama',
    //             'dos2.nama_dosen as dos2_nama',

    //         ])
    //         ->get()->getResultArray();
    // }

    public function get_sidang_ta($id)
    {
        // $where = "acara_sidang='seminar proposal'";
        return $this->table_sempro1
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('seminar_proposal', 'seminar_proposal.id_jadwal = penjadwalan_sidang.id_jadwal')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
            ->join('bimbingan_ta', 'bimbingan_ta.id_seminar = seminar_proposal.id_seminar')
            ->join('penjadwalan_sidang_ta', 'penjadwalan_sidang_ta.id_bimbingan_ta = bimbingan_ta.id_bimbingan_ta')
            ->join('sidang_tugasakhir', 'sidang_tugasakhir.id_jadwal_ta = penjadwalan_sidang_ta.id_jadwal_ta')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('user', 'user.id_user = mahasiswa.id_user')
            ->join('dosen_penguji as dosuji1', 'dosuji1.id_dosenpenguji = penjadwalan_sidang.penguji_1')
            ->join('dosen_tugasakhir as doshir1', 'doshir1.id_dosenta = dosuji1.id_dosenta')
            ->join('dosen as dos1', 'dos1.id_dosen = doshir1.id_dosen')
            //----------------------------------------------------------------------------
            ->join('dosen_penguji as dosuji2', 'dosuji2.id_dosenpenguji = penjadwalan_sidang.penguji_2')
            ->join('dosen_tugasakhir as doshir2', 'doshir2.id_dosenta = dosuji2.id_dosenta')
            ->join('dosen as dos2', 'dos2.id_dosen = doshir2.id_dosen')
            ->where('user.id_user', $id)
            ->select([
                'mahasiswa.id_mhs',
                'user.id_user',
                'mahasiswa.nama_mhs',
                'mahasiswa.nim_mhs',
                'bimbingan.id_bimbingan',
                'bimbingan_ta.judul_bimbingan_ta',
                'sidang_tugasakhir.nilai_ta',
                'sidang_tugasakhir.status_ta',
                'sidang_tugasakhir.id_sidangta',
                'seminar_proposal.id_seminar',
                'seminar_proposal.nilai',
                'seminar_proposal.catatan',
                'seminar_proposal.status',
                'penjadwalan_sidang.tanggal_sidang',
                'penjadwalan_sidang.id_jadwal',
                'penjadwalan_sidang_ta.tanggal_sidang_ta',
                'penjadwalan_sidang_ta.tempat_sidang_ta',
                'penjadwalan_sidang_ta.acara_sidang_ta',
                'penjadwalan_sidang.acara_sidang',
                'penjadwalan_sidang.tempat_sidang',
                'bimbingan.berkas_bimbingan',
                'pengajuan_judul.judul',
                'pengajuan_judul.deskripsi',
                'dos1.nama_dosen as dos1_nama',
                'dos2.nama_dosen as dos2_nama',

            ])
            ->get()->getResultArray();
    }


    public function get_pengajuan_sempro2($id)
    {
        // $where = "acara_sidang='seminar proposal'";
        return $this->table_sempro2->select('*')->orderBy('bimbingan.id_bimbingan', 'desc')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('user', 'user.id_user = mahasiswa.id_user')
            ->where('user.id_user', $id)
            ->get()->getResultArray();
    }
    public function insert_bimbingan_ta($data)
    {
        return $this->table_sempro2->insert($data);
    }
}
