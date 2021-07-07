<?php

namespace App\Models;

use CodeIgniter\Model;

class dosenModel extends Model
{
    protected $table;

    //  public function __construct()
    // {
    //     parent::__construct();
    //     $db = \Config\Database::connect();
    //     $this->table_datadosen = $this->db->table('user')
    //         ->join('dosen', 'user.id_user = dosen.id_user');
    //     // $this->table_dosen = $this->db->table('dosen')
    //     //     ->join('user' 'dosen.id_user = user.id_user');;

<<<<<<< HEAD
    public function get_dosen()
    {
        return $this->db->table('leveling_dosen')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = leveling_dosen.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->get()->getResultArray();
    }
=======
    // }
    // public function get_datadosen($id)
    // {
    //     return $this->table_datadosen
    //   // ->join('pengajuan_judul', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
    //        // ->join('dosen_pembimbing' 'dosen_pembimbing.id_dosenta = dosen_tugasakhir.id_dosenta')
    //         ->join('dosen_tugasakhir' 'dosen_tugasakhir.id_dosen = dosen.id_dosen')
    //         ->join('dosen' 'dosen.id_user = user.id_user')
    //         ->where('user.id_user', $id)
    //         ->select(['dosen.nama_dosen as dos_nama',
    //                     ])
    //         ->get()->getResultArray();
    // }

    // public function get_dosen()
    // {
    //     return $this->db->table('leveling_dosen')
    //         ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = leveling_dosen.id_dosenta')
    //         ->join('user', 'user.id_user = leveling_dosen.id_user')
    //         ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
>>>>>>> 8a5725d693ff5a8557e53c1fd89a58a557083726

    //         ->get()->getResultArray();
    // }

    // public function get_datadsn($id)
    // {
    //     return $this->table_dosen 
    //         ->where('user.id_user', $id)
    //         ->select([
    //                 'dosen.nama_dosen',
    //                 'dosen.nidn_dosen',
    //                 'dosen.foto_dosen',
    //                 'dosen_pembimbing.role_pembimbing',
    //                 'dosen_tugasakhir.id_dataakademik',
    //                 'leveling_dosen.id_dosenta'
    //         ])
    //         ->get()->getResultArray();

    // }

    // public function get_pembimbing($data = false)
    // {
    //     if ($data == false) {
    //         return $this->db->table('dosen_pembimbing')
    //             ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
    //             ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
    //             ->join('data_akademik', 'data_akademik.id_dataakademik = dosen_tugasakhir.id_dataakademik')
    //             ->get()->getResultArray();
    //     }

    //     return $this->db->table('dosen_pembimbing')
    //         ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
    //         ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
    //         ->join('data_akademik', 'data_akademik.id_dataakademik = dosen_tugasakhir.id_dataakademik')
    //         ->where(['id_dosenpembimbing' => $data])
    //         ->get()->getResultArray();
    // }

    // public function get_penguji()
    // {
    //     return $this->db->table('dosen_penguji')
    //         ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
    //         ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
    //         ->join('data_akademik', 'data_akademik.id_dataakademik = dosen_tugasakhir.id_dataakademik')
    //         ->get()->getResultArray();
    // }

    // public function get_dosen_tugasakhir()
    // {
    //     return $this->db->table('dosen_tugasakhir')
    //         ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
    //         ->join('data_akademik', 'data_akademik.id_dataakademik = dosen_tugasakhir.id_dataakademik')
    //         ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenta = dosen_tugasakhir.id_dosenta')
    //         ->join('dosen_penguji', 'dosen_penguji.id_dosenta = dosen_tugasakhir.id_dosenta')
    //         ->get()->getResultArray();
    // }
      public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $this->table_datadosenmhs = $this->db->table('user')
            ->join('mahasiswa', 'user.id_user = mahasiswa.id_user');
        $this->table_mhs = $this->db->table('mahasiswa')
            ->join('user', 'mahasiswa.id_user = user.id_user');
        $this->table_datadosenta = $this->db->table('dosen_tugasakhir');

     }      
    public function get_profil_datadosenta($id)
    {
        return  $this->table_datadosenta
         ->join('dosen','dosen.id_dosen = dosen_tugasakhir.id_dosen')
         ->join('user','user.id_user = dosen.id_user')
            ->where('user.id_user', $id)
            ->get()->getResultArray();
    }
    // public function get_datadsn($id)
    // {
    //     return $this->table_datadosenta
    //     ->where('user.id_user', $id)

    //     ->get()->getResultArray();
    // }
}
