<?php

namespace App\Models;

use CodeIgniter\Model;

class dosen_pengajuanjudul extends Model
{

    protected $table = 'pengajuan_judul';
    protected $primaryKey = 'id_pengajuan';
    protected $allowedFields = ['konfirmasi_pembimbing_1', 'konfirmasi_pembimbing_2', 'catatan_pembimbing_1', 'catatan_pembimbing_2'];


    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $this->table_pengajuan = $this->db->table('pengajuan_judul');
        $this->table_dosen = $this->db->table('dosen_pembimbing');
        $this->table_mhs = $this->db->table('user')
            ->join('mahasiswa', 'user.id_user = mahasiswa.id_user');
    }
    public function get_pengajuanjudul($id)
    {
        return $this->table_pengajuan
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir as doshir1', 'doshir1.id_dosenta = dospem1.id_dosenta')
            ->join('dosen as dos1', 'dos1.id_dosen = doshir1.id_dosen')

            ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir as doshir2', 'doshir2.id_dosenta = dospem2.id_dosenta')
            ->join('dosen as dos2', 'dos2.id_dosen = doshir2.id_dosen')
            ->where('pengajuan_judul.id_pengajuan', $id)
            ->select([
                'dos1.nama_dosen as dos1_nama',
                'dos2.nama_dosen as dos2_nama',
                'mahasiswa.id_mhs',
                'mahasiswa.nama_mhs',
                'mahasiswa.nim_mhs',
                'mahasiswa.jk_mhs',
                'mahasiswa.tplhr_mhs',
                'mahasiswa.tgllhr_mhs',
                'mahasiswa.handphone',
                'mahasiswa.email_mhs',
                'pengajuan_judul.deskripsi',
                'pengajuan_judul.judul',
                'pengajuan_judul.id_pengajuan',
                'pengajuan_judul.catatan_pembimbing_1',
                'pengajuan_judul.catatan_pembimbing_2',
                'pengajuan_judul.konfirmasi_pembimbing_1',
                'pengajuan_judul.konfirmasi_pembimbing_2',
                'pengajuan_judul.deskripsi_judul',


            ])

            ->get()->getResultArray();
    }

    public function pilih_dosen()
    {
        return $this->table_dosen
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen ')
            ->get()->getResultArray();
    }
    public function pilih_datamhs($id)
    {
        return $this->table_mhs
            ->join('pengajuan_judul', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir as doshir1', 'doshir1.id_dosenta = dospem1.id_dosenta')
            ->join('dosen as dos1', 'dos1.id_dosen = doshir1.id_dosen')

            ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir as doshir2', 'doshir2.id_dosenta = dospem2.id_dosenta')
            ->join('dosen as dos2', 'dos2.id_dosen = doshir2.id_dosen')
            ->where('user.id_user', $id)
            ->get()->getResultArray();
    }
}
