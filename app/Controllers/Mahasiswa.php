<?php

namespace App\Controllers;

use App\Models\Model_mahasiswa;
use App\Models\Model_pengajuanjudulmhs;

class Mahasiswa extends BaseController
{
	protected $pengajuan_mhs;
	protected $data_mhs;

	// jika model ingin dipakai banyak method, buat contruct

	public function __construct()
	{
		$this->pengajuan_mhs = new Model_pengajuanjudulmhs();
		$this->data_mhs = new Model_mahasiswa();
	}


	public function index()
	{
		return view('mahasiswa/profil/profil');
	}
	public function showprofil()
	{
		// $session = session();
		// echo "Welcome back, ".$session->get('user_id');
		return view('mahasiswa/profil/profil');
	}
	// ---------------------------------------
	public function pengajuan_judul()
	{
		// $session = session();
		// echo "Welcome back, ".$session->get('username');
		return view('mahasiswa/pengajuan_judul/pengajuanjudul');
	}
	public function ambildata()
	{
		$session = session();
		$id = $session->get('user_id');
		if ($this->request->isAJAX()) {
			$data = [
				'tampildata' => $this->pengajuan_mhs->get_pengajuanjudul($id)
			];
			$msg = [
				'data' => view('mahasiswa/pengajuan_judul/v_data/data_pengajuanjudul', $data)
			];

			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}
	// ---------------------------------------
	public function bimbingan_proposal()
	{
		return view('mahasiswa/bimbingan_proposal/bimbinganproposal');
	}
	public function pengajuan_sempro()
	{
		return view('mahasiswa/pengajuan_sempro/pengajuansempro');
	}
	public function Sidang_ta()
	{
		return view('mahasiswa/sidang/sidang');
	}
	public function Seminar()
	{
		return view('mahasiswa/sempro/sempro');
	}
	public function profil()
	{
		$session = session();
		$id = $session->get('user_id');
		if ($this->request->isAJAX()) {
			$data = [
				'tampildata' => $this->data_mhs->get_mahasiswa($id)
			];
			$msg = [
				'data' => view('mahasiswa/profil/v_data/data_profil', $data)
			];

			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}
	public function history_bimbingan()
	{
		return view('mahasiswa/bimbingan_proposal/history_bimbingan');
	}



	//--------------------------------------------------------------------

}
