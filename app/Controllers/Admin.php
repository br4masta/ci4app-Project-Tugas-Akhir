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

	public function __construct()
	{
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
	}


	public function index()
	{

		$pengajuan_judul = $this->pengajuanmodel->get_pengajuan();
		$pengajuan_judul2 = $this->pengajuanmodel->get_pengajuan2();
		$data = [

			'datajudul' => $pengajuan_judul,
			'datajudul2' => $pengajuan_judul2,

		];
		return view('admin/Data Pengajuan Judul/Pengajuan Judul', $data);
	}

	public function Profil()
	{

		$profiladmin = $this->profilmodel->get_profil();


		$data = [
			'heading'	=> 'profil',
			'data_profil' => $profiladmin



		];

		return view('admin/profil/profil', $data);
	}
	//------------------BAGIAN PENGAJUAN JUDUL -----------------------
	public function pengajuan()
	{

		$pengajuan_judul = $this->pengajuanmodel->get_pengajuan();
		$pengajuan_judul2 = $this->pengajuanmodel->get_pengajuan2();
		$data = [

			'datajudul' => $pengajuan_judul,
			'datajudul2' => $pengajuan_judul2,


		];

		return view('admin/Data Pengajuan Judul/Pengajuan Judul', $data);
	}

	public function updatepengajuan($id)
	{
		$this->pengajuanmodel->save([
			'id_pengajuan' => $id,
			'catatan' => $this->request->getVar('catatan'),
			'status_pengajuan' => $this->request->getVar('status'),


		]);
		session()->setFlashdata('pesan', 'data berhasil di ubah');

		// dd($this->request->getVar());
		return redirect()->to('/admin/pengajuan');

		// return view('admin/Data Pengajuan Judul/Pengajuan Judul', $data);
	}
	//------------------BAGIAN PENjadwalan -----------------------
	public function jadwalseminar()
	{



		$penjadwalan = $this->penjadwalanmodel->get_jadwalseminar();
		$penjadwalan2 = $this->penjadwalanmodel->get_jadwalseminar2();


		$data = [

			'jadwal' => $penjadwalan,
			'jadwal2' => $penjadwalan2,



		];
		return view('admin/pendjadwalan/Seminar Proposal', $data);
	}
	public function jadwalskripsi()
	{

		$penjadwalan = $this->penjadwalanmodel->get_jadwalsidangta();
		$penjadwalan2 = $this->penjadwalanmodel->get_jadwalsidangta2();



		$data = [

			'jadwal' => $penjadwalan,
			'jadwal2' => $penjadwalan2,



		];
		return view('admin/pendjadwalan/Skripsi', $data);
	}
	//------------------BAGIAN berita -----------------------
	public function Berita()
	{

		$beritaseminar = $this->beritamodel->get_beritaseminar();
		$beritasidangta = $this->beritamodel->get_beritasidangta();

		$data = [

			'seminar' => $beritaseminar,
			'sidang_ta' => $beritasidangta,

		];
		return view('admin/Data Berita/Data Berita', $data);
	}

	public function detailberita()
	{
		return view('admin/Data Berita/Detail Data Berita');
	}
	//------------------BAGIAN PENjadwalan -----------------------
	public function editskripsi()
	{
		return view('admin/pendjadwalan/Edit Skripsi');
	}
	public function editseminar()
	{
		return view('admin/pendjadwalan/Edit Seminar Proposal');
	}

	public function detailseminar()
	{
		return view('admin/pendjadwalan/Detail Seminar Proposal');
	}
	public function detailskripsi()
	{
		return view('admin/pendjadwalan/Detail Skripsi');
	}
	//------------------BAGIAN dosen tugas akhir -----------------------
	public function datadosenta()
	{

		$datadosenta = $this->dosenmodel->get_dosen_tugasakhir();

		$data = [

			'datadosenta' => $datadosenta,


		];
		return view('admin/Data pembagian dosen/Data Dosen Tugas Akhir', $data);
	}
	public function datadosenpenguji()
	{

		$datapenguji = $this->dosenmodel->get_penguji();

		$data = [

			'datapenguji' => $datapenguji,


		];
		return view('admin/Data pembagian dosen/Data Dosen Penguji', $data);
	}


	public function datadosenpembimbing()
	{

		$datapembimbing = $this->dosenmodel->get_pembimbing();

		$data = [

			'datapembimbing' => $datapembimbing,


		];
		return view('admin/Data pembagian dosen/Data Dosen Pembimbing', $data);
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
		return view('admin/Data pembagian dosen/detail Data dosen pembimbing', $data);
	}
	//------------------BAGIAN data akademik -----------------------
	public function Dataakademik()
	{
		$dataakademikModel = new \App\Models\dataakademikModel();
		$dataakademik = $dataakademikModel->findAll();

		$data = [

			'dataakademik' => $dataakademik

		];
		return view('admin/Data Akademik/Data Akademik', $data);
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
		return view('admin/Data Dosen/Tambah Data Dosen');
	}

	public function editdatadosen()
	{
		return view('admin/Data Dosen/Edit Data Dosen');
	}

	public function detaildatadosen($id)
	{ //------------------BAGIAN detail data dosen berisi detail data dosen beserta hak aksesnya -----------------------
		$dosenModel = new \App\Models\admin_dosenModel();
		$datadosen = $dosenModel->get_dosen($id);


		$data = [

			'datadosen' => $datadosen

		];
		return view('admin/Data Dosen/detail Data Dosen', $data);
	}
	public function savedatadosen()
	{
		// dd($this->request->getVar());

		// $this->dosenmodel->insert_dosen($data);

		$this->db->transStart();
		// $dosenModel = new \App\Models\admin_dosenModel();
		$this->dosenmodel->save([
			'nidn_dosen' => $this->request->getVar('nidn'),
			'nama_dosen' => $this->request->getVar('nama'),


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
			'id_dataakademik' => '1'


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
	//--------------------------------------------------------------------

}
