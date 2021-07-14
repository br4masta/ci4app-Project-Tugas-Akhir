<?php

namespace App\Models;

use CodeIgniter\Model;

class dosen_pengajuanjudul extends Model
{

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
            ->join('user', 'user.id_user = mahasiswa.id_user')
            ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir as doshir1', 'doshir1.id_dosenta = dospem1.id_dosenta')
            ->join('dosen as dos1', 'dos1.id_dosen = doshir1.id_dosen')

            ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir as doshir2', 'doshir2.id_dosenta = dospem2.id_dosenta')
            ->join('dosen as dos2', 'dos2.id_dosen = doshir2.id_dosen')
            ->where('user.id_user', $id)
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