<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_mahasiswa extends Model
{
    protected $table;

    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $this->table_datadosenmhs = $this->db->table('user')
            ->join('mahasiswa', 'user.id_user = mahasiswa.id_user');
        $this->table_mhs = $this->db->table('mahasiswa')
            ->join('user', 'mahasiswa.id_user = user.id_user');
        $this->table_mhs2 = $this->db->table('mahasiswa');
    }
    public function get_profil_datadosenMhs($id)
    {
        return $this->table_datadosenmhs
            ->join('pengajuan_judul', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir as doshir1', 'doshir1.id_dosenta = dospem1.id_dosenta')
            ->join('dosen as dos1', 'dos1.id_dosen = doshir1.id_dosen')
            //------------------------------------------------------------------------------------------------------------
            ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir as doshir2', 'doshir2.id_dosenta = dospem2.id_dosenta')
            ->join('dosen as dos2', 'dos2.id_dosen = doshir2.id_dosen')
            ->where('user.id_user', $id)
            ->select([
                'dos1.nama_dosen as dos1_nama',
                'dos2.nama_dosen as dos2_nama',
                'mahasiswa.nama_mhs',
                'mahasiswa.nim_mhs',
            ])
            ->get()->getResultArray();
    }
    public function get_profil_dataMhs($id)
    {
        return $this->table_mhs
            ->where('user.id_user', $id)
            ->select([
                'mahasiswa.nama_mhs',
                'mahasiswa.nim_mhs',
                'mahasiswa.jk_mhs',
                'mahasiswa.tplhr_mhs',
                'mahasiswa.tgllhr_mhs',
                'mahasiswa.handphone',
                'mahasiswa.email_mhs',
                'mahasiswa.id_mhs',
                'mahasiswa.program_studi_mhs',
                'mahasiswa.fakultas_mhs'
            ])
            ->get()->getResultArray();
    }
}
