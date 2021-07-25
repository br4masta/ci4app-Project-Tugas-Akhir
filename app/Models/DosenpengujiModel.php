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
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang.penguji_1')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->join('leveling_dosen', 'leveling_dosen.id_dosenta = dosen_tugasakhir.id_dosenta')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            //   pembimbingn1
            ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir as dosenpembimbing1', 'dosenpembimbing1.id_dosenta = dospem1.id_dosenta')
            ->join('dosen as pembimbing1', 'pembimbing1.id_dosen = dosenpembimbing1.id_dosen')
            // pembimbing 2
            ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir as dosenpembimbing2', 'dosenpembimbing2.id_dosenta = dospem2.id_dosenta')
            ->join('dosen as pembimbing2', 'pembimbing2.id_dosen = dosenpembimbing2.id_dosen')
            // penguji2
            ->join('dosen_penguji as dospeng2', 'dospeng2.id_dosenpenguji = penjadwalan_sidang.penguji_2')
            ->join('dosen_tugasakhir as dosenpenguji2', 'dosenpenguji2.id_dosenta = dospeng2.id_dosenta')
            ->join('dosen as penguji2', 'penguji2.id_dosen = dosenpenguji2.id_dosen')

            ->where(['user.id_user' => $data])
            ->select([

                'penguji2.nama_dosen as penguji2_nama',
                'pembimbing1.nama_dosen as pembimbing1_nama',
                'pembimbing2.nama_dosen as pembimbing2_nama',
                'dosen.nama_dosen',
                'mahasiswa.id_mhs',
                'mahasiswa.nama_mhs',
                'mahasiswa.nim_mhs',
                'pengajuan_judul.judul',
                'user.id_user',
                'penjadwalan_sidang.tanggal_sidang',
                'penjadwalan_sidang.tempat_sidang',
                'penjadwalan_sidang.jam_sidang',
                'penjadwalan_sidang.acara_sidang',

            ])

            ->get()->getResultArray();
    }


    public function get_jadwalseminar2($data = false)
    {

        return $this->db->table('penjadwalan_sidang')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang.penguji_2')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->join('leveling_dosen', 'leveling_dosen.id_dosenta = dosen_tugasakhir.id_dosenta')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            //   pembimbingn1
            ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir as dosenpembimbing1', 'dosenpembimbing1.id_dosenta = dospem1.id_dosenta')
            ->join('dosen as pembimbing1', 'pembimbing1.id_dosen = dosenpembimbing1.id_dosen')
            // pembimbing 2
            ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir as dosenpembimbing2', 'dosenpembimbing2.id_dosenta = dospem2.id_dosenta')
            ->join('dosen as pembimbing2', 'pembimbing2.id_dosen = dosenpembimbing2.id_dosen')
            // penguji1
            ->join('dosen_penguji as dospeng1', 'dospeng1.id_dosenpenguji = penjadwalan_sidang.penguji_1')
            ->join('dosen_tugasakhir as dosenpenguji1', 'dosenpenguji1.id_dosenta = dospeng1.id_dosenta')
            ->join('dosen as penguji1', 'penguji1.id_dosen = dosenpenguji1.id_dosen')
            ->where(['user.id_user' => $data])
            ->select([

                'penguji1.nama_dosen as penguji1_nama',
                'pembimbing1.nama_dosen as pembimbing1_nama',
                'pembimbing2.nama_dosen as pembimbing2_nama',
                'dosen.nama_dosen',
                'mahasiswa.id_mhs',
                'mahasiswa.nama_mhs',
                'mahasiswa.nim_mhs',
                'pengajuan_judul.judul',
                'user.id_user',
                'penjadwalan_sidang.tanggal_sidang',
                'penjadwalan_sidang.tempat_sidang',
                'penjadwalan_sidang.jam_sidang',
                'penjadwalan_sidang.acara_sidang',

            ])
            ->get()->getResultArray();
    }
}
