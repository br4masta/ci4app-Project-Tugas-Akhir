<?php

namespace App\Controllers;

class Mahasiswa extends BaseController
{
	public function index()
	{
		return view('mahasiswa/index');
	}
	public function pengajuan_judul()
	{
		return view('mahasiswa/pengajuan_judul');
	}
	public function crudmhs()
	{
		return view('mahasiswa/crudmhs');
	}
	//--------------------------------------------------------------------

}
