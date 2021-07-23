<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenpengujiModel extends Model
{ 
    protected $table;

   public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $this->table_datadosen = $this->db->table('user');
        $this->table_datadosenpenguji = $this->db->table('dosen_penguji')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta');
        $this->table_jadwalsem = $this->db->table('penjadwalan_sidang')
            ->join('mahasiswa', 'mahasiswa.id_mhs = penjadwalan_sidang.id_mhs');
}

  public function get_profil_datadosenpenguji($id)
    {
        return  $this->table_datadosen
            ->join('leveling_dosen ', 'leveling_dosen.id_user = user.id_user')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = leveling_dosen.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->join('dosen_penguji', 'dosen_penguji.id_dosenta = dosen_tugasakhir.id_dosenta')
            ->join('data_akademik', 'data_akademik.id_dataakademik = dosen_tugasakhir.id_dataakademik')
            ->where('user.id_user', $id)
            ->get()->getResultArray();
            
    }


    public function get_jadwalseminar1($data = false)
    {
    
        return $this->db->table('penjadwalan_sidang')
           // ->join('mahasiswa', 'mahasiswa.id_mhs = penjadwalan_sidang.id_mhs')
            ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang.penguji_1 ')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('leveling_dosen', 'leveling_dosen.id_dosenta = dosen_tugasakhir.id_dosenta')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->where(['user.id_user' => $data])
            ->get()->getResultArray();
    }


    public function get_jadwalseminar2($data = false)
    {
    
        return $this->db->table('penjadwalan_sidang')
            //->join('mahasiswa', 'mahasiswa.id_mhs = penjadwalan_sidang.id_mhs')
            ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang.penguji_2 ')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('leveling_dosen', 'leveling_dosen.id_dosenta = dosen_tugasakhir.id_dosenta')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->where(['user.id_user' => $data])
            ->get()->getResultArray();
    }

 }