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
		$this->proposal = new dosenModel();
		$this->tugasakhir = new dosenModel();
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
				'tampildatadsn' => $this->judul->get_pengajuanjudul1($data),
				'tampildatadsn2' => $this->judul->get_pengajuanjudul2($data)
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

	//==================================PROPOSAL====================================================
	public function proposal()
	{
		$data = [
			'title' => 'Dosen | Proposal'
		];
		return view('dosen/proposal/proposal', $data);
	}

	public function get_proposal()
	{
		$session = session();
		$data = $session->get('user_id');
		if ($this->request->isAJAX()) {
			$data = [
				'tampildatadsn' => $this->proposal->get_proposal1($data),
				'tampildatadsn2' => $this->proposal->get_proposal2($data)
			];
			$msg = [
				'data' => view('dosen/proposal/v_data/datapengajuanprop', $data)
			];

			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}
	 public function bimbinganproposal()
	 {
	 	return view('dosen/proposal/tabelbimbinganprop');
	 }
	 	
	// public function bimbinganproposal()
	// {
	// 	$session = session();
	// 	$data = $session->get('user_id');
	// 	if ($this->request->isAJAX()) {
	// 		$data = [
	// 			'tampildatadsn' => $this->proposal->get_proposal1($data),
	// 			'tampildatadsn2' => $this->proposal->get_proposal2($data)
	// 		];
	// 		$msg = [
	// 			'data' => view('dosen/proposal/tabelbimbinganprop', $data)
	// 		];

	// 		echo json_encode($msg);
	// 	} else {
	// 		exit('Maaf tidak dapat diproses');
	// 	}

	//}

	//================================== AKHIR PROPOSAL ====================================================
	public function tugasakhir()
	{
		$data = [
			'title' => 'Dosen | Tugas Akhir'
		];
		return view('dosen/tugasakhir/tugasakhir', $data);
	}

	public function get_tugasakhir()
	{
		$session = session();
		$data = $session->get('user_id');
		if ($this->request->isAJAX()) {
			$data = [
				'tampildatadsn' => $this->tugasakhir->datatugasakhir1($data),
				'tampildatadsn2' => $this->tugasakhir->datatugasakhir2($data)
			];
			$msg = [
				'data' => view('dosen/tugasakhir/v_data/datatugasakhir', $data)
			];

			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}
	//=========================================================================================

	public function tabelbimbingan()
	{


		$data = [
			'title' => 'Dosen | Bimbingan',
			
		];

		return view('dosen/tabelbimbingan', $data);
	}



	//--------------------------------------------------------------------

}
