<?php

namespace App\Models;

use CodeIgniter\Model;

class dosenModel extends Model
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
        $this->table_datadosenta = $this->db->table('user');
        $this->table_pengajuan = $this->db->table('pengajuan_judul')
            ->join('dosen_pembimbing','dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1');
    }
    public function get_profil_datadosenta($id)
    {
        return  $this->table_datadosenta
            ->join('leveling_dosen ', 'leveling_dosen.id_user = user.id_user')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = leveling_dosen.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenta = dosen_tugasakhir.id_dosenta')
            ->join('data_akademik', 'data_akademik.id_dataakademik = dosen_tugasakhir.id_dataakademik')
            ->where('user.id_user', $id)
            ->get()->getResultArray();
            
    }
    public function get_pengajuanjuduldsn($id)
        {
        return $this->table_pengajuan
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir as doshir1', 'doshir1.id_dosenta = dospem1.id_dosenta')
            ->join('dosen as dos1', 'dos1.id_dosen = doshir1.id_dosen')
            ->join('leveling_dosen', 'leveling_dosen.id_dosenta = doshir1.id_dosenta')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir as doshir2', 'doshir2.id_dosenta = dospem2.id_dosenta')
            ->join('dosen as dos2', 'dos2.id_dosen = doshir2.id_dosen')
            ->join('leveling_dosen as lvl2', 'lvl2.id_dosenta = doshir2.id_dosenta')
            ->join('user as hole', 'hole.id_user = lvl2.id_user')
            ->where('hole.id_user', $id)
           // ->where('user.id_user', $id)
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
                'pengajuan_judul.judul',
                'user.id_user'
            ])
            ->get()->getResultArray();

        }

}