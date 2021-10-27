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
use App\Models\admin_seminarmodel;
use App\Models\admin_sidangtamodel;

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
        $this->seminarmodel = new admin_seminarmodel();
        $this->sidangtamodel = new admin_sidangtamodel();
    }

    public function index()
    {

        return redirect()->to('/kaprodi/profil');
    }

    public function Profil()
    {

        $profiladmin = $this->profilmodel->get_profil($this->id);


        $data = [
            'heading'    => 'profil',
            'data_profil' => $profiladmin



        ];

        return view('kaprodi/profil/profil', $data);
    }
    public function editprofil()
    {

        $profiladmin = $this->profilmodel->get_profil($this->id);
        session();

        $data = [
            'heading'    => 'profil',
            'data_profil' => $profiladmin,
            'validation' => \config\Services::validation(),


        ];

        return view('kaprodi/profil/edit profil', $data);
    }

    public function updatedataprofil($id)
    {
        $this->db->transStart();
        // dd($this->request->getVar());
        if (!$this->validate([
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

            return redirect()->to('/kaprodi/editprofil')->withInput();
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
            'id_dosen'    => $id,
            'nama_dosen' => $this->request->getVar('nama'),
            'notelp' => $this->request->getVar('no_hp'),
            'email' => $this->request->getVar('email'),
            'jkdosen' => $this->request->getVar('jeniskelamin'),
            'foto_dosen' => $foto,



        ]);
        $this->db->transComplete();
        session()->setFlashdata('pesan', 'profil berhasil di ubah');

        return redirect()->to('/kaprodi/profil');
    }
    // ===============PENGAJUAN==========================
    public function pengajuan()
    {
        $pengajuanModel = new \App\Models\pengajuanModel();
        $pengajuan_judul = $this->pengajuanmodel->get_pengajuan();
        // dd($pengajuan_judul);
        // $pengajuan_judul2 = $pengajuanModel->get_pengajuan2();
        $data = [

            'datajudul' => $pengajuan_judul,
            // 'datajudul2' => $pengajuan_judul2,

        ];
        return view('kaprodi/Pengajuan/Pengajuan judul', $data);
    }
    public function deletepengajuan($id)
    {
        // dd($this->request->getVar());

        $this->pengajuanmodel->delete([

            'id_pengajuan' => $id




        ]);
        session()->setFlashdata('hapuspesan', 'data berhasil di hapus');

        return redirect()->to('/kaprodi/pengajuan');
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
        return redirect()->to('/kaprodi/pengajuan');

        // return view('admin/Data Pengajuan Judul/Pengajuan Judul', $data);
    }

    // ---------------------PENJADWALAN ----------------------
    public function seminarterjadwal()
    {



        $penjadwalan = $this->penjadwalanmodel->get_jadwalseminarterjadwal1();
        $penjadwalan2 = $this->penjadwalanmodel->get_jadwalseminarterjadwal2();


        $data = [

            'jadwal' => $penjadwalan,
            'jadwal2' => $penjadwalan2,



        ];
        return view('kaprodi/pendjadwalan/Seminar Proposal terjadwal', $data);
    }

    public function skripsiterjadwal()
    {

        $penjadwalan = $this->penjadwalansidangtamodel->get_jadwalsidangtaterjadwal1();
        $penjadwalan2 = $this->penjadwalansidangtamodel->get_jadwalsidangtaterjadwal2();



        $data = [

            'jadwal' => $penjadwalan,
            'jadwal2' => $penjadwalan2,



        ];
        return view('kaprodi/pendjadwalan/Skripsi terjadwal', $data);
    }

    public function jadwalseminar()
    {



        $penjadwalan = $this->penjadwalanmodel->get_jadwalseminar1();
        $penjadwalan2 = $this->penjadwalanmodel->get_jadwalseminar2();


        $data = [

            'jadwal' => $penjadwalan,
            'jadwal2' => $penjadwalan2,



        ];
        return view('kaprodi/pendjadwalan/Seminar Proposal', $data);
    }
    public function jadwalskripsi()
    {

        $penjadwalan = $this->penjadwalansidangtamodel->get_jadwalsidangta1();
        $penjadwalan2 = $this->penjadwalansidangtamodel->get_jadwalsidangta2();



        $data = [

            'jadwal' => $penjadwalan,
            'jadwal2' => $penjadwalan2,



        ];
        return view('kaprodi/pendjadwalan/Skripsi', $data);
    }
    public function updatejadwalskripsi($id)
    {
        // dd($this->request->getVar());

        $this->db->transStart();
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
        $this->db->transComplete();
        session()->setFlashdata('pesan', 'jadwal berhasil di tambahkan');

        return redirect()->to('/kaprodi/skripsiterjadwal');
    }
    public function updatejadwalseminar($id)
    {
        // dd($this->request->getVar());
        $this->db->transStart();

        $status = $this->seminarmodel->get_statuspenjadwalan($id);
        // dd($status);
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
        $this->db->transComplete();
        session()->setFlashdata('pesan', 'jadwal berhasil di tambahkan');

        return redirect()->to('/kaprodi/seminarterjadwal');
    }
    public function editskripsi($data)
    {
        $data = [

            'data1' => $this->penjadwalansidangtamodel->get_jadwalsidangta1($data),
            'data2' => $this->penjadwalansidangtamodel->get_jadwalsidangta2($data),
            'data3' => $this->dosenmodel->get_penguji1(),
            'data4' => $this->dosenmodel->get_penguji2(),

        ];
        return view('kaprodi/pendjadwalan/Edit Skripsi', $data);
    }

    public function editseminar($data)
    {
        $data = [

            'data1' => $this->penjadwalanmodel->get_jadwalseminar1($data),
            'data2' => $this->penjadwalanmodel->get_jadwalseminar2($data),
            'data3' => $this->dosenmodel->get_penguji1(),
            'data4' => $this->dosenmodel->get_penguji2(),

        ];

        return view('kaprodi/pendjadwalan/Edit Seminar Proposal', $data);
    }

    public function detailseminarterjadwal($data)
    {
        $data = [


            'data3' => $this->penjadwalanmodel->get_jadwalseminarterjadwal1($data),
            'data4' => $this->penjadwalanmodel->get_jadwalseminarterjadwal2($data),

        ];

        return view('kaprodi/pendjadwalan/Detail Seminar Proposal terjadwal', $data);
    }
    public function detailseminar($data)
    {
        $data = [

            'data1' => $this->penjadwalanmodel->get_jadwalseminar1($data),
            'data2' => $this->penjadwalanmodel->get_jadwalseminar2($data),

        ];

        return view('kaprodi/pendjadwalan/Detail Seminar Proposal', $data);
    }
    public function detailskripsiterjadwal($data)
    {
        $data = [


            'data3' => $this->penjadwalansidangtamodel->get_jadwalsidangtaterjadwal1($data),
            'data4' => $this->penjadwalansidangtamodel->get_jadwalsidangtaterjadwal2($data),

        ];

        return view('kaprodi/pendjadwalan/Detail Skripsi terjadwal', $data);
    }
    public function detailskripsi($data)
    {
        $data = [

            'data1' => $this->penjadwalansidangtamodel->get_jadwalsidangta1($data),
            'data2' => $this->penjadwalansidangtamodel->get_jadwalsidangta2($data),

        ];

        return view('kaprodi/pendjadwalan/Detail Skripsi', $data);
    }
    // ----------------------END JADWAL-----------------------
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
    // -------------BERITA ACARA-------------------------------------------
    public function Beritaseminar()
    {

        $beritaseminar = $this->beritamodel->get_beritaseminar();


        $data = [

            'seminar' => $beritaseminar,


        ];
        return view('kaprodi/Data Berita/Data Berita seminar', $data);
    }
    public function Beritaskripsi()
    {


        $beritasidangta = $this->beritamodel->get_beritasidangta();

        $data = [


            'sidang_ta' => $beritasidangta,

        ];
        return view('kaprodi/Data Berita/Data Berita skripsi', $data);
    }

    public function detailberitaseminar($data)
    {



        $data = [

            'berita' => $this->beritamodel->get_beritaseminar($data)

        ];

        return view('kaprodi/Data Berita/Detail Berita seminar', $data);
    }
    public function detailberitaskripsi($data)
    {


        $data = [

            'berita' => $this->beritamodel->get_beritasidangta($data)

        ];
        return view('kaprodi/Data Berita/Detail Berita skripsi', $data);
    }
    //--------------------------------------------------------------------

}
