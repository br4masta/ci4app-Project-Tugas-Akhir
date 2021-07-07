<?php

namespace App\Controllers;

use App\Models\Model_bimbinganmhs;
use App\Models\Model_mahasiswa;
use App\Models\Model_pengajuanjudulmhs;
use App\Models\Model_pengajuansempro;
use App\Models\Model_sempro;
use App\Models\Model_sidang_TA;

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
		$this->bimbingan_mhs = new Model_bimbinganmhs();
		$this->sempro = new Model_pengajuansempro();
		$this->sempro2 = new Model_sempro();
		$this->sidang_tugasakhir1 = new Model_sidang_TA();
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

				$dataBerkas->move('assets/img/File', $nama_judul . '.' . $dataBerkas->getExtension());
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

	// --------------------BAGIAN DATA BIMBINGAN-------------------------
	public function ambildatabimbingan()
	{
		if ($this->request->isAJAX()) {
			$data = [
				'tampildata' => $this->bimbingan_mhs->get_bimbinganmhs($this->id)
			];
			$msg = [
				'data' => view('mahasiswa/bimbingan_proposal/v_data/data_bimbinganmhs', $data)
			];
			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}

	public function detaildatabimbingan($id)
	{
		$data1 = [
			'tampildatabimbingan' => $this->bimbingan_mhs->get_idbimbingan($id),
			'id_ok' => $id
		];

		return view('mahasiswa/bimbingan_proposal/v_data/history_bimbingan', $data1);
	}

	public function formtambahbimbingan($id)
	{
		if ($this->request->isAJAX()) {
			$msg = [
				'data' => view('mahasiswa/bimbingan_proposal/v_data/modaltambah', ['id' => $id])
			];

			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}
	public function simpandatabimbingan()
	{
		if ($this->request->isAJAX()) {

			$nama_bimbingan = $this->request->getVar('judul');
			$validation = \Config\Services::validation();

			$valid = $this->validate([
				'judul' => [
					'label' => 'Judul Mahasiswa',
					'rules' => 'required|is_unique[bimbingan.judul_bimbingan]',
					'errors' => [
						'required' =>  '{field} tidak boleh kosong',
					]
				],
				'deskripsi' => [
					'label' => 'Deskripsi Mahasiswa',
					'rules' => 'required|is_unique[bimbingan.deskripsi_bimbingan]',
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
					'id_pengajuan' => $this->request->getVar('id_pengajuan'),
					'deskripsi_bimbingan' => $this->request->getVar('deskripsi'),
					'judul_bimbingan' => $this->request->getVar('judul'),
					'berkas_bimbingan' => $fileName,
				];

				$dataBerkas->move('assets/img/File', $nama_bimbingan . '.' . $dataBerkas->getExtension());
				$this->bimbingan_mhs->insert_bimbingan($data);

				$msg = [
					'sukses' => 'Data mahasiswa berhasil disimpan'
				];
			}
			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}

	public function bimbingan_proposal()
	{
		return view('mahasiswa/bimbingan_proposal/bimbinganproposal');
	}

	//------------------------------END BIMBINGAN---------------------------------------------

	//------------------------------BAGIAN PENGAJUAN SEMPRO---------------------------------------------
	public function ambildatasempro()
	{
		if ($this->request->isAJAX()) {
			$data = [
				'tampildata' => $this->sempro->get_pengajuan_sempro($this->id)
			];
			$msg = [
				'data' => view('mahasiswa/pengajuan_sempro/v_data/data_pengajuansempro', $data)
			];
			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}

	public function formtambahsempro()
	{
		if ($this->request->isAJAX()) {
			$msg = [
				'data' => view('mahasiswa/pengajuan_sempro/v_data/modal_tambah')
			];

			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}
	public function simpandatapengajuansempro()
	{
		if ($this->request->isAJAX()) {

			$nama_judul = $this->request->getVar('judul');
			$validation = \Config\Services::validation();

			$valid = $this->validate([
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
						'berkas'    => $validation->getError('berkas')
					]
				];
			} else {
				$dataBerkas = $this->request->getFile('berkas');
				$fileName = $dataBerkas->getRandomName();
				$data = [
					'id_bimbingan' => $this->request->getVar('id_bimbingan'),
					'berkas_proposal' => $fileName,
				];

				$dataBerkas->move('assets/img/File', $nama_judul . '.' . $dataBerkas->getExtension());
				$this->sempro->insert_pengajuan_sempro($data);

				$msg = [
					'sukses' => 'Data mahasiswa berhasil disimpan'
				];
			}
			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}

	public function pengajuan_sempro()
	{
		return view('mahasiswa/pengajuan_sempro/pengajuansempro');
	}

    //------------------END BAGIAN PENGAJUAN SEMPRO-----------------------

	//------------------BAGIAN SIDANG TA-----------------------
	public function ambildatasidang()
	{
		if ($this->request->isAJAX()) {
			$data = [
				'tampildata' => $this->sidang_tugasakhir1->get_sidang_ta($this->id)
			];
			$msg = [
				'data' => view('mahasiswa/sidang/v_data/data_sidang_ta', $data)
			];
			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}
	public function Sidang_ta()
	{
		return view('mahasiswa/sidang/sidang');
	}
	//------------------END BAGIAN SIDANG TA-----------------------
    
	//------------------BAGIAN SEMPRO-----------------------
	public function Seminar()
	{
		return view('mahasiswa/sempro/sempro');
	}

	public function detaildatabimbinganta($id)
	{
		$data1 = [
			'tampildatabimbingan' => $this->sempro2->get_idbimbinganta($id),
			'id_ok1' => $id
		];

		return view('mahasiswa/sempro/v_data/data_bimbingan', $data1);
	}

	public function formtambahbimbinganta($id)
	{
		if ($this->request->isAJAX()) {
			$msg = [
				'data' => view('mahasiswa/sempro/v_data/modaltambah', ['id' => $id])
			];

			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}

	public function simpandatabimbinganta()
	{
		if ($this->request->isAJAX()) {

			$nama_bimbingan = $this->request->getVar('judul');
			$validation = \Config\Services::validation();

			$valid = $this->validate([
				'judul' => [
					'label' => 'Judul Bimbingan TA',
					'rules' => 'required|is_unique[bimbingan_ta.judul_bimbingan_ta]',
					'errors' => [
						'required' =>  '{field} tidak boleh kosong',
					]
				],
				'berkas' => [
					'label' => 'Berkas Bimbingan TA Mahasiswa',
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
						'berkas'    => $validation->getError('berkas')
					]
				];
			} else {
				$dataBerkas = $this->request->getFile('berkas');
				$fileName = $dataBerkas->getRandomName();
				$data = [
					'id_seminar' => $this->request->getVar('id_seminar'),
					'judul_bimbingan_ta' => $this->request->getVar('judul'),
					'berkas_bimbingan_ta' => $fileName,
				];

				$dataBerkas->move('assets/img/File', $nama_bimbingan . '.' . $dataBerkas->getExtension());
				$this->sempro2->insert_bimbingan_ta($data);

				$msg = [
					'sukses' => 'Data mahasiswa berhasil disimpan'
				];
			}
			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}

	public function ambildataseminar()
	{
		if ($this->request->isAJAX()) {
			$data = [
				'tampildata' => $this->sempro2->get_ambil_sempro($this->id)
			];
			$msg = [
				'data' => view('mahasiswa/sempro/v_data/data_sempro', $data)
			];
			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}
	//------------------END BAGIAN SEMPRO-----------------------


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
