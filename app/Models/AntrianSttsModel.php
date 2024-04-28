<?php

namespace App\Models;

use CodeIgniter\Model;

class AntrianSttsModel extends Model
{
    protected $table = 'antrian_status';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['jam_antrian', 'status', 'jumlah'];
    public function updateAllStatus($newStatus)
    {
        $data = [
            'status' => $newStatus,
        ];

        $this->update($data);
    }
}
