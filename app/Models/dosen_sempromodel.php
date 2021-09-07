<?php

namespace App\Models;

use CodeIgniter\Model;

class dosen_sempromodel extends Model
{

    protected $table = 'seminar_proposal';
    protected $primaryKey = 'id_seminar';
    protected $allowedFields = ['id_seminar', 'nilai_pembimbing_1', 'catatan_pembimbing_1', 'nilai_pembimbing_2', 'catatan_pembimbing_2', 'status'];



    public function get_seminarproposal($data)
    {
        return $this->db->table('seminar_proposal')
            ->join('penjadwalan_sidang', 'penjadwalan_sidang.id_jadwal = seminar_proposal.id_jadwal')
            ->join('bimbingan', 'bimbingan.id_bimbingan = penjadwalan_sidang.id_bimbingan')
            ->join('pengajuan_judul', 'pengajuan_judul.id_pengajuan = bimbingan.id_pengajuan')

            ->join('mahasiswa', 'mahasiswa.id_mhs = pengajuan_judul.id_mhs')
            ->join('data_akademik', 'data_akademik.id_dataakademik = mahasiswa.id_dataakademik')
            ->where(['penjadwalan_sidang.id_jadwal' => $data])
            ->select([
                'seminar_proposal.status as status',
                'seminar_proposal.nilai',
                'seminar_proposal.catatan',
                'seminar_proposal.nilai_pembimbing_1',
                'seminar_proposal.catatan_pembimbing_1',
                'seminar_proposal.nilai_pembimbing_2',
                'seminar_proposal.catatan_pembimbing_2',
                'seminar_proposal.id_seminar',
                'mahasiswa.nama_mhs',
                'mahasiswa.nim_mhs',
                'pengajuan_judul.judul',

            ])
            ->get()->getResultArray();
    }
}
