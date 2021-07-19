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
		return view('dosenpenguji/jadwaluji');
	}
	public function detailberita()
	{
		return view('dosenpenguji/detailberita');
	}
}