<?php

namespace App\Controllers;

use App\Models\admin_profilmodel;
use App\Models\admin_beritamodel;
use App\Models\admin_bimbinganmodel;
use App\Models\admin_dataakademikmodel;
use App\Models\admin_dosenmodel;
use App\Models\admin_pengajuanmodel;
use App\Models\admin_penjadwalanmodel;
use App\Models\admin_dosentamodel;
use App\Models\admin_levelingmodel;
use App\Models\UserModel;
use App\Models\admin_penjadwalansidang_ta_model;
use App\Models\admin_dosenpembimbingmodel;
use App\Models\admin_dosenpengujimodel;
use App\Models\admin_mahasiswamodel;
use App\Models\admin_seminarmodel;
use App\Models\admin_sidangtamodel;



class Admin extends BaseController
{
	protected $profilmodel;
	protected $beritamodel;
	protected $bimbinganmodel;
	protected $dataakademikmodel;
	protected $dosenmodel;
	protected $pengajuanmodel;
	protected $penjadwalanmodel;
	protected $dosen_tugasakhirmodel;
	protected $levelingmodel;
	protected $user;
	protected $db;
	protected $penjadwalansidangtamodel;
	protected $pembimbingmodel;
	protected $pengujimodel;
	protected $mahasiswamodel;
	protected $seminarmodel;
	protected $sidangtamodel;

	public function __construct()
	{
		$session = session();
		$this->id = $session->get('user_id');

		$this->db = \Config\Database::connect();
		$this->profilmodel = new admin_profilmodel();
		$this->beritamodel = new admin_beritamodel();
		$this->bimbinganmodel = new admin_bimbinganmodel();
		$this->dataakademikmodel = new admin_dataakademikmodel();
		$this->dosenmodel = new admin_dosenmodel();
		$this->pengajuanmodel = new admin_pengajuanmodel();
		$this->penjadwalanmodel = new admin_penjadwalanmodel();
		$this->dosen_tugasakhirmodel = new admin_dosentamodel();
		$this->levelingmodel = new admin_levelingmodel();
		$this->user = new UserModel();
		$this->penjadwalansidangtamodel = new admin_penjadwalansidang_ta_model();
		$this->pembimbingmodel = new admin_dosenpembimbingmodel();
		$this->pengujimodel = new admin_dosenpengujimodel();
		$this->mahasiswamodel = new admin_mahasiswamodel();
		$this->seminarmodel = new admin_seminarmodel();
		$this->sidangtamodel = new admin_sidangtamodel();
	}


	public function index()
	{

		return redirect()->to('/admin/profil');
	}

	public function Profil()
	{

		$profiladmin = $this->profilmodel->get_profil($this->id);


		$data = [
			'heading'	=> 'profil',
			'data_profil' => $profiladmin,




		];

		return view('admin/profil/profil', $data);
	}




	public function editprofil()
	{

		$profiladmin = $this->profilmodel->get_profil($this->id);
		session();

		$data = [
			'heading'	=> 'profil',
			'data_profil' => $profiladmin,
			'validation' => \config\Services::validation(),


		];

		return view('admin/profil/edit profil', $data);
	}

	public function updatedataprofil($id)
	{
		$this->db->transStart();


		if (!$this->validate([
			'foto' => [
				'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
				'errors' => [
					// 'uploaded' => 'Pilih Gambar Terlebih Dahulu',
					'max_size' => 'Ukuran Gambar Terlalu besar',
					'is_image' => 'Yang Anda pilih bukan gambar',
					'mime_in' => 'Yang Anda pilih bukan gambar',

				]

			],
		])) {

			return redirect()->to('/admin/editprofil')->withInput();
		}

		$fileFoto = $this->request->getFile('foto');

		if ($fileFoto->getError() == 4) {
			$foto = $this->request->getVar('fotolama');
		} else {

			// // pindah ke public/img
			$fileFoto->move('img');
			// // 
			$foto = $fileFoto->getName();
			$fotoid = $this->profilmodel->get_dosen($id);
			// dd($fotoid);
			if ($fotoid['0']['foto_dosen'] != 'default.png') {
				unlink('img/' . $this->request->getVar('fotolama'));
			}
		}


		$this->profilmodel->save([
			'id_dosen'	=> $id,
			'nama_dosen' => $this->request->getVar('nama'),
			'notelp' => $this->request->getVar('no_hp'),
			'email' => $this->request->getVar('email'),
			'jkdosen' => $this->request->getVar('jeniskelamin'),
			'foto_dosen' => $foto,



		]);
		$this->db->transComplete();
		session()->setFlashdata('pesan', 'profil berhasil di ubah');

		return redirect()->to('/admin/profil');
	}


