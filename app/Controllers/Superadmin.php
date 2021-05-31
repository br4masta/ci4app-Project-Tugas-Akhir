<?php

namespace App\Controllers;

class Superadmin extends BaseController
{
    public function index()
    {
        return view('superadmin/Data Dosen');
    }
    public function hakakses()
    {
        return view('superadmin/Hak Akses');
    }
    public function edithakakses()
    {
        return view('superadmin/Edit Hak Akses');
    }
    public function tambahdatadosen()
    {
        return view('superadmin/Tambah Data Dosen');
    }

    public function editdatadosen()
    {
        return view('superadmin/Edit Data Dosen');
    }
    public function pembagiandosen()
    {
        return view('superadmin/Pembagian Dosen');
    }
    public function editpembagiandosen()
    {
        return view('superadmin/Edit Pembagian Dosen');
    }

    //--------------------------------------------------------------------

}
