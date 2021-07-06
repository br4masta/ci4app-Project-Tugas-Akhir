<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_bimbinganmhs extends Model
{
    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $this->table_bimbingan1 = $this->db->table('pengajuan_judul');
        $this->table_bimbingan2 = $this->db->table('mahasiswa');
        $this->table_bimbingan3 = $this->db->table('pengajuan_judul');
        $this->table_bimbingan4 = $this->db->table('bimbingan');
    }

    public function get_bimbinganmhs($id)
    {
        return $this->table_bimbingan1
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('user', 'user.id_user = mahasiswa.id_user')
            ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir as doshir1', 'doshir1.id_dosenta = dospem1.id_dosenta')
            ->join('dosen as dos1', 'dos1.id_dosen = doshir1.id_dosen')

            ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir as doshir2', 'doshir2.id_dosenta = dospem2.id_dosenta')
            ->join('dosen as dos2', 'dos2.id_dosen = doshir2.id_dosen')
            ->where('user.id_user', $id)
            ->select([
                'dos1.nama_dosen as dos1_nama',
                'dos2.nama_dosen as dos2_nama',
                'mahasiswa.id_mhs',
                'mahasiswa.nama_mhs',
                'mahasiswa.nim_mhs',
                'pengajuan_judul.id_pengajuan',
                'pengajuan_judul.judul',
                'pengajuan_judul.deskripsi',
                'pengajuan_judul.status_pengajuan',
            ])
            ->get()->getResultArray();
    }
    public function get_detailbimbingan($id)
    {
        return $this->table_bimbingan2
            ->join('pengajuan_judul', 'pengajuan_judul.id_mhs = mahasiswa.id_mhs')
            ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir as doshir1', 'doshir1.id_dosenta = dospem1.id_dosenta')
            ->join('dosen as dos1', 'dos1.id_dosen = doshir1.id_dosen')
            //-----------------------------------------------------------------------------------------------------
            ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir as doshir2', 'doshir2.id_dosenta = dospem2.id_dosenta')
            ->join('dosen as dos2', 'dos2.id_dosen = doshir2.id_dosen')
            ->join('user', 'user.id_user = mahasiswa.id_user')
            ->join('bimbingan', 'bimbingan.id_pengajuan = pengajuan_judul.id_pengajuan')
            ->where('user.id_user', $id)
            ->select([
                'dos1.nama_dosen as dos1_nama',
                'dos2.nama_dosen as dos2_nama',
                'mahasiswa.nama_mhs',
                'mahasiswa.nim_mhs',
                'pengajuan_judul.id_pengajuan',
                'bimbingan.deskripsi_bimbingan as deskripsi',
                'bimbingan.id_bimbingan as id_bimbingan',
                'bimbingan.judul_bimbingan as judul_mhs',
                'bimbingan.catatan_bimbingan as catatan_mhs',
                'bimbingan.status_bimbingan as status_mhs',
                'bimbingan.berkas_bimbingan as berkas_mhs',
                'bimbingan.tanggal_bimbingan as tanggal_mhs',
                'user.id_user',
            ])
            ->get()->getResultArray();
    }
    public function get_idbimbingan($data1)
    {
        return $this->table_bimbingan2
            ->join('pengajuan_judul', 'pengajuan_judul.id_mhs = mahasiswa.id_mhs')
            ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir as doshir1', 'doshir1.id_dosenta = dospem1.id_dosenta')
            ->join('dosen as dos1', 'dos1.id_dosen = doshir1.id_dosen')
            //-----------------------------------------------------------------------------------------------------
            ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir as doshir2', 'doshir2.id_dosenta = dospem2.id_dosenta')
            ->join('dosen as dos2', 'dos2.id_dosen = doshir2.id_dosen')
            ->join('user', 'user.id_user = mahasiswa.id_user')
            ->join('bimbingan', 'bimbingan.id_pengajuan = pengajuan_judul.id_pengajuan')
            ->where('pengajuan_judul.id_pengajuan', $data1)
            ->select([
                'dos1.nama_dosen as dos1_nama',
                'dos2.nama_dosen as dos2_nama',
                'mahasiswa.nama_mhs',
                'mahasiswa.nim_mhs',
                'pengajuan_judul.id_pengajuan',
                'bimbingan.deskripsi_bimbingan as deskripsi',
                'bimbingan.id_bimbingan as id_bimbingan',
                'bimbingan.judul_bimbingan as judul_mhs',
                'bimbingan.catatan_bimbingan as catatan_mhs',
                'bimbingan.status_bimbingan as status_mhs',
                'bimbingan.berkas_bimbingan as berkas_mhs',
                'bimbingan.tanggal_bimbingan as tanggal_mhs',
                'user.id_user',
            ])
            ->get()->getResultArray();
    }

    public function get_recordbimbingan($id)
    {
        return $this->table_bimbingan3
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('user', 'user.id_user = mahasiswa.id_user')
            ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir as doshir1', 'doshir1.id_dosenta = dospem1.id_dosenta')
            ->join('dosen as dos1', 'dos1.id_dosen = doshir1.id_dosen')

            ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir as doshir2', 'doshir2.id_dosenta = dospem2.id_dosenta')
            ->join('dosen as dos2', 'dos2.id_dosen = doshir2.id_dosen')
            ->join('bimbingan', 'bimbingan.id_pengajuan = pengajuan_judul.id_pengajuan')
            ->where('bimbingan.id_pengajuan', $id)
            ->selectCount('bimbingan.id_pengajuan')
            ->get()->getResultArray();
    }

    public function insert_bimbingan($data)
    {
        return $this->table_bimbingan4->insert($data);
    }
}