	// =========Data Mahasiswa=========
	public function mahasiswa()
	{
		session();

		$data = [
			'datamhs' => $this->mahasiswamodel->get_mahasiswa(),
			'akademik' => $this->dataakademikmodel->get_dataakademik(),
			'detailmhs' => $this->mahasiswamodel->get_detailmhs(),
			'validation' => \config\Services::validation(),


		];

		return view('admin/Data Mahasiswa/mahasiswa.php', $data);
	}

	public function tambahmahasiswa()
	{

		// dd($this->request->getVar());

		$this->db->transStart();
		if (!$this->validate([
			'nim' => [
				'rules' => 'is_unique[mahasiswa.nim_mhs]',
				'errors' => [
					'is_unique' => '{field} sudah terdaftar'
				]


			],


		])) {
			$validation = \config\Services::validation();
			return redirect()->to('/admin/mahasiswa')->withInput();
		}


		$this->user->save([

			'username' => $this->request->getVar('nim'),
			'password' => $this->request->getVar('password'),
			'level' => '3'

		]);
		$iduser = $this->user->getInsertID();

		$this->mahasiswamodel->save([

			'nama_mhs' => $this->request->getVar('nama_mhs'),
			'nim_mhs' => $this->request->getVar('nim'),
			'jk_mhs' => $this->request->getVar('jeniskelamin'),
			'id_user' => $iduser,
			'id_dataakademik' => $this->request->getVar('dataakademik'),


		]);
		$this->db->transComplete();
		session()->setFlashdata('pesan', 'data berhasil di Tambah');

		// dd($this->request->getVar());
		return redirect()->to('/admin/mahasiswa');
	}

	public function updatemahasiswa($id)
	{

		// dd($this->request->getVar());

		$this->db->transStart();

		$this->user->save([
			'id_user' => $this->request->getVar('id_user'),
			'username' => $this->request->getVar('username'),
			'password' => $this->request->getVar('password'),
			'level' => '3'

		]);
		// $iduser = $this->user->getInsertID();

		$this->mahasiswamodel->save([
			'id_mhs' => $id,
			'nama_mhs' => $this->request->getVar('nama_mhs'),
			'nim_mhs' => $this->request->getVar('nim'),
			'jk_mhs' => $this->request->getVar('jeniskelamin'),
			'id_user' => $this->request->getVar('id_user'),
			'id_dataakademik' => $this->request->getVar('dataakademik'),


		]);
		$this->db->transComplete();
		session()->setFlashdata('pesan', 'data mahasiswa berhasil di Ubah');

		// dd($this->request->getVar());
		return redirect()->to('/admin/mahasiswa');
	}

	public function deletemahasiswa($id)
	{


		$data = $this->mahasiswamodel->get_detailmhs($id);

		$this->db->transStart();
		$this->mahasiswamodel->delete([
			'id_mhs' => $id,

		]);
		$this->user->delete([
			'id_user' => $data['0']['id_user']
		]);
		// $iduser = $this->user->getInsertID();


		$this->db->transComplete();
		session()->setFlashdata('pesan', 'data mahasiswa berhasil di hapus');

		// dd($this->request->getVar());
		return redirect()->to('/admin/mahasiswa');
	}
	// ===================MAHASISWA AKHIR===========================

