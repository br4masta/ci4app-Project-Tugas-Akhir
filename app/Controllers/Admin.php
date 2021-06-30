<?php

namespace App\Controllers;

// use App\Models\pembimbingModel;

class Admin extends BaseController
{
	// protected $pembimbingModel;
	// public function __construct()
	// {
	// 	$this->pembimbingmodel = new pembimbingModel();
	// }

	public function index()
	{
		$pengajuanModel = new \App\Models\pengajuanModel();
		$pengajuan_judul = $pengajuanModel->get_pengajuan();
		$pengajuan_judul2 = $pengajuanModel->get_pengajuan2();
		$data = [

			'datajudul' => $pengajuan_judul,
			'datajudul2' => $pengajuan_judul2,

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
		$pengajuan_judul2 = $pengajuanModel->get_pengajuan2();
		$data = [

			'datajudul' => $pengajuan_judul,
			'datajudul2' => $pengajuan_judul2,


		];

		return view('admin/Data Pengajuan Judul/Pengajuan Judul', $data);
	}

	public function jadwalseminar()
	{


		$penjadwalanModel = new \App\Models\penjadwalanModel();
		$penjadwalan = $penjadwalanModel->get_jadwalseminar();
		$penjadwalan2 = $penjadwalanModel->get_jadwalseminar2();


		$data = [

			'jadwal' => $penjadwalan,
			'jadwal2' => $penjadwalan2,



		];
		return view('admin/pendjadwalan/Seminar Proposal', $data);
	}
	public function jadwalskripsi()
	{
		$penjadwalanModel = new \App\Models\penjadwalanModel();
		$penjadwalan = $penjadwalanModel->get_jadwalsidangta();
		$penjadwalan2 = $penjadwalanModel->get_jadwalsidangta2();



		$data = [

			'jadwal' => $penjadwalan,
			'jadwal2' => $penjadwalan2,



		];
		return view('admin/pendjadwalan/Skripsi', $data);
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
		return view('admin/Data Berita/Data Berita', $data);
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
		$dosenModel = new \App\Models\dosenModel();
		$datadosenta = $dosenModel->get_dosen_tugasakhir();

		$data = [

			'datadosenta' => $datadosenta,


		];
		return view('admin/Data pembagian dosen/Data Dosen Tugas Akhir', $data);
	}
	public function datadosenpenguji()
	{
		$dosenModel = new \App\Models\dosenModel();
		$datapenguji = $dosenModel->get_penguji();

		$data = [

			'datapenguji' => $datapenguji,


		];
		return view('admin/Data pembagian dosen/Data Dosen Penguji', $data);
	}


	public function datadosenpembimbing()
	{
		$dosenModel = new \App\Models\dosenModel();
		$datapembimbing = $dosenModel->get_pembimbing();

		$data = [

			'datapembimbing' => $datapembimbing,


		];
		return view('admin/Data pembagian dosen/Data Dosen Pembimbing', $data);
	}

	public function detaildatadosenpembimbing($data)
	{
		$dosen = new \App\Models\admin_bimbinganmodel();
		// $dosenpembimbing = $dosen->get_bimbingan_pembimbing1($data);
		// $dosenpembimbing2 = $dosen->get_bimbingan_pembimbing2($data);
		// $pembimbing = $dosenpembimbing->where(['id_dosenpembimbing' => $data])->first();
		// dd($dosenpembimbing, $dosenpembimbing2);

		$data = [

			'data1' => $dosen->get_bimbingan_pembimbing1($data),
			'data2' => $dosen->get_bimbingan_pembimbing2($data),


		];
		return view('admin/Data pembagian dosen/detail Data dosen pembimbing', $data);
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
		$datadosen = $dosenModel->get_dosen();

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
