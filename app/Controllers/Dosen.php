<?php

namespace App\Controllers;

use App\Models\dosenModel;

class Dosen extends BaseController
{
	protected $data_dsn;

	// jika model ingin dipakai banyak method, buat construct

	public function __construct()
	{
		$session = session();
		$this->id = $session->get('user_id');
		$this->validasi = \Config\Services::validation();
		$this->data_dsn = new dosenModel();
	}
	// ----------------------BAGIAN PROFIL--------------------------
	public function index()
	{
		return view('dosen/profil/index');
	}
	public function showprofil()
	{
		if ($this->request->isAJAX()) {

			$data = [

				//'datadosenta' => $datadosenta
				'tampildatadosen' => $this->data_dsn->get_profil_datadosenta($this->id)

			];
			$msg = [
				'data' => view('dosen/profil/v_data/data_dosen', $data)
			];

			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}

	public function judul()
	{
		$data = [
			'title' => 'Dosen | Data Judul'
		];
		return view('dosen/judul', $data);
	}

	public function bimbingan()
	{
		$data = [
			'title' => 'Dosen | Bimbingan'
		];
		return view('dosen/bimbingan', $data);
	}
	public function proposal()
	{
		$data = [
			'title' => 'Dosen | Proposal'
		];
		return view('dosen/proposal', $data);
	}
	public function tugasakhir()
	{
		$data = [
			'title' => 'Dosen | Tugas Akhir'
		];
		return view('dosen/tugasakhir', $data);
	}

	public function tabelbimbingan()
	{
		$data = [
			'title' => 'Dosen | Bimbingan'
		];
		return view('dosen/tabelbimbingan', $data);
	}


	//--------------------------------------------------------------------

}