	//------------------BAGIAN PENGAJUAN JUDUL -----------------------
	public function pengajuan()
	{

		$pengajuan_judul = $this->pengajuanmodel->get_pengajuan();
		// dd($pengajuan_judul);
		// $pengajuan_judul2 = $this->pengajuanmodel->get_pengajuan2();
		$data = [

			'datajudul' => $pengajuan_judul,
			// 'datajudul2' => $pengajuan_judul2,


		];

		return view('admin/Data Pengajuan Judul/Pengajuan Judul', $data);
	}

	public function updatepengajuan($id)
	{
		$this->pengajuanmodel->save([
			'id_pengajuan' => $id,
			'catatan_kaprodi' => $this->request->getVar('catatan'),
			'status_pengajuan' => $this->request->getVar('status'),


		]);
		session()->setFlashdata('pesan', 'data berhasil di ubah');

		// dd($this->request->getVar());
		return redirect()->to('/admin/pengajuan');

		// return view('admin/Data Pengajuan Judul/Pengajuan Judul', $data);
	}
	//------------------BAGIAN PENjadwalan -----------------------
	public function seminarterjadwal()
	{



		$penjadwalan = $this->penjadwalanmodel->get_jadwalseminarterjadwal1();
		$penjadwalan2 = $this->penjadwalanmodel->get_jadwalseminarterjadwal2();


		$data = [

			'jadwal' => $penjadwalan,
			'jadwal2' => $penjadwalan2,



		];
		return view('admin/pendjadwalan/Seminar Proposal terjadwal', $data);
	}

	public function skripsiterjadwal()
	{

		$penjadwalan = $this->penjadwalansidangtamodel->get_jadwalsidangtaterjadwal1();
		$penjadwalan2 = $this->penjadwalansidangtamodel->get_jadwalsidangtaterjadwal2();



		$data = [

			'jadwal' => $penjadwalan,
			'jadwal2' => $penjadwalan2,



		];
		return view('admin/pendjadwalan/Skripsi terjadwal', $data);
	}

