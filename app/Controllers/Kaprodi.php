<?php

namespace App\Controllers;

class Kaprodi extends BaseController
{
    public function index()
    {
        $pengajuanModel = new \App\Models\pengajuanModel();
        $pengajuan_judul = $pengajuanModel->get_pengajuan();
        $pengajuan_judul2 = $pengajuanModel->get_pengajuan2();
        $data = [

            'datajudul' => $pengajuan_judul,
            'datajudul2' => $pengajuan_judul2,

        ];
        return view('kaprodi/Pengajuan/Pengajuan judul', $data);
    }
    public function pengajuan()
    {
        $pengajuanModel = new \App\Models\pengajuanModel();
        $pengajuan_judul = $pengajuanModel->get_pengajuan();
        $pengajuan_judul2 = $pengajuanModel->get_pengajuan2();
        $data = [

            'datajudul' => $pengajuan_judul,
            'datajudul2' => $pengajuan_judul2,

        ];
        return view('kaprodi/Pengajuan/Pengajuan judul', $data);
    }
    public function seminar()
    {
        $penjadwalanModel = new \App\Models\penjadwalanModel();
        $penjadwalan = $penjadwalanModel->get_jadwalseminar();
        $penjadwalan2 = $penjadwalanModel->get_jadwalseminar2();


        $data = [

            'jadwal' => $penjadwalan,
            'jadwal2' => $penjadwalan2,



        ];
        return view('kaprodi/pendjadwalan/Seminar Proposal', $data);
    }
    public function skripsi()
    {
        $penjadwalanModel = new \App\Models\penjadwalanModel();
        $penjadwalan = $penjadwalanModel->get_jadwalsidangta();
        $penjadwalan2 = $penjadwalanModel->get_jadwalsidangta2();

        $data = [

            'jadwal' => $penjadwalan,
            'jadwal2' => $penjadwalan2,

        ];
        return view('kaprodi/pendjadwalan/Skripsi', $data);
    }
    public function editskripsi()
    {
        return view('kaprodi/pendjadwalan/Edit Skripsi');
    }
    public function editseminar()
    {
        return view('kaprodi/pendjadwalan/Edit Seminar Proposal');
    }

    public function detailseminar()
    {
        return view('kaprodi/pendjadwalan/Detail Seminar Proposal');
    }
    public function detailskripsi()
    {
        return view('kaprodi/pendjadwalan/Detail Skripsi');
    }
    public function Berita()
    {
        $beritaModel = new \App\Models\beritaModel();
        $beritaseminar = $beritaModel->get_beritaseminar();
        $beritasidangta = $beritaModel->get_beritasidangta();

        $data = [

            'seminar' => $beritaseminar,
            'sidang_ta' => $beritasidangta,

        ];
        return view('kaprodi/Data Berita/Data Berita', $data);
    }

    public function detailberita()
    {
        return view('kaprodi/Data Berita/Detail Data Berita');
    }
    //--------------------------------------------------------------------

}
