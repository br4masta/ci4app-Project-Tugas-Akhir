<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_profilmhs extends Model
{
    protected $table      = 'mahasiswa';
    protected $primaryKey = 'id_mhs';

    protected $allowedFields = ['nim_mhs', 'nama_mhs', 'tgllhr_mhs', 'tplhr_mhs', 'jk_mhs', 'email_mhs', 'handphone'];
}
	//--------------------------------------------------------------------





    