	public function jadwalseminar()
	{



		$penjadwalan = $this->penjadwalanmodel->get_jadwalseminar1();
		$penjadwalan2 = $this->penjadwalanmodel->get_jadwalseminar2();


		$data = [

			'jadwal' => $penjadwalan,
			'jadwal2' => $penjadwalan2,



		];
		return view('admin/pendjadwalan/Seminar Proposal', $data);
	}
	public function jadwalskripsi()
	{

		$penjadwalan = $this->penjadwalansidangtamodel->get_jadwalsidangta1();
		$penjadwalan2 = $this->penjadwalansidangtamodel->get_jadwalsidangta2();



		$data = [

			'jadwal' => $penjadwalan,
			'jadwal2' => $penjadwalan2,



		];
		return view('admin/pendjadwalan/Skripsi', $data);
	}
	public function updatejadwalskripsi($id)
	{
		// dd($this->request->getVar());

		$status = $this->sidangtamodel->get_statuspenjadwalanta($id);
		$status_jadwal = $status['0']['status_penjadwalan_kaprodi_ta'];
		// dd($status_jadwal);

		if ($status_jadwal == 'sudah terjadwal') {
		} elseif ($status_jadwal == 'belum terjadwal') {
			$this->sidangtamodel->save([
				'id_jadwal_ta' => $id,
			]);
		}

		$this->penjadwalansidangtamodel->save([
			'id_jadwal_ta' => $id,
			'tanggal_sidang_ta' => $this->request->getVar('tanggal_ujian'),
			'tempat_sidang_ta' => $this->request->getVar('ruang'),
			'jam_sidang_ta' => $this->request->getVar('pukul'),
			'penguji_1' => $this->request->getVar('penguji1'),
			'penguji_2' => $this->request->getVar('penguji2'),
			'status_penjadwalan_kaprodi_ta' => 'sudah terjadwal',


		]);
		session()->setFlashdata('pesan', 'jadwal berhasil di tambahkan');

		return redirect()->to('/admin/skripsiterjadwal');
	}
	public function updatejadwalseminar($id)
	{
		// dd($this->request->getVar());
		// $status = $this->seminarmodel->get_statuspenjadwalan($id);
		// $status_jadwal = $status['0']['status_penjadwalan_kaprodi'];
		// dd($status_jadwal);

		$status = $this->seminarmodel->get_statuspenjadwalan($id);
		$status_jadwal = $status['0']['status_penjadwalan_kaprodi'];

		if ($status_jadwal == 'sudah terjadwal') {
		} elseif ($status_jadwal == 'belum terjadwal') {
			$this->seminarmodel->save([
				'id_jadwal' => $id,
			]);
		}

		$this->penjadwalanmodel->save([
			'id_jadwal' => $id,
			'tanggal_sidang' => $this->request->getVar('tanggal_ujian'),
			'tempat_sidang' => $this->request->getVar('ruang'),
			'jam_sidang' => $this->request->getVar('pukul'),
			'penguji_1' => $this->request->getVar('penguji1'),
			'penguji_2' => $this->request->getVar('penguji2'),
			'status_penjadwalan_kaprodi' => 'sudah terjadwal',


		]);






		session()->setFlashdata('pesan', 'jadwal berhasil di tambahkan');

		return redirect()->to('/admin/seminarterjadwal');
	}
	public function editskripsi($data)
	{
		$data = [

			'data1' => $this->penjadwalansidangtamodel->get_jadwalsidangta1($data),
			'data2' => $this->penjadwalansidangtamodel->get_jadwalsidangta2($data),
			'data3' => $this->dosenmodel->get_penguji1(),
			'data4' => $this->dosenmodel->get_penguji2(),

		];
		return view('admin/pendjadwalan/Edit Skripsi', $data);
	}

	public function editseminar($data)
	{
		$data = [

			'data1' => $this->penjadwalanmodel->get_jadwalseminar1($data),
			'data2' => $this->penjadwalanmodel->get_jadwalseminar2($data),
			'data3' => $this->dosenmodel->get_penguji1(),
			// 'data4' => $this->dosenmodel->get_penguji2(),

		];
		// dd($data['data1']);

		return view('admin/pendjadwalan/Edit Seminar Proposal', $data);
	}

	public function detailseminarterjadwal($data)
	{
		$data = [


			'data3' => $this->penjadwalanmodel->get_jadwalseminarterjadwal1($data),
			'data4' => $this->penjadwalanmodel->get_jadwalseminarterjadwal2($data),

		];

		return view('admin/pendjadwalan/Detail Seminar Proposal terjadwal', $data);
	}
	public function detailseminar($data)
	{
		$data = [

			'data1' => $this->penjadwalanmodel->get_jadwalseminar1($data),
			'data2' => $this->penjadwalanmodel->get_jadwalseminar2($data),

		];

		return view('admin/pendjadwalan/Detail Seminar Proposal', $data);
	}
	public function detailskripsiterjadwal($data)
	{
		$data = [


			'data3' => $this->penjadwalansidangtamodel->get_jadwalsidangtaterjadwal1($data),
			'data4' => $this->penjadwalansidangtamodel->get_jadwalsidangtaterjadwal2($data),

		];

		return view('admin/pendjadwalan/Detail Skripsi terjadwal', $data);
	}
	public function detailskripsi($data)
	{
		$data = [

			'data1' => $this->penjadwalansidangtamodel->get_jadwalsidangta1($data),
			'data2' => $this->penjadwalansidangtamodel->get_jadwalsidangta2($data),

		];

		return view('admin/pendjadwalan/Detail Skripsi', $data);
	}


