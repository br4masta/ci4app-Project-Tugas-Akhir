<?php

namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
		return view('admin/Pengajuan Judul');
	}

	public function pengajuan()
	{
		return view('admin/Pengajuan Judul');
	}

	public function seminar()
	{
		return view('admin/Seminar Proposal');
	}
	public function skripsi()
	{
		return view('admin/Skripsi');
	}
	public function Berita()
	{
		return view('admin/Data Berita');
	}

	public function detailberita()
	{
		return view('admin/Detail Data Berita');
	}
	public function editskripsi()
	{
		return view('admin/Edit Skripsi');
	}
	public function editseminar()
	{
		return view('admin/Edit Seminar Proposal');
	}

	public function detailseminar()
	{
		return view('admin/Detail Seminar Proposal');
	}
	public function detailskripsi()
	{
		return view('admin/Detail Skripsi');
	}
	//--------------------------------------------------------------------

}
