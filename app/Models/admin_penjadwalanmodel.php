<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_penjadwalanmodel extends Model
{
    protected $table = 'penjadwalan_sidang';
    protected $primaryKey = 'id_jadwal';
    protected $allowedFields = ['jam_sidang', 'tanggal_sidang', 'tempat_sidang', 'penguji_1', 'penguji_2', 'status_penjadwalan_kaprodi'];


    public function get_jadwalseminar1($data = false)
    {
        if ($data == false) {
            // $where = "acara_sidang='seminar proposal'";
            return $this->db->table('penjadwalan_sidang')
                ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
                ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

                ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
                ->join('data_akademik', 'data_akademik.id_dataakademik = mahasiswa.id_dataakademik')
                // --------------tidak memerlukan dosen penguji-------
                // --------------karena penguji =null(belum di inputkan oleh kaprodi)-------
                ->where(['status_penjadwalan_kaprodi' => 'belum terjadwal'])
                ->where(['data_akademik.status' => 'aktif'])
                ->get()->getResultArray();
        }
        return $this->db->table('penjadwalan_sidang')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            // =======penguji1======
            ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang.penguji_1')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')

            // =======penguji2======
            // ->join('dosen_penguji as dospeng2', 'dospeng2.id_dosenpenguji = penjadwalan_sidang.penguji_2')
            // ->join('dosen_tugasakhir as dosenpembimbing2', 'dosenpembimbing2.id_dosenta = dospeng2.id_dosenta')
            // ->join('dosen as penguji2', 'penguji2.id_dosen = penguji2.id_dosen')


            ->where(['id_jadwal' => $data])
            // ->select([
            //     'penguji2.nama_dosen as penguji2_nama',
            //     'dospeng2.id_dosenpenguji as id_dosenpenguji2',
            //     'dosen.nama_dosen',
            //     'dosen_penguji.id_dosenpenguji',
            //     'mahasiswa.id_mhs',
            //     'mahasiswa.nama_mhs',
            //     'mahasiswa.nim_mhs',
            //     'pengajuan_judul.judul',
            //     'penjadwalan_sidang.tanggal_sidang',
            //     'penjadwalan_sidang.tempat_sidang',
            //     'penjadwalan_sidang.jam_sidang',
            //     'penjadwalan_sidang.acara_sidang',
            //     'penjadwalan_sidang.status_penjadwalan_kaprodi',
            //     'penjadwalan_sidang.id_jadwal',

            // ])
            // ->where($where)
            ->get()->getResultArray();
    }
    public function get_jadwalseminar2($data = false)
    {
        if ($data == false) {
            // $where = "acara_sidang='seminar proposal'";
            return $this->db->table('penjadwalan_sidang')
                ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
                ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

                ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
                ->join('data_akademik', 'data_akademik.id_dataakademik = mahasiswa.id_dataakademik')
                // --------------tidak memerlukan dosen penguji-------
                // --------------karena penguji =null(belum di inputkan oleh kaprodi)-------
                ->where(['status_penjadwalan_kaprodi' => 'belum terjadwal'])
                ->where(['data_akademik.status' => 'aktif'])
                ->get()->getResultArray();
        }
        return $this->db->table('penjadwalan_sidang')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            //============ penguji2 ===========
            ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang.penguji_2')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')

            ->where(['id_jadwal' => $data])
            // ->where($where)
            ->get()->getResultArray();
    }

    public function get_jadwalseminarterjadwal1($data = false)
    {
        if ($data == false) {
            // $where = "acara_sidang='seminar proposal'";
            return $this->db->table('penjadwalan_sidang')
                ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
                ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

                ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
                ->join('data_akademik', 'data_akademik.id_dataakademik = mahasiswa.id_dataakademik')
                ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang.penguji_1')
                ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
                ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')

                // penguji2
                ->join('dosen_penguji as dospeng2', 'dospeng2.id_dosenpenguji = penjadwalan_sidang.penguji_2')
                ->join('dosen_tugasakhir as dosenpenguji2', 'dosenpenguji2.id_dosenta = dospeng2.id_dosenta')
                ->join('dosen as penguji2', 'penguji2.id_dosen = dosenpenguji2.id_dosen')

                ->where(['status_penjadwalan_kaprodi' => 'sudah terjadwal'])
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
                    'penjadwalan_sidang.tanggal_sidang',
                    'penjadwalan_sidang.tempat_sidang',
                    'penjadwalan_sidang.jam_sidang',
                    'penjadwalan_sidang.acara_sidang',
                    'penjadwalan_sidang.status_penjadwalan_kaprodi',
                    'penjadwalan_sidang.id_jadwal',

                ])
                ->get()->getResultArray();
        }
        return $this->db->table('penjadwalan_sidang')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang.penguji_1')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->where(['id_jadwal' => $data])
            // ->where($where)
            ->get()->getResultArray();
    }
    public function get_jadwalseminarterjadwal2($data = false)
    {
        if ($data == false) {
            // $where = "acara_sidang='seminar proposal'";
            return $this->db->table('penjadwalan_sidang')
                ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
                ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

                ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
                ->join('data_akademik', 'data_akademik.id_dataakademik = mahasiswa.id_dataakademik')
                ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang.penguji_2')
                ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
                ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
                ->where(['status_penjadwalan_kaprodi' => 'sudah terjadwal'])
                ->where(['data_akademik.status' => 'aktif'])
                ->get()->getResultArray();
        }
        return $this->db->table('penjadwalan_sidang')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang.penguji_2')
            ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
            ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
            ->where(['id_jadwal' => $data])
            // ->where($where)
            ->get()->getResultArray();
    }
    // public function get_jadwalseminar()
    // {
    //     // $where = "acara_sidang='seminar proposal'";
    //     return $this->db->table('penjadwalan_sidang')
    //         ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
    //         ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

    //         ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
    //         ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang.penguji_2')
    //         ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
    //         ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
    //         // ->where($where)
    //         ->get()->getResultArray();
    // }


}
