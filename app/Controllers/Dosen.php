<?php

namespace App\Controllers;

use App\Models\dosenModel;
use App\Models\dosen_pengajuanjudul;
use App\Models\dosen_pembimbingmodel;
use App\Models\dosen_bimbinganmodel;
use App\Models\DospemJadwalModel;
use App\Models\dosen_sempromodel;
use phpDocumentor\Reflection\Types\This;

class Dosen extends BaseController
{
	protected $data_dsn;
	protected $judul;
	protected $pengajuanjudul;
	protected $pembimbingmodel;
	protected $bimbinganmodel;
	protected $sempromodel;

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
		$this->bimbinganprop = new dosenModel();
		$this->bimbinganmodel = new dosen_bimbinganmodel();
		$this->bimbinganta = new dosenModel();
		$this->data_jadwalsempro = new DospemJadwalModel();
		$this->data_jadwalta = new DospemJadwalModel();
		$this->sempromodel = new dosen_sempromodel();
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
		$session = session();
		$dat = $session->get('user_id');

		$dospem = $this->pembimbingmodel->get_status_pembimbing($dat);
		$status_dospem = $dospem['0']['role_pembimbing'];
		// dd($dospem['0']['role_pembimbing']);

		$data = [
			'title' => 'Detail | Pengajuan',
			'data' => $this->pengajuanjudul->get_pengajuanjudul($id),
			'status_dospem' => $status_dospem,
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
				'catatan_pembimbing_1' => $this->request->getVar('catatan'),

			]);
		} elseif ($status_dospem == 'dosen pembimbing II') {

			$this->pengajuanjudul->save([
				'id_pengajuan'	=> $id,
				'konfirmasi_pembimbing_2' => $this->request->getVar('konfirmasi'),
				'catatan_pembimbing_2' => $this->request->getVar('catatan'),

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
	public function bimbinganproposal($id)
	{
		$session = session();
		$dat = $session->get('user_id');

		$dospem = $this->pembimbingmodel->get_status_pembimbing($dat);
		$status_dospem = $dospem['0']['role_pembimbing'];
		// dd($status_dospem);
		if ($status_dospem == 'dosen pembimbing I') {
			$data = [
				'tampildata_bimbingan' => $this->bimbinganprop->get_detailproposal($id),
				'status_dospem' => $status_dospem
			];
		} elseif ($status_dospem == 'dosen pembimbing II') {
			$data = [
				'tampildata_bimbingan' => $this->bimbinganprop->get_detailproposal2($id),
				'status_dospem' => $status_dospem
			];
		}
		// dd($data['tampildata_bimbingan']);
		return view('dosen/proposal/tabelbimbinganprop', $data);
	}
	public function updateproposal($id)
	{

		// ambil id pengajuan untuk kembali ke bimbinnganproposal($id)
		$id_pengajuan = $this->request->getVar('id_pengajuan');
		// -------
		$session = session();
		$dat = $session->get('user_id');

		$dospem = $this->pembimbingmodel->get_status_pembimbing($dat);
		$status_dospem = $dospem['0']['role_pembimbing'];


		$this->db->transStart();
		if ($status_dospem == 'dosen pembimbing I') {

			$this->bimbinganmodel->save([
				'id_bimbingan'	=> $id,
				'status_bimbingan_pembimbing1' => $this->request->getVar('statuspembimbing'),
				'catatan_bimbingan_pembimbing1' => $this->request->getVar('catatan'),

			]);
		} elseif ($status_dospem == 'dosen pembimbing II') {

			$this->bimbinganmodel->save([
				'id_bimbingan'	=> $id,
				'status_bimbingan_pembimbing2' => $this->request->getVar('statuspembimbing'),
				'catatan_bimbingan_pembimbing2' => $this->request->getVar('catatan'),

			]);
		}
		$this->db->transComplete();
		session()->setFlashdata('pesan', 'data berhasil di ubah');

		return redirect()->to("/dosen/bimbinganproposal/$id_pengajuan");
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
	public function get_judultugasakhir()
	{
		$session = session();
		$data = $session->get('user_id');
		if ($this->request->isAJAX()) {
			$data = [
				'tampildatajudul' => $this->proposal->get_proposal1($data),
				'tampildatajudul2' => $this->proposal->get_proposal2($data)
			];
			$msg = [
				'data' => view('dosen/tugasakhir/v_data/datatugasakhir', $data)
			];

			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}

	public function get_tugasakhir($id)
	{
		$session = session();
		$dat = $session->get('user_id');

		$dospem = $this->pembimbingmodel->get_status_pembimbing($dat);
		$status_dospem = $dospem['0']['role_pembimbing'];
		// dd($status_dospem);
		if ($status_dospem == 'dosen pembimbing I') {
			$data = [
				'tampildata_bimbingan' => $this->bimbinganta->datatugasakhir1($id),
				'status_dospem' => $status_dospem
			];
		} elseif ($status_dospem == 'dosen pembimbing II') {
			$data = [
				'tampildata_bimbingan' => $this->bimbinganta->datatugasakhir2($id),
				'status_dospem' => $status_dospem
			];
		}
		// dd($data['tampildata_bimbingan']);
		return view('dosen/tugasakhir/tabelbimbinganta', $data);
	}
	//=========================================================================================
	//========================== TABEL JADWAL SEMPRO =============================================

	public function jadwalsempro()
	{
		$data = [
			'title' => 'Dosen | Jadwal Seminar Proposal'
		];
		return view('dosen/jadwalsempro/jadwalsempro', $data);
	}

	public function jadwalujisempro()
	{
		$session = session();
		$data = $session->get('user_id');
		if ($this->request->isAJAX()) {
			$data = [
				'tampildatauji1' => $this->data_jadwalsempro->get_jadwalseminar1pem($data),
				'tampildatauji2' => $this->data_jadwalsempro->get_jadwalseminar2pem($data)
			];
			$msg = [
				'data' => view('dosen/jadwalsempro/v_data/datajadwal', $data),
			];

			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}

	public function penilaiansempro($data)
	{
		$session = session();
		$dat = $session->get('user_id');

		$dospem = $this->pembimbingmodel->get_status_pembimbing($dat);
		$status_dospem = $dospem['0']['role_pembimbing'];

		$data = [
			'sempro' => $this->sempromodel->get_seminarproposal($data),
			'status_dospem' => $status_dospem,
		];
		return view('dosen/jadwalsempro/tabelpenilaian', $data);
	}

	public function updatesempro($id)
	{
		// dd($this->request->getVar());

		$session = session();
		$dat = $session->get('user_id');

		$dospem = $this->pembimbingmodel->get_status_pembimbing($dat);
		$status_dospem = $dospem['0']['role_pembimbing'];


		$this->db->transStart();
		if ($status_dospem == 'dosen pembimbing I') {

			$this->sempromodel->save([
				'id_seminar' => $id,
				'nilai_pembimbing_1' => $this->request->getVar('nilai'),
				'catatan_pembimbing_1' => $this->request->getVar('catatan'),
				'status' => $this->request->getVar('status'),


			]);
		} elseif ($status_dospem == 'dosen pembimbing II') {

			$this->sempromodel->save([
				'id_seminar' => $id,
				'nilai_pembimbing_2' => $this->request->getVar('nilai'),
				'catatan_pembimbing_2' => $this->request->getVar('catatan'),
				'status' => $this->request->getVar('status'),


			]);
		}
		$this->db->transComplete();
		session()->setFlashdata('pesan', 'data berhasil di tambah');


		return redirect()->to('/dosen/jadwalsempro');
	}

	//--------------------------------------------------------------------
	//======================== TABEL JADWAL SIDANG TA ===============================
	public function jadwalta()
	{
		$data = [
			'title' => 'Dosen | Jadwal Seminar Proposal'
		];
		return view('dosen/jadwalsidangta/jadwalsidangta', $data);
	}

	public function jadwalsidangta()
	{
		$session = session();
		$data = $session->get('user_id');
		if ($this->request->isAJAX()) {
			$data = [
				'tampildatauji1' => $this->data_jadwalta->get_jadwalsidangta1pem($data),
				'tampildatauji2' => $this->data_jadwalta->get_jadwalsidangta2pem($data)
			];
			$msg = [
				'data' => view('dosen/jadwalsidangta/v_data/datajadwal', $data),
			];

			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}
}
