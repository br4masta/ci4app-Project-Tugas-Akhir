<?php

namespace App\Controllers;

class Dosen extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Dosen | Data Diri'
		];
		echo view('dosen/index', $data);
	}

	public function judul()
	{
		$data = [
			'title' => 'Dosen | Data Judul'
		];
		echo view('dosen/judul', $data);
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

	//--------------------------------------------------------------------

}
