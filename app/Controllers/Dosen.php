<?php

namespace App\Controllers;


class Dosen extends BaseController
{
	public function index()
	{
		$dosenModel = new \App\Models\dosenModel();
		$datadosenta = $dosenModel->get_dosen_tugasakhir();

		$data = [

			'datadosenta' => $datadosenta,

		];
		return view('dosen/index', $data);
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
