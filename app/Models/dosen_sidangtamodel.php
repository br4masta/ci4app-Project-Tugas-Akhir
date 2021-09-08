<?php

namespace App\Models;

use CodeIgniter\Model;

class dosen_sidangtamodel extends Model
{

    protected $table = 'sidang_tugasakhir';
    protected $primaryKey = 'id_sidangta';
    protected $allowedFields = ['id_sidangta', 'nilai_pembimbing_1_ta', 'catatan_pembimbing_1_ta', 'nilai_pembimbing_2_ta', 'catatan_pembimbing_2_ta', 'nilai_penguji_1_ta', 'catatan_penguji_1_ta', 'nilai_penguji_2_ta', 'catatan_penguji_2_ta', 'status_ta'];



    public function get_sidangta($data)
    {
        return $this->db->table('sidang_tugasakhir')
            ->join('penjadwalan_sidang_ta', 'penjadwalan_sidang_ta.id_jadwal_ta = sidang_tugasakhir.id_jadwal_ta')
            ->join('bimbingan_ta', 'bimbingan_ta.id_bimbingan_ta = penjadwalan_sidang_ta.id_bimbingan_ta')
            ->join('seminar_proposal', 'seminar_proposal.id_seminar = bimbingan_ta.id_seminar')
            ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_jadwal = seminar_proposal.id_jadwal')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('data_akademik', 'data_akademik.id_dataakademik = mahasiswa.id_dataakademik')
            ->where(['penjadwalan_sidang_ta.id_jadwal_ta' => $data])
            ->select([
                'mahasiswa.nama_mhs',
                'mahasiswa.nim_mhs',
                'pengajuan_judul.judul',
                'sidang_tugasakhir.status_ta',
                'sidang_tugasakhir.nilai_pembimbing_1_ta',
                'sidang_tugasakhir.catatan_pembimbing_1_ta',
                'sidang_tugasakhir.nilai_pembimbing_2_ta',
                'sidang_tugasakhir.catatan_pembimbing_2_ta',
                'sidang_tugasakhir.nilai_penguji_1_ta',
                'sidang_tugasakhir.catatan_penguji_1_ta',
                'sidang_tugasakhir.nilai_penguji_2_ta',
                'sidang_tugasakhir.catatan_penguji_2_ta',
                'sidang_tugasakhir.id_sidangta',
                'penjadwalan_sidang_ta.penguji_1',
                'penjadwalan_sidang_ta.penguji_2',

            ])
            ->get()->getResultArray();
    }
}
