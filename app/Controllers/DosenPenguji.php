<?php

namespace App\Controllers;

use App\Models\DosenpengujiModel;

class DosenPenguji extends BaseController
{

	protected $data_dsnpenguji;

	public function __construct()
	{
		$session = session();
		$this->id = $session->get('user_id');
		$this->validasi = \Config\Services::validation();
		$this->data_dsnpenguji = new DosenpengujiModel();
		$this->data_jadwalsempro = new DosenpengujiModel();
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
	public function jadwaluji()
	{
		return view('dosenpenguji/jadwaluji/jadwaluji');
	}
	public function jadwalujidsn()
	{
		$session = session();
		$data = $session->get('user_id');
		if ($this->request->isAJAX()) {
			$data = [
			'tampildatauji1' => $this->data_jadwalsempro->get_jadwalseminar1($data),
			'tampildataduji2' => $this->data_jadwalsempro->get_jadwalseminar2($data)
			];
			$msg = [
				'data' => view('dosenpenguji/jadwaluji/jadwalseminar', $data),
			];

			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}

//=======================================================================

	public function detailberita()
	{
		return view('dosenpenguji/detailberita');
	}
}