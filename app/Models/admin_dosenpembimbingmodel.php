<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_dosenpembimbingmodel extends Model
{
    protected $table = 'dosen_pembimbing';
    protected $primaryKey = 'id_dosenpembimbing';
    protected $allowedFields = ['id_dosenta', 'role_pembimbing'];
}
