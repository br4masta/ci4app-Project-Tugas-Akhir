<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_beritamodel extends Model
{

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
                'user.id_user'
            ])
            ->get()->getResultArray();
    }

    public function get_beritaseminar($data = false)
    {
        if ($data == false) {
            return $this->db->table('seminar_proposal')
                ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_jadwal = seminar_proposal.id_jadwal')
                ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
                ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

                ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
                ->join('data_akademik', 'data_akademik.id_dataakademik = mahasiswa.id_dataakademik')
                // dosen penguji 1
                ->join('dosen_penguji as dospenguji1', 'dospenguji1.id_dosenpenguji = penjadwalan_sidang.penguji_1')
                ->join('dosen_tugasakhir as pengujita1', 'pengujita1.id_dosenta = dospenguji1.id_dosenta')
                ->join('dosen as dosen_penguji1', 'dosen_penguji1.id_dosen = pengujita1.id_dosen')

                // // dosen penguji 2
                // ->join('dosen_penguji as dospenguji2', 'dospenguji2.id_dosenpenguji = penjadwalan_sidang.penguji_2')
                // ->join('dosen_tugasakhir as pengujita2', 'pengujita2.id_dosenta = dospenguji2.id_dosenta')
                // ->join('dosen as dosen_penguji2', 'dosen_penguji2.id_dosen = pengujita2.id_dosen')

                // dosen pembimbing 1
                // ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
                // ->join('dosen_tugasakhir as dospembimbing1', 'dospem1.id_dosenpembimbing = dospem1.id_dosenpembimbing')
                // ->join('dosen as dosen_pembimbing1', 'dosen_pembimbing1.id_dosen = dospembimbing1.id_dosen')

                // dosen pembimbing 2
                // ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
                // ->join('dosen_tugasakhir as dospembimbing2', 'dospem2.id_dosenpembimbing = dospem2.id_dosenpembimbing')
                // ->join('dosen as dosen_pembimbing2', 'dosen_pembimbing2.id_dosen = dospembimbing2.id_dosen')
                ->where(['data_akademik.status' => 'aktif'])
                ->select([

                    'dosen_penguji1.nama_dosen as dospenguji1_nama',
                    // 'dosen_penguji2.nama_dosen as dospenguji2_nama',
                    // 'dosen_pembimbing1.nama_dosen as dospem1_nama',
                    // 'dosen_pembimbing2.nama_dosen as dospem2_nama',
                    'mahasiswa.nim_mhs',
                    'mahasiswa.nama_mhs',
                    'pengajuan_judul.judul',
                    'penjadwalan_sidang.acara_sidang',
                    'seminar_proposal.id_seminar'



                ])

                ->get()->getResultArray();
        }
        return $this->db->table('seminar_proposal')
            ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_jadwal = seminar_proposal.id_jadwal')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('data_akademik', 'data_akademik.id_dataakademik = mahasiswa.id_dataakademik')
            // dosen penguji 1
            ->join('dosen_penguji as dospenguji1', 'dospenguji1.id_dosenpenguji = penjadwalan_sidang.penguji_1')
            ->join('dosen_tugasakhir as pengujita1', 'pengujita1.id_dosenta = dospenguji1.id_dosenta')
            ->join('dosen as dosen_penguji1', 'dosen_penguji1.id_dosen = pengujita1.id_dosen')
            // dosen penguji 2
            ->join('dosen_penguji as dospenguji2', 'dospenguji2.id_dosenpenguji = penjadwalan_sidang.penguji_2')
            ->join('dosen_tugasakhir as pengujita2', 'pengujita2.id_dosenta = dospenguji2.id_dosenta')
            ->join('dosen as dosen_penguji2', 'dosen_penguji2.id_dosen = pengujita2.id_dosen')
            // dosen pembimbing 1
            ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir as dospembimbing1', 'dospembimbing1.id_dosenta = dospem1.id_dosenta')
            ->join('dosen as dosen_pembimbing1', 'dosen_pembimbing1.id_dosen = dospembimbing1.id_dosen')

            // dosen pembimbing 1
            ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir as dospembimbing2', 'dospembimbing2.id_dosenta = dospem2.id_dosenta')
            ->join('dosen as dosen_pembimbing2', 'dosen_pembimbing2.id_dosen = dospembimbing2.id_dosen')
            ->select([
                'dosen_penguji1.nama_dosen as dospenguji1_nama',
                'dosen_penguji2.nama_dosen as dospenguji2_nama',
                'dosen_pembimbing1.nama_dosen as dospem1_nama',
                'dosen_pembimbing2.nama_dosen as dospem2_nama',
                // role dosen
                'dospenguji1.role_penguji as role_penguji1',
                'dospenguji2.role_penguji as role_penguji2',
                'dospem1.role_pembimbing as role_pembimbing1',
                'dospem2.role_pembimbing as role_pembimbing2',
                // 
                'seminar_proposal.id_seminar',
                'mahasiswa.id_mhs',
                'mahasiswa.nim_mhs',
                'mahasiswa.nama_mhs',
                'penjadwalan_sidang.acara_sidang',
                'pengajuan_judul.judul',
                'penjadwalan_sidang.tanggal_sidang',
                'penjadwalan_sidang.tempat_sidang',
                'seminar_proposal.nilai',
                'penjadwalan_sidang.berkas_proposal',
                'seminar_proposal.nilai_penguji_1',
                'seminar_proposal.nilai_penguji_2',
                'seminar_proposal.nilai_pembimbing_1',
                'seminar_proposal.nilai_pembimbing_2',
                'seminar_proposal.catatan_penguji_1',
                'seminar_proposal.catatan_penguji_2',
                'seminar_proposal.catatan_pembimbing_1',
                'seminar_proposal.catatan_pembimbing_2',

            ])
            ->where(['id_seminar' => $data])
            ->get()->getResultArray();
    }
    // public function get_bimbingan_pembimbing1($data = false)
    // {
    //     if ($data == false) {
    //         return $this->db->table('pengajuan_judul')

    //             ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
    //             ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
    //             ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
    //             ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')

    //             ->get()->getResultArray();
    //     }
    //     return $this->db->table('pengajuan_judul')
    //         ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
    //         ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
    //         ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
    //         ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
    //         ->where(['dosenpembimbing1' => $data])
    //         ->get()->getResultArray();
    // }

    public function get_beritasidangta($data = false)
    {
        if ($data == false) {
            return $this->db->table('sidang_tugasakhir')
                ->join('penjadwalan_sidang_ta', 'penjadwalan_sidang_ta.id_jadwal_ta = sidang_tugasakhir.id_jadwal_ta')
                ->join('bimbingan_ta', 'bimbingan_ta.id_bimbingan_ta = penjadwalan_sidang_ta.id_bimbingan_ta')
                ->join('seminar_proposal', 'seminar_proposal.id_seminar = bimbingan_ta.id_seminar')
                ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_jadwal = seminar_proposal.id_jadwal')
                ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
                ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
                ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
                ->join('data_akademik', 'data_akademik.id_dataakademik = mahasiswa.id_dataakademik')
                ->join('dosen_penguji', 'dosen_penguji.id_dosenpenguji = penjadwalan_sidang_ta.penguji_1')
                ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
                ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_penguji.id_dosenta')
                ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
                ->where(['data_akademik.status' => 'aktif'])
                ->get()->getResultArray();
        }
        return $this->db->table('sidang_tugasakhir')
            ->join('penjadwalan_sidang_ta', 'penjadwalan_sidang_ta.id_jadwal_ta = sidang_tugasakhir.id_jadwal_ta')
            ->join('bimbingan_ta', 'bimbingan_ta.id_bimbingan_ta = penjadwalan_sidang_ta.id_bimbingan_ta')
            ->join('seminar_proposal', 'seminar_proposal.id_seminar = bimbingan_ta.id_seminar')
            ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_jadwal = seminar_proposal.id_jadwal')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('data_akademik', 'data_akademik.id_dataakademik = mahasiswa.id_dataakademik')

            // dosen penguji 1
            ->join('dosen_penguji as dospenguji1', 'dospenguji1.id_dosenpenguji = penjadwalan_sidang.penguji_1')
            ->join('dosen_tugasakhir as pengujita1', 'pengujita1.id_dosenta = dospenguji1.id_dosenta')
            ->join('dosen as dosen_penguji1', 'dosen_penguji1.id_dosen = pengujita1.id_dosen')
            // dosen penguji 2
            ->join('dosen_penguji as dospenguji2', 'dospenguji2.id_dosenpenguji = penjadwalan_sidang.penguji_2')
            ->join('dosen_tugasakhir as pengujita2', 'pengujita2.id_dosenta = dospenguji2.id_dosenta')
            ->join('dosen as dosen_penguji2', 'dosen_penguji2.id_dosen = pengujita2.id_dosen')
            // dosen pembimbing 1
            ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir as dospembimbing1', 'dospembimbing1.id_dosenta = dospem1.id_dosenta')
            ->join('dosen as dosen_pembimbing1', 'dosen_pembimbing1.id_dosen = dospembimbing1.id_dosen')

            // dosen pembimbing 1
            ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir as dospembimbing2', 'dospembimbing2.id_dosenta = dospem2.id_dosenta')
            ->join('dosen as dosen_pembimbing2', 'dosen_pembimbing2.id_dosen = dospembimbing2.id_dosen')

            ->select([
                'dosen_penguji1.nama_dosen as dospenguji1_nama',
                'dosen_penguji2.nama_dosen as dospenguji2_nama',
                'dosen_pembimbing1.nama_dosen as dospem1_nama',
                'dosen_pembimbing2.nama_dosen as dospem2_nama',
                // role dosen
                'dospenguji1.role_penguji as role_penguji1',
                'dospenguji2.role_penguji as role_penguji2',
                'dospem1.role_pembimbing as role_pembimbing1',
                'dospem2.role_pembimbing as role_pembimbing2',
                // 
                'sidang_tugasakhir.id_sidangta',
                'mahasiswa.id_mhs',
                'mahasiswa.nim_mhs',
                'mahasiswa.nama_mhs',
                'penjadwalan_sidang_ta.acara_sidang_ta',
                'pengajuan_judul.judul',
                'penjadwalan_sidang_ta.tanggal_sidang_ta',
                'penjadwalan_sidang_ta.tempat_sidang_ta',
                'sidang_tugasakhir.nilai_ta',
                'penjadwalan_sidang.berkas_proposal',
                'sidang_tugasakhir.nilai_penguji_1_ta',
                'sidang_tugasakhir.nilai_penguji_2_ta',
                'sidang_tugasakhir.nilai_pembimbing_1_ta',
                'sidang_tugasakhir.nilai_pembimbing_2_ta',
                'sidang_tugasakhir.catatan_penguji_1_ta',
                'sidang_tugasakhir.catatan_penguji_2_ta',
                'sidang_tugasakhir.catatan_pembimbing_1_ta',
                'sidang_tugasakhir.catatan_pembimbing_2_ta',

            ])
            ->where(['id_sidangta' => $data])
            ->get()->getResultArray();
    }
}
