<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_levelingmodel extends Model
{
    protected $table = 'leveling_dosen';
    protected $primaryKey = 'id_level';
    protected $allowedFields = ['id_user', 'id_dosenta'];
}
