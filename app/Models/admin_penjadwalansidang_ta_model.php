<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_penjadwalansidang_ta_model extends Model
{
    protected $table = 'penjadwalan_sidang_ta';
    protected $primaryKey = 'id_jadwal_ta';
    protected $allowedFields = ['tanggal_sidang_ta', 'tempat_sidang_ta', 'penguji_1', 'penguji_2', 'status_penjadwalan_kaprodi_ta', 'jam_sidang_ta'];





    // -----------------------------SIDANG TUGAS AKHIR PENJADWALAN---------------------
    public function get_jadwalsidangta1($data = false)
    {
        if ($data == false) { // $where = "acara_sidang='sidang tugas akhir'";
            return $this->db->table('penjadwalan_sidang_ta')
                ->join('bimbingan_ta', 'bimbingan_ta.id_bimbingan_ta = penjadwalan_sidang_ta.id_bimbingan_ta')
                ->join('seminar_proposal', 'seminar_proposal.id_seminar = bimbingan_ta.id_seminar')
                ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_jadwal = seminar_proposal.id_jadwal')
                ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
                ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
                ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
                ->join('data_akademik', 'data_akademik.id_dataakademik = mahasiswa.id_dataakademik')
                // --------------tidak memerlukan dosen penguji-------
                // --------------karena penguji =null(belum di inputkan oleh kaprodi)-------
                ->where(['status_penjadwalan_kaprodi_ta' => 'belum terjadwal'])
                ->where(['data_akademik.status' => 'aktif'])
                ->get()->getResultArray();
        }
        return $this->db->table('penjadwalan_sidang_ta')
            ->join('bimbingan_ta', 'bimbingan_ta.id_bimbingan_ta = penjadwalan_sidang_ta.id_bimbingan_ta')
            ->join('seminar_proposal', 'seminar_proposal.id_seminar = bimbingan_ta.id_seminar')
            ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_jadwal = seminar_proposal.id_jadwal')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')

            // =======penguji1======
            ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang_ta.penguji_1')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')

            ->where(['id_jadwal_ta' => $data])

            ->get()->getResultArray();
    }
    public function get_jadwalsidangta2($data = false)
    {
        if ($data == false) { // $where = "acara_sidang='sidang tugas akhir'";
            return $this->db->table('penjadwalan_sidang_ta')
                ->join('bimbingan_ta', 'bimbingan_ta.id_bimbingan_ta = penjadwalan_sidang_ta.id_bimbingan_ta')
                ->join('seminar_proposal', 'seminar_proposal.id_seminar = bimbingan_ta.id_seminar')
                ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_jadwal = seminar_proposal.id_jadwal')
                ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
                ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
                ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
                ->join('data_akademik', 'data_akademik.id_dataakademik = mahasiswa.id_dataakademik')
                // --------------tidak memerlukan dosen penguji-------
                // --------------karena penguji =null(belum di inputkan oleh kaprodi)-------
                ->where(['status_penjadwalan_kaprodi_ta' => 'belum terjadwal'])
                ->where(['data_akademik.status' => 'aktif'])
                ->get()->getResultArray();
        }
        return $this->db->table('penjadwalan_sidang_ta')
            ->join('bimbingan_ta', 'bimbingan_ta.id_bimbingan_ta = penjadwalan_sidang_ta.id_bimbingan_ta')
            ->join('seminar_proposal', 'seminar_proposal.id_seminar = bimbingan_ta.id_seminar')
            ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_jadwal = seminar_proposal.id_jadwal')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')

            // =======penguji2======
            ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang_ta.penguji_2')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')

            ->where(['id_jadwal_ta' => $data])

            ->get()->getResultArray();
    }
    public function get_jadwalsidangtaterjadwal1($data = false)
    {
        if ($data == false) { // $where = "acara_sidang='sidang tugas akhir'";
            return $this->db->table('penjadwalan_sidang_ta')
                ->join('bimbingan_ta', 'bimbingan_ta.id_bimbingan_ta = penjadwalan_sidang_ta.id_bimbingan_ta')
                ->join('seminar_proposal', 'seminar_proposal.id_seminar = bimbingan_ta.id_seminar')
                ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_jadwal = seminar_proposal.id_jadwal')
                ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
                ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
                ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
                ->join('data_akademik', 'data_akademik.id_dataakademik = mahasiswa.id_dataakademik')
                ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang_ta.penguji_1')
                ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
                ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
                // penguji2
                ->join('dosen_penguji as dospeng2', 'dospeng2.id_dosenpenguji = penjadwalan_sidang_ta.penguji_2')
                ->join('dosen_tugasakhir as dosenpenguji2', 'dosenpenguji2.id_dosenta = dospeng2.id_dosenta')
                ->join('dosen as penguji2', 'penguji2.id_dosen = dosenpenguji2.id_dosen')

                ->where(['status_penjadwalan_kaprodi_ta' => 'sudah terjadwal'])
                ->where(['data_akademik.status' => 'aktif'])
                ->select([
                    'penguji2.nama_dosen as penguji2_nama',
                    // 'pembimbing1.nama_dosen as pembimbing1_nama',
                    // 'pembimbing2.nama_dosen as pembimbing2_nama',
                    'dosen.nama_dosen',
                    'mahasiswa.id_mhs',
                    'mahasiswa.nama_mhs',
                    'mahasiswa.nim_mhs',
                    'pengajuan_judul.judul',
                    // 'user.id_user',
                    'penjadwalan_sidang_ta.tanggal_sidang_ta',
                    'penjadwalan_sidang_ta.tempat_sidang_ta',
                    'penjadwalan_sidang_ta.jam_sidang_ta',
                    'penjadwalan_sidang_ta.acara_sidang_ta',
                    'penjadwalan_sidang_ta.status_penjadwalan_kaprodi_ta',
                    'penjadwalan_sidang_ta.id_jadwal_ta',

                ])

                ->get()->getResultArray();
        }
        return $this->db->table('penjadwalan_sidang_ta')
            ->join('bimbingan_ta', 'bimbingan_ta.id_bimbingan_ta = penjadwalan_sidang_ta.id_bimbingan_ta')
            ->join('seminar_proposal', 'seminar_proposal.id_seminar = bimbingan_ta.id_seminar')
            ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_jadwal = seminar_proposal.id_jadwal')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang_ta.penguji_1')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->where(['id_jadwal_ta' => $data])

            ->get()->getResultArray();
    }
    public function get_jadwalsidangtaterjadwal2($data = false)
    {
        if ($data == false) { // $where = "acara_sidang='sidang tugas akhir'";
            return $this->db->table('penjadwalan_sidang_ta')
                ->join('bimbingan_ta', 'bimbingan_ta.id_bimbingan_ta = penjadwalan_sidang_ta.id_bimbingan_ta')
                ->join('seminar_proposal', 'seminar_proposal.id_seminar = bimbingan_ta.id_seminar')
                ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_jadwal = seminar_proposal.id_jadwal')
                ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
                ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
                ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
                ->join('data_akademik', 'data_akademik.id_dataakademik = mahasiswa.id_dataakademik')
                ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang_ta.penguji_2')
                ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
                ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
                ->where(['status_penjadwalan_kaprodi_ta' => 'sudah terjadwal'])
                ->where(['data_akademik.status' => 'aktif'])
                ->get()->getResultArray();
        }
        return $this->db->table('penjadwalan_sidang_ta')
            ->join('bimbingan_ta', 'bimbingan_ta.id_bimbingan_ta = penjadwalan_sidang_ta.id_bimbingan_ta')
            ->join('seminar_proposal', 'seminar_proposal.id_seminar = bimbingan_ta.id_seminar')
            ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_jadwal = seminar_proposal.id_jadwal')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang_ta.penguji_2')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->where(['id_jadwal_ta' => $data])

            ->get()->getResultArray();
    }
}