	//------------------BAGIAN berita -----------------------
	public function Beritaseminar()
	{

		$beritaseminar = $this->beritamodel->get_beritaseminar();


		$data = [

			'seminar' => $beritaseminar,


		];
		return view('admin/Data Berita/Data Berita seminar', $data);
	}
	public function Beritaskripsi()
	{


		$beritasidangta = $this->beritamodel->get_beritasidangta();

		$data = [


			'sidang_ta' => $beritasidangta,

		];
		return view('admin/Data Berita/Data Berita skripsi', $data);
	}

	public function detailberitaseminar($data)
	{



		$data = [

			'berita' => $this->beritamodel->get_beritaseminar($data)

		];

		return view('admin/Data Berita/Detail Berita seminar', $data);
	}
	public function detailberitaskripsi($data)
	{


		$data = [

			'berita' => $this->beritamodel->get_beritasidangta($data)

		];
		return view('admin/Data Berita/Detail Berita skripsi', $data);
	}
	//------------------BAGIAN PENjadwalan -----------------------

	//------------------BAGIAN Pembagian dosen tugas akhir -----------------------
	public function datadosenta()
	{

		$datadosenta = $this->dosenmodel->get_dosen_tugasakhir();

		$data = [

			'datadosenta' => $datadosenta,
			// 'datadosenpenguji' => $this->dosen_tugasakhirmodel->get_dosen_tugasakhir_penguji(),
			// 'datadosenpembimbing' => $this->dosen_tugasakhirmodel->get_dosen_tugasakhir_pembimbing(),


		];
		return view('admin/Data pembagian dosen/Data Dosen Tugas Akhir', $data);
	}



	public function datadosenpembimbing()
	{
		session();
		$datapembimbing = $this->dosenmodel->get_pembimbing();

		$data = [

			'datapembimbing' => $datapembimbing,
			'data_dosenta' => $this->dosen_tugasakhirmodel->get_dosentapembimbing(),
			'validation' => \config\Services::validation(),

		];
		return view('admin/Data pembagian dosen/data pembimbing/Data Dosen Pembimbing', $data);
	}

	public function tambahdatadosenpembimbing()
	{
		// dd($this->request->getVar());

		if (!$this->validate([
			'id_dosenta' => [
				'rules' => 'required|is_unique[dosen_pembimbing.id_dosenta]',
				'errors' => [
					'required' => 'wajib di isi.',
					'is_unique' => 'dosen sudah terdaftar'
				]


			],


		])) {
			$validation = \config\Services::validation();
			return redirect()->to('/admin/datadosenpembimbing')->withInput();
		}

		$this->pembimbingmodel->save([
			'id_dosenta' => $this->request->getVar('id_dosenta'),
			'role_pembimbing' => $this->request->getVar('role_pembimbing'),



		]);

		session()->setFlashdata('pesan', 'data berhasil di tambah');

		return redirect()->to('/admin/datadosenpembimbing');
	}
	public function editdatadosenpembimbing($id)
	{
		// dd($this->request->getVar());

		$this->pembimbingmodel->save([
			'id_dosenpembimbing' => $id,
			'id_dosenta' => $this->request->getVar('id_dosenta'),
			'role_pembimbing' => $this->request->getVar('role_pembimbing'),



		]);

		session()->setFlashdata('pesan', 'data berhasil di ubah');

		return redirect()->to('/admin/datadosenpembimbing');
	}

	public function deletedatapembimbing($id)
	{
		// dd($this->request->getVar());
		$this->db->transStart();
		$this->pembimbingmodel->delete([
			'id_dosenpembimbing' => $id,
		]);
		$this->db->transComplete();
		session()->setFlashdata('pesandelete', 'data berhasil di hapus');

		return redirect()->to('/admin/datadosenpembimbing');
	}

