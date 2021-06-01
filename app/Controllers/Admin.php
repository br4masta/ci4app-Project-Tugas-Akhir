<?php

namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
		return view('admin/Pengajuan Judul');
	}

	public function Profil()
	{
		return view('admin/profil');
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
	public function datadosenta()
	{
		return view('admin/Data Dosen Tugas Akhir');
	}
	public function datadosenpenguji()
	{
		return view('admin/Data Dosen Penguji');
	}


	public function datadosenpembimbing()
	{
		return view('admin/Data Dosen Pembimbing');
	}

	public function detaildatadosenpembimbing()
	{
		return view('admin/Detail Data Dosen Pembimbing');
	}
	//--------------------------------------------------------------------

}
