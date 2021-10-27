<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_pengajuansempro extends Model
{
    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $this->table_bimbingan1 = $this->db->table('pengajuan_judul');
        $this->table_sempro1 = $this->db->table('penjadwalan_sidang');
        $this->table_sempro2 = $this->db->table('bimbingan');
    }
    public function get_pengajuan_sempro($id)
    {
        return $this->table_sempro1
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('user', 'user.id_user = mahasiswa.id_user')
            ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir as doshir1', 'doshir1.id_dosenta = dospem1.id_dosenta')
            ->join('dosen as dos1', 'dos1.id_dosen = doshir1.id_dosen')

            ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir as doshir2', 'doshir2.id_dosenta = dospem2.id_dosenta')
            ->join('dosen as dos2', 'dos2.id_dosen = doshir2.id_dosen')
            
            ->join('dosen_penguji as dosuji1', 'dosuji1.id_dosenpenguji = penjadwalan_sidang.penguji_1')
            ->join('dosen_tugasakhir as doshir3', 'doshir3.id_dosenta = dosuji1.id_dosenta')
            ->join('dosen as dos3', 'dos3.id_dosen = doshir3.id_dosen')
            //----------------------------------------------------------------------------
            ->join('dosen_penguji as dosuji2', 'dosuji2.id_dosenpenguji = penjadwalan_sidang.penguji_2')
            ->join('dosen_tugasakhir as doshir4', 'doshir4.id_dosenta = dosuji2.id_dosenta')
            ->join('dosen as dos4', 'dos4.id_dosen = doshir4.id_dosen')

            ->where('user.id_user', $id)
            ->select([
                'mahasiswa.id_mhs',
                'user.id_user',
                'mahasiswa.nama_mhs',
                'mahasiswa.nim_mhs',
                'bimbingan.id_bimbingan',
                'penjadwalan_sidang.tanggal_sidang',
                'penjadwalan_sidang.id_jadwal',
                'penjadwalan_sidang.acara_sidang',
                'penjadwalan_sidang.tempat_sidang',
                'bimbingan.berkas_bimbingan',
                'pengajuan_judul.judul',
                'pengajuan_judul.deskripsi',
                'dos1.nama_dosen as dos1_nama',
                'dos2.nama_dosen as dos2_nama',
                'dos3.nama_dosen as dos3_nama',
                'dos4.nama_dosen as dos4_nama',
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
    public function insert_pengajuan_sempro($data)
    {
        return $this->table_sempro1->insert($data);
    }
}
