<?php

namespace App\Controllers;

class Kaprodi extends BaseController
{
    public function index()
    {
        return view('kaprodi/Pengajuan/Pengajuan judul');
    }
    public function pengajuan()
    {
        return view('kaprodi/Pengajuan/Pengajuan judul');
    }
    public function seminar()
    {
        return view('kaprodi/pendjadwalan/Seminar Proposal');
    }
    public function skripsi()
    {
        return view('kaprodi/pendjadwalan/Skripsi');
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
    //--------------------------------------------------------------------

}
