<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_pengajuanmodel extends Model
{
    protected $table = 'pengajuan_judul';
    protected $primaryKey = 'id_pengajuan';
    protected $allowedFields = ['status_pengajuan', 'catatan_kaprodi'];

    public function get_pengajuan()
    {
        return $this->db->table('pengajuan_judul')
            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            // ============PEMBIMBING 1=========
            ->join('dosen_pembimbing as dospem1', 'dospem1.id_dosenpembimbing = pengajuan_judul.dosenpembimbing1')
            ->join('dosen_tugasakhir as dosta1', 'dosta1.id_dosenta = dospem1.id_dosenta')
            ->join('dosen as pembimbing1', 'pembimbing1.id_dosen = dosta1.id_dosen')

            // ============PEMBIMBING 2=========
            ->join('dosen_pembimbing as dospem2', 'dospem2.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
            ->join('dosen_tugasakhir as dosta2', 'dosta2.id_dosenta = dospem2.id_dosenta')
            ->join('dosen as pembimbing2', 'pembimbing2.id_dosen = dosta2.id_dosen')
            // ->where('konfirmasi_pembimbing_1', 'di setujui')
            // ->where('konfirmasi_pembimbing_2', 'di setujui')
            ->select([
                'pembimbing1.nama_dosen as nama_pembimbing1',
                'pembimbing2.nama_dosen as nama_pembimbing2',
                'dospem1.role_pembimbing as role_pembimbing1',
                'dospem2.role_pembimbing as role_pembimbing2',
                'mahasiswa.nama_mhs',
                'mahasiswa.nim_mhs',
                'pengajuan_judul.judul',
                'pengajuan_judul.status_pengajuan',
                'pengajuan_judul.id_pengajuan',
                'pengajuan_judul.catatan_kaprodi',
                'pengajuan_judul.deskripsi_judul',
                'pengajuan_judul.deskripsi',
                'pengajuan_judul.konfirmasi_pembimbing_1',
                'pengajuan_judul.konfirmasi_pembimbing_2',
                'pengajuan_judul.catatan_pembimbing_1',
                'pengajuan_judul.catatan_pembimbing_2',

            ])
            ->get()->getResultArray();
    }
    // public function get_pengajuan2()
    // {
    //     return $this->db->table('pengajuan_judul')
    //         ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
    //         ->join('dosen_pembimbing', 'dosen_pembimbing.id_dosenpembimbing = pengajuan_judul.dosenpembimbing2')
    //         ->join('dosen_tugasakhir', 'dosen_tugasakhir.id_dosenta = dosen_pembimbing.id_dosenta')
    //         ->join('dosen', 'dosen.id_dosen = dosen_tugasakhir.id_dosen')
    //         ->get()->getResultArray();
    // }
}
