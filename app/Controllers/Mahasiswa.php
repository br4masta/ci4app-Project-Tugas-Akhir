<?php namespace App\Controllers;

class Mahasiswa extends BaseController
{
	public function index()
	{
		return view('mahasiswa/pengajuan_judul/pengajuanjudul');
	}
	public function pengajuan_judul()
	{
		return view('mahasiswa/pengajuan_judul/pengajuanjudul');
	}
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
	public function Profil()
	{
		return view('mahasiswa/profil/profil');
	}
	
	
	//--------------------------------------------------------------------

}
