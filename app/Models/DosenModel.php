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
            ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1');
        $this->table_pengajuan2 = $this->db->table('pengajuan_judul')
            ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2');
        $this->table_proposal = $this->db->table('bimbingan');
        $this->table_proposal = $this->db->table('bimbingan_ta');
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

    //======================================PENGAJUAN JUDUL==========================================================
    public function get_pengajuanjudul1($data = false)
    {

        return $this->db->table('pengajuan_judul')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
            ->join('leveling_dosen', 'leveling_dosen.id_dosenta = dosen_tugasakhir.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            //   pembimbingn1
            ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir as dosenpembimbing1', 'dosenpembimbing1.id_dosenta = dospem1.id_dosenta')
            ->join('dosen as pembimbing1', 'pembimbing1.id_dosen = dosenpembimbing1.id_dosen')
            // pembimbing 2
            ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir as dosenpembimbing2', 'dosenpembimbing2.id_dosenta = dospem2.id_dosenta')
            ->join('dosen as pembimbing2', 'pembimbing2.id_dosen = dosenpembimbing2.id_dosen')
            ->where(['user.id_user' => $data])
            ->select([
                'pembimbing1.nama_dosen as pembimbing1_nama',
                'pembimbing2.nama_dosen as pembimbing2_nama',
                'mahasiswa.id_mhs',
                'mahasiswa.nama_mhs',
                'mahasiswa.nim_mhs',
                'pengajuan_judul.id_pengajuan',
                'pengajuan_judul.judul',
                'pengajuan_judul.status_pengajuan',
                'pengajuan_judul.konfirmasi_pembimbing_1',
                'pengajuan_judul.konfirmasi_pembimbing_2',
                'user.id_user'

            ])
            ->get()->getResultArray();
    }
    public function get_pengajuanjudul2($data = false)
    {

        return $this->db->table('pengajuan_judul')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
            ->join('leveling_dosen', 'leveling_dosen.id_dosenta = dosen_tugasakhir.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            //   pembimbingn1
            ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir as dosenpembimbing1', 'dosenpembimbing1.id_dosenta = dospem1.id_dosenta')
            ->join('dosen as pembimbing1', 'pembimbing1.id_dosen = dosenpembimbing1.id_dosen')
            // pembimbing 2
            ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir as dosenpembimbing2', 'dosenpembimbing2.id_dosenta = dospem2.id_dosenta')
            ->join('dosen as pembimbing2', 'pembimbing2.id_dosen = dosenpembimbing2.id_dosen')
            ->where(['user.id_user' => $data])
            ->select([
                'pembimbing1.nama_dosen as pembimbing1_nama',
                'pembimbing2.nama_dosen as pembimbing2_nama',
                'mahasiswa.id_mhs',
                'mahasiswa.nama_mhs',
                'mahasiswa.nim_mhs',
                'pengajuan_judul.id_pengajuan',
                'pengajuan_judul.judul',
                'pengajuan_judul.status_pengajuan',
                'pengajuan_judul.konfirmasi_pembimbing_1',
                'pengajuan_judul.konfirmasi_pembimbing_2',
                'user.id_user'

            ])
            ->get()->getResultArray();
    }
    // ========================================================================================================================


    //=============================PENGAJUAN PROPOSAL=========================================
    public function get_proposal1($data = false)
    {
        return $this->db->table('bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_bimbingan')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->join('leveling_dosen', ' leveling_dosen.id_dosenta = dosen_tugasakhir.id_dosenta')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            //   pembimbingn1
            ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir as dosenpembimbing1', 'dosenpembimbing1.id_dosenta = dospem1.id_dosenta')
            ->join('dosen as pembimbing1', 'pembimbing1.id_dosen = dosenpembimbing1.id_dosen')
            // pembimbing 2
            ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir as dosenpembimbing2', 'dosenpembimbing2.id_dosenta = dospem2.id_dosenta')
            ->join('dosen as pembimbing2', 'pembimbing2.id_dosen = dosenpembimbing2.id_dosen')
            ->where(['user.id_user' => $data])
            ->select([
                'pembimbing1.nama_dosen as pembimbing1_nama',
                'pembimbing2.nama_dosen as pembimbing2_nama',
                'dosen.nama_dosen',
                'mahasiswa.id_mhs',
                'mahasiswa.nama_mhs',
                'mahasiswa.nim_mhs',
                'pengajuan_judul.id_pengajuan',
                'pengajuan_judul.judul',
                'bimbingan.id_bimbingan',
                'bimbingan.judul_bimbingan',
                'bimbingan.berkas_bimbingan',
                'bimbingan.deskripsi_bimbingan',
                'bimbingan.tanggal_bimbingan',
                'bimbingan.status_bimbingan_pembimbing1',
                'bimbingan.status_bimbingan_pembimbing2',
                'bimbingan.catatan_bimbingan_pembimbing1',
                'bimbingan.catatan_bimbingan_pembimbing2',
                'user.id_user'
            ])
            ->get()->getResultArray();
    }
    public function get_proposal2($data = false)
    {
        return $this->db->table('bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_bimbingan')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->join('leveling_dosen', ' leveling_dosen.id_dosenta = dosen_tugasakhir.id_dosenta')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            //   pembimbingn1
            ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir as dosenpembimbing1', 'dosenpembimbing1.id_dosenta = dospem1.id_dosenta')
            ->join('dosen as pembimbing1', 'pembimbing1.id_dosen = dosenpembimbing1.id_dosen')
            // pembimbing 2
            ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir as dosenpembimbing2', 'dosenpembimbing2.id_dosenta = dospem2.id_dosenta')
            ->join('dosen as pembimbing2', 'pembimbing2.id_dosen = dosenpembimbing2.id_dosen')
            ->where(['user.id_user' => $data])
            ->select([
                'pembimbing1.nama_dosen as pembimbing1_nama',
                'pembimbing2.nama_dosen as pembimbing2_nama',
                'dosen.nama_dosen',
                'mahasiswa.id_mhs',
                'mahasiswa.nama_mhs',
                'mahasiswa.nim_mhs',
                'pengajuan_judul.id_pengajuan',
                'pengajuan_judul.judul',
                'bimbingan.id_bimbingan',
                'bimbingan.judul_bimbingan',
                'bimbingan.berkas_bimbingan',
                'bimbingan.deskripsi_bimbingan',
                'bimbingan.tanggal_bimbingan',
                'bimbingan.status_bimbingan_pembimbing1',
                'bimbingan.status_bimbingan_pembimbing2',
                'bimbingan.catatan_bimbingan_pembimbing1',
                'bimbingan.catatan_bimbingan_pembimbing2',
                'user.id_user'
            ])
            ->get()->getResultArray();
    }

    public function get_detailproposal($id = false, $dat)
    {
        return $this->db->table('bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->join('leveling_dosen', ' leveling_dosen.id_dosenta = dosen_tugasakhir.id_dosenta')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            ->where(['pengajuan_judul.id_pengajuan' => $id])
            ->where(['user.id_user' => $dat])
            // ->select([

            //     'mahasiswa.id_mhs',
            //     'mahasiswa.nama_mhs',
            //     'mahasiswa.nim_mhs',
            //     'bimbingan.judul_bimbingan',
            //     'bimbingan.berkas_bimbingan',
            //     'bimbingan.deskripsi_bimbingan',
            //     'bimbingan.tanggal_bimbingan',
            //     'bimbingan.status_bimbingan_pembimbing1',
            //     'bimbingan.status_bimbingan_pembimbing2',
            //     'bimbingan.catatan_bimbingan_pembimbing1',
            //     'bimbingan.catatan_bimbingan_pembimbing2',
            //     'dosen_pembimbing.role_pembimbing',
            //     'user.id_user'
            // ])
            ->get()->getResultArray();
    }
    public function get_detailproposal2($id = false, $dat)
    {
        return $this->db->table('bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->join('leveling_dosen', ' leveling_dosen.id_dosenta = dosen_tugasakhir.id_dosenta')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            ->where(['pengajuan_judul.id_pengajuan' => $id])
            ->where(['user.id_user' => $dat])
            // ->select([

            //     'mahasiswa.id_mhs',
            //     'mahasiswa.nama_mhs',
            //     'mahasiswa.nim_mhs',
            //     'bimbingan.judul_bimbingan',
            //     'bimbingan.berkas_bimbingan',
            //     'bimbingan.deskripsi_bimbingan',
            //     'bimbingan.tanggal_bimbingan',
            //     'bimbingan.status_bimbingan_pembimbing1',
            //     'bimbingan.status_bimbingan_pembimbing2',
            //     'bimbingan.catatan_bimbingan_pembimbing1',
            //     'bimbingan.catatan_bimbingan_pembimbing2',
            //     'dosen_pembimbing.role_pembimbing',
            //     'user.id_user'
            // ])
            ->get()->getResultArray();
    }

    // ================================================================================================



    //=============================PENGAJUAN TUGAS AKHIR=========================================
    public function datatugasakhir1($id = false, $dat)
    {
        return $this->db->table('bimbingan_ta')
            ->join('seminar_proposal', 'seminar_proposal.id_seminar = bimbingan_ta.id_seminar')
            ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_jadwal = seminar_proposal.id_jadwal')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->join('leveling_dosen', ' leveling_dosen.id_dosenta = dosen_tugasakhir.id_dosenta')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            //   pembimbingn1
            ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir as dosenpembimbing1', 'dosenpembimbing1.id_dosenta = dospem1.id_dosenta')
            ->join('dosen as pembimbing1', 'pembimbing1.id_dosen = dosenpembimbing1.id_dosen')
            // pembimbing 2
            ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir as dosenpembimbing2', 'dosenpembimbing2.id_dosenta = dospem2.id_dosenta')
            ->join('dosen as pembimbing2', 'pembimbing2.id_dosen = dosenpembimbing2.id_dosen')
            ->where(['pengajuan_judul.id_pengajuan' => $id])
            ->where(['user.id_user' => $dat])
            ->get()->getResultArray();
    }



    public function datatugasakhir2($id = false, $dat)
    {
        return $this->db->table('bimbingan_ta')
            ->join('seminar_proposal', 'seminar_proposal.id_seminar = bimbingan_ta.id_seminar')
            ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_jadwal = seminar_proposal.id_jadwal')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->join('leveling_dosen', ' leveling_dosen.id_dosenta = dosen_tugasakhir.id_dosenta')
            ->join('user', 'user.id_user = leveling_dosen.id_user')
            //   pembimbingn1
            ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir as dosenpembimbing1', 'dosenpembimbing1.id_dosenta = dospem1.id_dosenta')
            ->join('dosen as pembimbing1', 'pembimbing1.id_dosen = dosenpembimbing1.id_dosen')
            // pembimbing 2
            ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir as dosenpembimbing2', 'dosenpembimbing2.id_dosenta = dospem2.id_dosenta')
            ->join('dosen as pembimbing2', 'pembimbing2.id_dosen = dosenpembimbing2.id_dosen')
            ->where(['pengajuan_judul.id_pengajuan' => $id])
            ->where(['user.id_user' => $dat])
            ->get()->getResultArray();
    }
}
