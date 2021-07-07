<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_dosentamodel extends Model
{
    protected $table = 'dosen_tugasakhir';
    protected $primaryKey = 'id_dosenta';
    protected $allowedFields = ['id_dosen', 'id_dataakademik'];
}
