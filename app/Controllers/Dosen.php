<?php

namespace App\Controllers;

class Dosen extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Dosen | Data Diri'
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

	//Dosen Penguji
	public function dospeng()
	{
		return view('dospeng/index');
	}



	//--------------------------------------------------------------------

}
