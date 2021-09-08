<?php

namespace App\Controllers;

use App\Models\DosenpengujiModel;
use App\Models\dosen_pengujimodel;
use App\Models\dosen_sempromodel;
use App\Models\dosen_sidangtamodel;

class DosenPenguji extends BaseController
{

	protected $data_dsnpenguji;
	protected $penguji;
	protected $sempromodel;
	protected $sidangtamodel;

	public function __construct()
	{
		$session = session();
		$this->id = $session->get('user_id');
		$this->db = \Config\Database::connect();
		$this->validasi = \Config\Services::validation();
		$this->data_dsnpenguji = new DosenpengujiModel();
		$this->data_jadwalsempro = new DosenpengujiModel();
		$this->data_jadwalsidangta = new DosenpengujiModel();
		$this->penguji = new dosen_pengujimodel();
		$this->sempromodel = new dosen_sempromodel();
		$this->sidangtamodel = new dosen_sidangtamodel();
	}
	//-------------------- BAGIAN PROFIL--------------------------
	public function index()
	{
		return view('dosenpenguji/profil/index');
	}
	public function profil()
	{
		if ($this->request->isAJAX()) {
			$data = [

				'tampildata' => $this->data_dsnpenguji->get_profil_datadosenpenguji($this->id)

			];
			$msg = [
				'data' => view('dosenpenguji/profil/v_data/datapenguji', $data)
			];

			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}
	//------------------ JADWAL UJI------------------------------------------
	public function jadwalsempro()
	{
		return view('dosenpenguji/jadwalsempro/uji');
	}
	public function jadwalsemprodsn()
	{
		$session = session();
		$data = $session->get('user_id');
		if ($this->request->isAJAX()) {
			$data = [
				'tampildatauji1' => $this->data_jadwalsempro->get_jadwalseminar1($data),
				'tampildatauji2' => $this->data_jadwalsempro->get_jadwalseminar2($data)
			];
			$msg = [
				'data' => view('dosenpenguji/jadwalsempro/v_data/jadwalseminar', $data),
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

		// ini untuk tabel dosen_penguji dengan id_dosen penguji ke ..
		$dospeng = $this->penguji->get_status_penguji($dat);
		$status_dospeng = $dospeng['0']['id_dosenpenguji'];

		// ini untuk tabel Penjadwalan_sidang dengan id penguji_1 ke ..
		$dospeng1 = $this->penguji->get_data_penguji_1($dat);
		// dd($status_dospeng);
		// ini untuk tabel Penjadwalan_sidang dengan id penguji_2 ke ..
		$dospeng2 = $this->penguji->get_data_penguji_2($dat);


		$data = [
			'sempro' => $this->sempromodel->get_seminarproposal($data),
			'status_dospeng' => $status_dospeng,

		];




		return view('dosenpenguji/jadwalsempro/tabelpenilaian', $data);
	}

	public function updatesempro($id)
	{
		// dd($this->request->getVar());

		$session = session();
		$dat = $session->get('user_id');

		$dospeng = $this->penguji->get_status_penguji($dat);
		$status_dospeng = $dospeng['0']['id_dosenpenguji'];



		$this->db->transStart();
		// ini untuk tabel Penjadwalan_sidang dengan id penguji_1 ke ..
		$dospeng1 = $this->penguji->get_data_penguji_1($dat);
		// dd($status_dospeng);
		// ini untuk tabel Penjadwalan_sidang dengan id penguji_2 ke ..
		$dospeng2 = $this->penguji->get_data_penguji_2($dat);


		if ($this->request->getVar('rolepenguji') == 'penguji 1') {
			$this->sempromodel->save([
				'id_seminar' => $id,
				'nilai_penguji_1' => $this->request->getVar('nilai'),
				'catatan_penguji_1' => $this->request->getVar('catatan'),
				'status' => $this->request->getVar('status'),


			]);
		} elseif ($this->request->getVar('rolepenguji') == 'penguji 2') {
			$this->sempromodel->save([
				'id_seminar' => $id,
				'nilai_penguji_2' => $this->request->getVar('nilai'),
				'catatan_penguji_2' => $this->request->getVar('catatan'),
				'status' => $this->request->getVar('status'),


			]);
		}

		$this->db->transComplete();
		session()->setFlashdata('pesan', 'data berhasil di tambah');


		return redirect()->to('/dosenpenguji/jadwalsempro');
	}

	//=======================================================================
	public function jadwalsidangta()
	{
		return view('dosenpenguji/jadwalsidangta/datajadwalsidang');
	}
	public function jadwalsidangdsn()
	{
		$session = session();
		$data = $session->get('user_id');
		if ($this->request->isAJAX()) {
			$data = [
				'tampildatauji1' => $this->data_jadwalsidangta->get_jadwalsidangta1($data),
				'tampildatauji2' => $this->data_jadwalsidangta->get_jadwalsidangta2($data)
			];
			$msg = [
				'data' => view('dosenpenguji/jadwalsidangta/v_data/datasidangta', $data),
			];

			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}



	public function penilaiansidangta($data)
	{
		$session = session();
		$dat = $session->get('user_id');

		// ini untuk tabel dosen_penguji dengan id_dosen penguji ke ..
		$dospeng = $this->penguji->get_status_penguji($dat);
		$status_dospeng = $dospeng['0']['id_dosenpenguji'];


		$data = [
			'sidangta' => $this->sidangtamodel->get_sidangta($data),
			'status_dospeng' => $status_dospeng,

		];


		return view('dosenpenguji/jadwalsidangta/formpenilaian', $data);
	}

	public function updatesidangta($id)
	{
		// dd($this->request->getVar());

		$session = session();
		$dat = $session->get('user_id');

		$dospeng = $this->penguji->get_status_penguji($dat);
		$status_dospeng = $dospeng['0']['id_dosenpenguji'];



		$this->db->transStart();
		// ini untuk tabel Penjadwalan_sidang dengan id penguji_1 ke ..
		$dospeng1 = $this->penguji->get_data_penguji_1($dat);
		// dd($status_dospeng);
		// ini untuk tabel Penjadwalan_sidang dengan id penguji_2 ke ..
		$dospeng2 = $this->penguji->get_data_penguji_2($dat);


		if ($this->request->getVar('rolepenguji') == 'penguji 1') {
			$this->sidangtamodel->save([
				'id_sidangta' => $id,
				'nilai_penguji_1_ta' => $this->request->getVar('nilai'),
				'catatan_penguji_1_ta' => $this->request->getVar('catatan'),
				'status_ta' => $this->request->getVar('status'),


			]);
		} elseif ($this->request->getVar('rolepenguji') == 'penguji 2') {
			$this->sidangtamodel->save([
				'id_sidangta' => $id,
				'nilai_penguji_2_ta' => $this->request->getVar('nilai'),
				'catatan_penguji_2_ta' => $this->request->getVar('catatan'),
				'status_ta' => $this->request->getVar('status'),


			]);
		}

		$this->db->transComplete();
		session()->setFlashdata('pesan', 'data berhasil di tambah');


		return redirect()->to('/dosenpenguji/jadwalsidangta');
	}
}
