<?php namespace App\Controllers;

class Pages extends BaseController
{
	public function Pages_mahasiswa()
	{
        return view('mahasiswa/pengajuan_judul/pengajuanjudul');
	}
    public function Pages_dosen()
	{
        return view('dosen/index');
	}
    public function Pages_dosenpenguji()
	{
        return view('dosenpenguji/index');
	}
    public function Pages_kaprodi()
	{
        return view('kaprodi/index');
	}
    public function Pages_Admin()
	{
        return view('admin/index');
	}

	//--------------------------------------------------------------------

}
