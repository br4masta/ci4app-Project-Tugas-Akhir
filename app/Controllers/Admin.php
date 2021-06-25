<?php

namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
		$pengajuanModel = new \App\Models\pengajuanModel();
		$pengajuan_judul = $pengajuanModel->get_pengajuan();

		$data = [

			'datajudul' => $pengajuan_judul,


		];
		return view('admin/Data Pengajuan Judul/Pengajuan Judul', $data);
	}

	public function Profil()
	{
		return view('admin/profil/profil');
	}

	public function pengajuan()
	{
		$pengajuanModel = new \App\Models\pengajuanModel();
		$pengajuan_judul = $pengajuanModel->get_pengajuan();

		$data = [

			'datajudul' => $pengajuan_judul,


		];

		return view('admin/Data Pengajuan Judul/Pengajuan Judul', $data);
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
		$dataakademikModel = new \App\Models\dataakademikModel();
		$dataakademik = $dataakademikModel->findAll();

		$data = [

			'dataakademik' => $dataakademik

		];
		return view('admin/Data Akademik/Data Akademik', $data);
	}

	public function Datadosen()
	{
		$dosenModel = new \App\Models\dosenModel();
		$datadosen = $dosenModel->findAll();

		$data = [

			'datadosen' => $datadosen

		];



		return view('admin/Data dosen/Data dosen', $data);
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
