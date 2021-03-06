<?php

namespace App\Controllers;

use App\Models\dosenModel;
use App\Models\dosen_pengajuanjudul;
use App\Models\dosen_pembimbingmodel;
use App\Models\dosen_bimbinganmodel;
use App\Models\dosen_bimbingantamodel;
use App\Models\DospemJadwalModel;
use App\Models\dosen_sempromodel;
use App\Models\dosen_sidangtamodel;
use App\Models\admin_dosenmodel;
use phpDocumentor\Reflection\Types\This;

class Dosen extends BaseController
{
	protected $data_dsn;
	protected $judul;
	protected $pengajuanjudul;
	protected $pembimbingmodel;
	protected $bimbinganmodel;
	protected $bimbingantamodel;
	protected $sempromodel;
	protected $sidangtamodel;
	protected $dosenmodel;

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
		$this->sidangtamodel = new dosen_sidangtamodel();
		$this->bimbingantamodel = new dosen_bimbingantamodel();
		$this->dosenmodel = new admin_dosenmodel();
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

	public function ubahdataprofil()
	{

		session();
		$data = [

			'datadosen' => $this->data_dsn->get_profil_datadosenta($this->id),
			'validation' => \config\Services::validation(),
		];

		return view('dosen/profil/ubahdata', $data);
	}

	public function updatedatadosen($id)
	{

		if (!$this->validate([
			'nidn' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} wajib di isi.',

				]


			],
			'nama' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} wajib di isi.',

				]


			],


			'foto' => [
				'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
				'errors' => [
					// 'uploaded' => 'Pilih Gambar Terlebih Dahulu',
					'max_size' => 'Ukuran Gambar Terlalu besar',
					'is_image' => 'Yang Anda pilih bukan gambar',
					'mime_in' => 'Yang Anda pilih bukan gambar',

				]
				// 
			]

		])) {
			// $validation = \config\Services::validation();
			// return redirect()->to('/admin/tambahdatadosen')->withInput()->with('validation', $validation);
			return redirect()->to("/dosen/showprofil/")->withInput();
		}

		$fileFoto = $this->request->getFile('foto');

		if ($fileFoto->getError() == 4) {
			$foto = $this->request->getVar('fotolama');
		} else {

			// // pindah ke public/img
			$fileFoto->move('img');
			// // 
			$foto = $fileFoto->getName();
			// hapus file yang lama
			unlink('img/' . $this->request->getVar('fotolama'));
		}

		// dd($this->request->getVar());
		$this->db->transStart();

		$this->dosenmodel->save([
			'id_dosen' => $id,
			'nidn_dosen' => $this->request->getVar('nidn'),
			'nama_dosen' => $this->request->getVar('nama'),
			'foto_dosen' => $foto,
			'program_studi_dosen' => $this->request->getVar('program_studi_dosen'),
			'fakultas_dosen' => $this->request->getVar('fakultas_dosen'),



		]);
		$this->db->transComplete();
		session()->setFlashdata('pesanubah', 'data berhasil di ubah');

		return redirect()->to('/dosen/index');
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
		// dd($dospem);
		if ($status_dospem == 'dosen pembimbing I') {
			$data = [
				'tampildata_bimbingan' => $this->bimbinganprop->get_detailproposal($id, $dat),
				'status_dospem' => $status_dospem
			];
		} elseif ($status_dospem == 'dosen pembimbing II') {
			$data = [
				'tampildata_bimbingan' => $this->bimbinganprop->get_detailproposal2($id, $dat),
				'status_dospem' => $status_dospem
			];
		}
		// dd($data);
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
				'tampildata_bimbingan' => $this->bimbinganta->datatugasakhir1($id, $dat),
				'status_dospem' => $status_dospem
			];
		} elseif ($status_dospem == 'dosen pembimbing II') {
			$data = [
				'tampildata_bimbingan' => $this->bimbinganta->datatugasakhir2($id, $dat),
				'status_dospem' => $status_dospem
			];
		}
		// dd($data['tampildata_bimbingan']);
		return view('dosen/tugasakhir/tabelbimbinganta', $data);
	}

	public function updatebimbinganta($id)
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

			$this->bimbingantamodel->save([
				'id_bimbingan_ta'	=> $id,
				'status_bimbingan_pembimbing1_ta' => $this->request->getVar('statuspembimbing'),
				'catatan_bimbingan_pembimbing1_ta' => $this->request->getVar('catatan'),

			]);
		} elseif ($status_dospem == 'dosen pembimbing II') {

			$this->bimbingantamodel->save([
				'id_bimbingan_ta'	=> $id,
				'status_bimbingan_pembimbing2_ta' => $this->request->getVar('statuspembimbing'),
				'catatan_bimbingan_pembimbing2_ta' => $this->request->getVar('catatan'),

			]);
		}
		$this->db->transComplete();
		session()->setFlashdata('pesan', 'data berhasil di ubah');

		return redirect()->to("/dosen/get_tugasakhir/$id_pengajuan");
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

	public function penilaiansidangta($data)
	{
		$session = session();
		$dat = $session->get('user_id');

		$dospem = $this->pembimbingmodel->get_status_pembimbing($dat);
		$status_dospem = $dospem['0']['role_pembimbing'];

		$data = [
			'sidangta' => $this->sidangtamodel->get_sidangta($data),
			'status_dospem' => $status_dospem,
		];
		return view('dosen/jadwalsidangta/tabelpenilaiansidang', $data);
	}

	public function updatesidangta($id)
	{
		// dd($this->request->getVar());

		$session = session();
		$dat = $session->get('user_id');

		$dospem = $this->pembimbingmodel->get_status_pembimbing($dat);
		$status_dospem = $dospem['0']['role_pembimbing'];


		$this->db->transStart();
		if ($status_dospem == 'dosen pembimbing I') {

			$this->sidangtamodel->save([
				'id_sidangta' => $id,
				'nilai_pembimbing_1_ta' => $this->request->getVar('nilai'),
				'catatan_pembimbing_1_ta' => $this->request->getVar('catatan'),
				'status_ta' => $this->request->getVar('status'),


			]);
		} elseif ($status_dospem == 'dosen pembimbing II') {

			$this->sidangtamodel->save([
				'id_sidangta' => $id,
				'nilai_pembimbing_2_ta' => $this->request->getVar('nilai'),
				'catatan_pembimbing_2_ta' => $this->request->getVar('catatan'),
				'status_ta' => $this->request->getVar('status'),


			]);
		}
		$this->db->transComplete();
		session()->setFlashdata('pesan', 'data berhasil di tambah');


		return redirect()->to('/dosen/jadwalta');
	}
}
