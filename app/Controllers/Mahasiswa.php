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
		$session = session();
		$this->id = $session->get('user_id');
		$this->validasi = \Config\Services::validation();
		$this->pengajuan_mhs = new Model_pengajuanjudulmhs();
		$this->data_mhs = new Model_mahasiswa();
	}


	public function index()
	{
		return view('mahasiswa/profil/profil');
	}
	//------------------BAGIAN PENGAJUAN JUDUL OKE----------------------- 
	public function pengajuan_judul()
	{
		return view('mahasiswa/pengajuan_judul/pengajuanjudul');
	}

	public function ambildatapengajuan()
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

	public function formtambahpengajuan()
	{
		if ($this->request->isAJAX()) {
			$msg = [
				'data' => view('mahasiswa/pengajuan_judul/v_data/modaltambah')
			];

			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}

	public function simpandatapengajuan()
	{
		if ($this->request->isAJAX()) {

			$nama_judul = $this->request->getVar('judul');
			$validation = \Config\Services::validation();

			$valid = $this->validate([
				'judul' => [
					'label' => 'Judul Mahasiswa',
					'rules' => 'required|is_unique[pengajuan_judul.judul]',
					'errors' => [
						'required' =>  '{field} tidak boleh kosong',
					]
				],
				'deskripsi' => [
					'label' => 'Deskripsi Mahasiswa',
					'rules' => 'required|is_unique[pengajuan_judul.deskripsi]',
					'errors' => [
						'required' =>  '{field} tidak boleh kosong',
					]
				],
				'berkas' => [
					'label' => 'Berkas Judul Mahasiswa',
					'rules' => 'uploaded[berkas]|ext_in[berkas,pdf]|max_size[berkas,2048]',
					'errors' => [
						'uploaded' => 'Harus Ada File yang diupload',
						'max_size' => 'Ukuran File Maksimal 2 MB'
					]
				]
			]);

			if (!$valid) {
				$msg = [
					'error' => [
						'judul'     => $validation->getError('judul'),
						'deskripsi' => $validation->getError('deskripsi'),
						'berkas'    => $validation->getError('berkas')
					]
				];
			} else {	
				$dataBerkas = $this->request->getFile('berkas');
				$fileName = $dataBerkas->getRandomName();			
				$data = [
					'id_mhs' => $this->request->getVar('id_mhs'),
					'judul' => $this->request->getVar('judul'),
					'deskripsi' => $this->request->getVar('deskripsi'),
					'dosenpembimbing1' => $this->request->getVar('dospem1'),
					'dosenpembimbing2' => $this->request->getVar('dospem2'),
					'deskripsi_judul' => $fileName,
				];
				
				$dataBerkas->move('assets/img/File',$nama_judul.'.'.$dataBerkas->getExtension());
				$this->pengajuan_mhs->insert_pengajuan($data);

				$msg = [
					'sukses' => 'Data mahasiswa berhasil disimpan'
				];
			}
			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}
	// --------------------END BAGIAN PENGAJUAN JUDUL---------------------

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

	//------------------BAGIAN DATA PROFIL----------------------- 
	public function showprofil()
	{
		return view('mahasiswa/profil/profil');
	}
	public function profil()
	{

		if ($this->request->isAJAX()) {
			$data = [
				'tampildatadosenmhs' => $this->data_mhs->get_profil_datadosenMhs($this->id),
				'tampildatamhs' => $this->data_mhs->get_profil_dataMhs($this->id)

			];
			$msg = [
				'data' => view('mahasiswa/profil/v_data/data_profil', $data)
			];

			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}
	//-----------------END BAGIAN DATA PROFIL------------------------ 
	public function history_bimbingan()
	{
		return view('mahasiswa/bimbingan_proposal/history_bimbingan');
	}



	//--------------------------------------------------------------------

}
