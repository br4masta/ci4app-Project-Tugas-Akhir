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

class Kaprodi extends BaseController
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
        $this->penjadwalansidangtamodel = new admin_penjadwalansidang_ta_model();
    }

    public function index()
    {
        $pengajuanModel = new \App\Models\pengajuanModel();
        $pengajuan_judul = $pengajuanModel->get_pengajuan();
        $pengajuan_judul2 = $pengajuanModel->get_pengajuan2();
        $data = [

            'datajudul' => $pengajuan_judul,
            'datajudul2' => $pengajuan_judul2,

        ];
        return view('kaprodi/Pengajuan/Pengajuan judul', $data);
    }

    public function pengajuan()
    {
        $pengajuanModel = new \App\Models\pengajuanModel();
        $pengajuan_judul = $pengajuanModel->get_pengajuan();
        $pengajuan_judul2 = $pengajuanModel->get_pengajuan2();
        $data = [

            'datajudul' => $pengajuan_judul,
            'datajudul2' => $pengajuan_judul2,

        ];
        return view('kaprodi/Pengajuan/Pengajuan judul', $data);
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
        return redirect()->to('/kaprodi/pengajuan');

        // return view('admin/Data Pengajuan Judul/Pengajuan Judul', $data);
    }

    // ---------------------PENJADWALAN ----------------------
    public function seminar()
    {
        $penjadwalanModel = new \App\Models\penjadwalanModel();
        $penjadwalan = $penjadwalanModel->get_jadwalseminar();
        $penjadwalan2 = $penjadwalanModel->get_jadwalseminar2();


        $data = [

            'jadwal' => $penjadwalan,
            'jadwal2' => $penjadwalan2,



        ];
        return view('kaprodi/pendjadwalan/Seminar Proposal', $data);
    }
    public function skripsi()
    {
        $penjadwalanModel = new \App\Models\penjadwalanModel();
        $penjadwalan = $penjadwalanModel->get_jadwalsidangta();
        $penjadwalan2 = $penjadwalanModel->get_jadwalsidangta2();

        $data = [

            'jadwal' => $penjadwalan,
            'jadwal2' => $penjadwalan2,

        ];
        return view('kaprodi/pendjadwalan/Skripsi', $data);
    }
    public function editskripsi()
    {
        return view('kaprodi/pendjadwalan/Edit Skripsi');
    }
    public function editseminar()
    {
        return view('kaprodi/pendjadwalan/Edit Seminar Proposal');
    }

    public function detailseminar()
    {
        return view('kaprodi/pendjadwalan/Detail Seminar Proposal');
    }
    public function detailskripsi()
    {
        return view('kaprodi/pendjadwalan/Detail Skripsi');
    }
    public function Berita()
    {
        $beritaModel = new \App\Models\beritaModel();
        $beritaseminar = $beritaModel->get_beritaseminar();
        $beritasidangta = $beritaModel->get_beritasidangta();

        $data = [

            'seminar' => $beritaseminar,
            'sidang_ta' => $beritasidangta,

        ];
        return view('kaprodi/Data Berita/Data Berita', $data);
    }

    public function detailberita()
    {
        return view('kaprodi/Data Berita/Detail Data Berita');
    }
    //--------------------------------------------------------------------

}
