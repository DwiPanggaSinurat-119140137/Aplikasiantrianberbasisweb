<?php

namespace App\Models;

use CodeIgniter\Model;

class AntrianModel extends Model
{
    protected $table = 'antrian';
    protected $allowedFields = ['jam', 'nama_mahasiswa', 'no_hp', 'nama_layanan', 'nim', 'nomor', 'file', 'tanggal', 'status'];
    protected $primarykey = 'id';
    protected $useAutoIncrement = true;
}