	public function detaildatadosenpembimbing($data)
	{
		$dosen = new \App\Models\admin_bimbinganmodel();
		// $dosenpembimbing = $dosen->get_bimbingan_pembimbing1($data);
		// $dosenpembimbing2 = $dosen->get_bimbingan_pembimbing2($data);
		// $pembimbing = $dosenpembimbing->where(['id_dosenpembimbing' => $data])->first();
		// dd($dosenpembimbing, $dosenpembimbing2);

		$data = [

			'data1' => $dosen->get_bimbingan_pembimbing1($data),
			'data2' => $dosen->get_bimbingan_pembimbing2($data),


		];
		return view('admin/Data pembagian dosen/data pembimbing/detail Data dosen pembimbing', $data);
	}
	public function datadosenpenguji()
	{
		session();
		$datapenguji = $this->dosenmodel->get_penguji();

		$data = [

			'datapenguji' => $datapenguji,
			'data_dosenta' => $this->dosen_tugasakhirmodel->get_dosentapenguji(),
			'validation' => \config\Services::validation(),

		];
		return view('admin/Data pembagian dosen/Data Dosen Penguji', $data);
	}
	public function tambahdatadosenpenguji()
	{
		// dd($this->request->getVar());
		if (!$this->validate([

			'id_dosenta' => [
				'rules' => 'required|is_unique[dosen_penguji.id_dosenta]',
				'errors' => [
					'required' => 'wajib di isi.',
					'is_unique' => 'dosen sudah terdaftar'
				]


			],


		])) {
			$validation = \config\Services::validation();
			return redirect()->to("/admin/datadosenpenguji")->withInput()->with('validation', $validation);
		}

		$this->pengujimodel->save([
			'id_dosenta' => $this->request->getVar('id_dosenta'),
			'role_penguji' => $this->request->getVar('role_penguji'),



		]);

		session()->setFlashdata('pesan', 'data berhasil di tambah');

		return redirect()->to('/admin/datadosenpenguji');
	}
	public function editdatadosenpenguji($id)
	{
		// dd($this->request->getVar());
		// validasi



		$this->pengujimodel->save([
			'id_dosenpenguji' => $id,
			'id_dosenta' => $this->request->getVar('id_dosenta'),
			'role_penguji' => $this->request->getVar('role_penguji'),



		]);

		session()->setFlashdata('pesan', 'data berhasil di ubah');

		return redirect()->to('/admin/datadosenpenguji');
	}
	public function deletepenguji($id)
	{
		$this->pengujimodel->delete($id);
		session()->setFlashdata('pesan', 'data berhasil di hapus');
		return redirect()->to('/admin/datadosenpenguji');
	}
	//------------------BAGIAN data akademik -----------------------
	public function Dataakademik()
	{
		$dataakademikModel = new \App\Models\dataakademikModel();
		$dataakademik = $dataakademikModel->findAll();


		$data = [

			'dataakademik' => $dataakademik,

		];
		return view('admin/Data Akademik/Data Akademik', $data);
	}

	public function updatedataakademik($id)
	{
		// dd($this->request->getVar());

		$this->dataakademikmodel->save([
			'id_dataakademik' => $id,
			'status' => $this->request->getVar('status'),
			'semester' => $this->request->getVar('semester'),
			'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
			'tanggal_akhir' => $this->request->getVar('tanggal_akhir'),



		]);
		session()->setFlashdata('pesan', 'data berhasil di update');

		return redirect()->to('/admin/dataakademik');
	}
	public function tambahdataakademik()
	{
		// dd($this->request->getVar());


		$id = 'aa';
		$data1 = $this->request->getVar('tahun_akademik');
		$data2 = $this->request->getVar('tahun_akademik2');
		$data = [

			'coba' => ($data1 . '/' . $data2),

		];


		// dd($data);
		$this->dataakademikmodel->save([

			'tahun_akademik' => $data,
			'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
			'tanggal_akhir' => $this->request->getVar('tanggal_akhir'),
			'semester' => $this->request->getVar('semester'),
			'status' => $this->request->getVar('status')




		]);
		session()->setFlashdata('pesan', 'data berhasil di tambah');

		return redirect()->to('/admin/dataakademik');
	}

