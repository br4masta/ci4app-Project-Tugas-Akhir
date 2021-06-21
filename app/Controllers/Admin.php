<?php

namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
		return view('admin/Data Pengajuan Judul/Pengajuan Judul');
	}

	public function Profil()
	{
		return view('admin/profil/profil');
	}

	public function pengajuan()
	{
		return view('admin/Data Pengajuan Judul/Pengajuan Judul');
	}

	public function seminar()
	{
		return view('admin/pendjadwalan/Seminar Proposal');
	}
	public function skripsi()
	{
		return view('admin/pendjadwalan/Skripsi');
	}
	public function Berita()
	{
		return view('admin/Data Berita/Data Berita');
	}

	public function detailberita()
	{
		return view('admin/Data Berita/Detail Data Berita');
	}
	public function editskripsi()
	{
		return view('admin/pendjadwalan/Edit Skripsi');
	}
	public function editseminar()
	{
		return view('admin/pendjadwalan/Edit Seminar Proposal');
	}

	public function detailseminar()
	{
		return view('admin/pendjadwalan/Detail Seminar Proposal');
	}
	public function detailskripsi()
	{
		return view('admin/pendjadwalan/Detail Skripsi');
	}
	public function datadosenta()
	{
		return view('admin/Data pembagian dosen/Data Dosen Tugas Akhir');
	}
	public function datadosenpenguji()
	{
		return view('admin/Data pembagian dosen/Data Dosen Penguji');
	}


	public function datadosenpembimbing()
	{
		return view('admin/Data pembagian dosen/Data Dosen Pembimbing');
	}

	public function detaildatadosenpembimbing()
	{
		return view('admin/Data pembagian dosen/Detail Data Dosen Pembimbing');
	}

	public function Dataakademik()
	{
		return view('admin/Data Akademik/Data Akademik');
	}

	public function Datadosen()
	{
		return view('admin/Data dosen/Data dosen');
	}
	public function tambahdatadosen()
	{
		return view('admin/Data Dosen/Tambah Data Dosen');
	}

	public function editdatadosen()
	{
		return view('admin/Data Dosen/Edit Data Dosen');
	}
	//--------------------------------------------------------------------

}
