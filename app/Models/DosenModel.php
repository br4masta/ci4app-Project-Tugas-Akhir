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
        $this->table_pengajuan = $this->db->table('pengajuan_judul');
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
    // public function get_pengajuanjuduldsn($id)
    //     {
    //     return $this->table_pengajuan
    //     ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
    //         ->join('user', 'user.id_user = mahasiswa.id_user')
    //         ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
    //         ->join('dosen_tugasakhir as doshir1', 'doshir1.id_dosenta = dospem1.id_dosenta')
    //         ->join('dosen as dos1', 'dos1.id_dosen = doshir1.id_dosen')

    //         ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
    //         ->join('dosen_tugasakhir as doshir2', 'doshir2.id_dosenta = dospem2.id_dosenta')
    //         ->join('dosen as dos2', 'dos2.id_dosen = doshir2.id_dosen')
    //         ->where('user.id_user', $id)
    //         ->get()->getResultArray()

    //     }

        public function get_pengajuanjuduldsn($id)
            {
                return $this->table_pengajuan
              
                ->join('leveling_dosen ', 'leveling_dosen.id_user = user.id_user')
                ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = leveling_dosen.id_dosenta')
                ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
                ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenta = dosen_tugasakhir.id_dosenta')
                ->join('data_akademik', 'data_akademik.id_dataakademik = dosen_tugasakhir.id_dataakademik')
                ->join('mahasiswa', 'mahasiswa.id_dataakademik = data_akademik.id_dataakademik')
                ->join('pengajuan_judul', 'pengajuan_judul.id_mhs = mahasiswa.id_mhs')
                ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
                ->join('dosen_tugasakhir as doshir1', 'doshir1.id_dosenta = dospem1.id_dosenta')
                ->join('dosen as dos1', 'dos1.id_dosen = doshir1.id_dosen')
                ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
                ->join('dosen_tugasakhir as doshir2', 'doshir2.id_dosenta = dospem2.id_dosenta')
                ->join('dosen as dos2', 'dos2.id_dosen = doshir2.id_dosen')
                ->where('dospem1.id_dosenpembimbing', $id)
                ->get()->getResultArray();
            }
}