	public function deletedataakademik($id)
	{
		// dd($this->request->getVar());

		$this->dataakademikmodel->delete([

			'id_dataakademik' => $id




		]);
		session()->setFlashdata('pesan', 'data berhasil di hapus');

		return redirect()->to('/admin/dataakademik');
	}

	//------------------BAGIAN data dosen -----------------------
	public function Datadosen()
	{
		$dosenModel = new \App\Models\admin_dosenModel();
		$datadosen = $dosenModel->get_dosen();

		$data = [

			'datadosen' => $datadosen,


		];



		return view('admin/Data dosen/Data dosen', $data);
	}

	public function tambahdatadosen()
	{
		session();
		$data = [

			'dataakademik' => $this->dataakademikmodel->get_dataakademik(),
			'validation' => \config\Services::validation(),
		];
		return view('admin/Data Dosen/Tambah Data Dosen', $data);
	}

	public function editdatadosen($id)
	{
		$dosenModel = new \App\Models\admin_dosenModel();
		$datadosen = $dosenModel->get_editdosen($id);
		session();
		$data = [

			'datadosen' => $datadosen,
			'validation' => \config\Services::validation(),

		];

		return view('admin/Data dosen/edit Data dosen', $data);
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
			return redirect()->to("/admin/editdatadosen/$id")->withInput();
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



		]);
		$this->db->transComplete();
		session()->setFlashdata('pesanubah', 'data berhasil di ubah');

		return redirect()->to('/admin/datadosen');
	}

	//------------------BAGIAN detail data dosen berisi detail data dosen beserta hak aksesnya -----------------------
	public function detaildatadosen($id)
	{

		$dosenModel = new \App\Models\admin_dosenModel();
		$datadosen = $dosenModel->get_dosen($id);

		session();
		$data = [

			'datadosen' => $datadosen,
			'dosenta' => $this->dosen_tugasakhirmodel->get_dosen($id),
			'validation' => \config\Services::validation(),
		];
		return view('admin/Data Dosen/detail Data Dosen', $data);
	}


	public function savedatadosen()
	{




		// dd($this->request->getFile('foto'));
		// validasi input
		if (!$this->validate([
			'nidn' => [
				'rules' => 'required|is_unique[dosen.nidn_dosen]',
				'errors' => [
					'required' => '{field} wajib di isi.',
					'is_unique' => '{field} sudah terdaftar'
				]


			],
			'nama' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} wajib di isi.',

				]


			],
			'username' => [
				'rules' => 'required|is_unique[user.username]',
				'errors' => [
					'required' => '{field} wajib di isi.',
					'is_unique' => '{field} sudah terdaftar'
				]


			],
			'password' => [
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
			return redirect()->to('/admin/tambahdatadosen')->withInput();
		}

		// dd('berhasil');
		// // ambil gambar
		$fileFoto = $this->request->getFile('foto');

		if ($fileFoto->getError() == 4) {
			$foto = 'default.png';
		} else {

			// // pindah ke public/img
			$fileFoto->move('img');
			// // 
			$foto = $fileFoto->getName();
		}






		$this->db->transStart();
		// $dosenModel = new \App\Models\admin_dosenModel();
		$this->dosenmodel->save([
			'nidn_dosen' => $this->request->getVar('nidn'),
			'nama_dosen' => $this->request->getVar('nama'),
			'foto_dosen' => $foto,



		]);


		// dd($this->request->getVar());

		$iddosen = $this->dosenmodel->getInsertID();

		$this->user->save([
			'username' => $this->request->getVar('username'),
			'password' => $this->request->getVar('password'),
			'level' => $this->request->getVar('jabatan')

		]);
		$iduser = $this->user->getInsertID();

		$this->dosen_tugasakhirmodel->save([
			'id_dosen' => $iddosen,
			'id_dataakademik' => $this->request->getVar('id_dataakademik')


		]);

		$id_dosenta = $this->dosen_tugasakhirmodel->getInsertID();

		$this->levelingmodel->save([
			'id_dosenta' => $id_dosenta,
			'id_user' => $iduser


		]);
		$this->db->transComplete();
		session()->setFlashdata('pesan', 'data berhasil di tambah');

		return redirect()->to('/admin/datadosen');
		// $datauser = [
		// 	'username' => $this->request->getVar('username'),
		// 	'password' => $this->request->getVar('password'),
		// 	'level' => $this->request->getVar('jabatan')
		// ];


		// $last_id_user = $this->user->insert_id();

		// $dosenta = [
		// 	'id_dosen' => $last_id_dosen,
		// 	'id_akademik' => $this->data_akademik->where(['status' => 'aktif'])

		// ];



		// $last_id_dosenta = $this->dosen_tugasakhir->insert_id();

		// $akses = [
		// 	'id_dosenta' => $last_id_dosenta,
		// 	'id_user' => $last_id_user

		// ];

		// 
		// $this->dosenmodel->insert_user($datauser);


		// dd($datauser);

		// return redirect()->to('/admin/Datadosen');
	}

	public function deletedatadosen($id)
	{ //------------------BAGIAN detail data dosen berisi detail data dosen beserta hak aksesnya -----------------------
		$data = $this->levelingmodel->get_deletedatadosen($id);

		// $a = $data['id_dosen'];
		// dd($data);
		$i = '0';
		$a = $data[$i];
		$a = $i++;
		$jmlhdata = count($data);


		// dd($data['0']['id_dosenta']);

		$this->db->transStart();
		$this->dosenmodel->delete([
			'id_dosen' => $id,

		]);

		$this->levelingmodel->delete([
			'id_dosen_ta' => $data['0']['id_dosenta'],

		]);

		for ($i = 0; $i < $jmlhdata; $i++) {


			$this->user->delete([
				'id_user' => $data[$i]['id_user'],

			]);
		}
		$this->db->transComplete();

		session()->setFlashdata('pesan', 'data berhasil di hapus');
		return redirect()->to("/admin/Datadosen");
	}


	public function tambahdosenhakakses($id)
	{ //------------------BAGIAN detail data dosen berisi detail data dosen beserta hak aksesnya -----------------------

		if (!$this->validate([

			'username' => [
				'rules' => 'required|is_unique[user.username]',
				'errors' => [
					'required' => '{field} wajib di isi.',
					'is_unique' => '{field} sudah terdaftar'
				]


			],
			'password' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} wajib di isi.'

				]


			]

		])) {
			$validation = \config\Services::validation();
			return redirect()->to("/admin/detaildatadosen/$id")->withInput()->with('validation', $validation);
		}
		// dd($this->request->getVar());
		$this->db->transStart();
		$this->user->save([
			'username' => $this->request->getVar('username'),
			'password' => $this->request->getVar('password'),
			'level' => $this->request->getVar('jabatan')

		]);
		$iduser = $this->user->getInsertID();

		$this->levelingmodel->save([
			'id_dosenta' => $this->request->getVar('id_dosenta'),
			'id_user' => $iduser


		]);
		$this->db->transComplete();
		session()->setFlashdata('pesan', 'data berhasil di tambah');

		return redirect()->to("/admin/detaildatadosen/$id");
	}

	public function deletedosenhakakses($id)
	{ //------------------BAGIAN detail data dosen berisi detail data dosen beserta hak aksesnya -----------------------
		$data = [

			'datadosen' => $this->levelingmodel->get_deletedosen($id)

		];
		$a = $data['datadosen'];
		$b = $a['0'];
		$c = $b['id_user'];
		// dd($c);
		$this->db->transStart();
		$this->levelingmodel->delete([
			'id_level' => $id,

		]);
		$this->user->delete([
			'id_user' => $c,

		]);
		$this->db->transComplete();

		session()->setFlashdata('pesan', 'Hak akses berhasil di hapus');
		return redirect()->to("/admin/Datadosen");
	}
	//--------------------------------------------------------------------

}
