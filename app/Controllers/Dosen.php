<?php

namespace App\Controllers;

use App\Models\dosenModel;
use App\Models\dosen_pengajuanjudul;
use App\Models\dosen_pembimbingmodel;
use phpDocumentor\Reflection\Types\This;

class Dosen extends BaseController
{
	protected $data_dsn;
	protected $judul;
	protected $pengajuanjudul;
	protected $pembimbingmodel;

	// jika model ingin dipakai banyak method, buat construct

	public function __construct()
	{

		$session = session();
		$this->id = $session->get('user_id');
		$this->db = \Config\Database::connect();
		$this->validasi = \Config\Services::validation();
		$this->data_dsn = new dosenModel();
		$this->judul = new dosenModel();
		$this->pengajuanjudul = new dosen_pengajuanjudul();
		$this->pembimbingmodel = new dosen_pembimbingmodel();
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
	//------------------BAGIAN PENGAJUAN JUDUL ----------------------- 
	public function judul()
	{
		$data = [
			'title' => 'Dosen | Data Judul'
		];
		return view('dosen/pengajuanjudul/judul', $data);
	}

	public function ambildatajudul()
	{
		$session = session();
		$data = $session->get('user_id');
		if ($this->request->isAJAX()) {
			$data = [
				'tampildatadsn' => $this->judul->get_bimbingan_pembimbing1($data),
				'tampildatadsn2' => $this->judul->get_bimbingan_pembimbing2($data)
			];
			$msg = [
				'data' => view('dosen/pengajuanjudul/v_data/datapengajuanjudul', $data),
			];

			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}


	public function editpengajuan($id)
	{
		// $session = session();
		// $dat = $session->get('user_id');

		// $dospem = $this->pembimbingmodel->get_status_pembimbing($dat);
		// $status_dospem = $dospem['0']['role_pembimbing'];
		// dd($dospem['0']['role_pembimbing']);

		$data = [
			'title' => 'Detail | Pengajuan',
			'data' => $this->pengajuanjudul->get_pengajuanjudul($id)
		];

		return view('dosen/pengajuanjudul/editpengajuan', $data);
	}

	public function updatepengajuan($id)
	{
		// dd($this->request->getVar());
		$session = session();
		$dat = $session->get('user_id');

		$dospem = $this->pembimbingmodel->get_status_pembimbing($dat);
		$status_dospem = $dospem['0']['role_pembimbing'];


		$this->db->transStart();
		if ($status_dospem == 'dosen pembimbing I') {

			$this->pengajuanjudul->save([
				'id_pengajuan'	=> $id,
				'konfirmasi_pembimbing_1' => $this->request->getVar('konfirmasi'),

			]);
		} elseif ($status_dospem == 'dosen pembimbing II') {

			$this->pengajuanjudul->save([
				'id_pengajuan'	=> $id,
				'konfirmasi_pembimbing_2' => $this->request->getVar('konfirmasi'),

			]);
		}
		$this->db->transComplete();
		session()->setFlashdata('pesan', 'profil berhasil di ubah');

		return redirect()->to('/dosen/judul');
	}


	// -----------------------------------AKHIR JUDUL -----------------------------------------------
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

	public function tabelbimbingan($id)
	{


		$data = [
			'title' => 'Dosen | Bimbingan',
			'data' => $this->pengajuanjudul->get_pengajuanjudul($id)
		];

		return view('dosen/tabelbimbingan', $data);
	}



	//--------------------------------------------------------------------

}
