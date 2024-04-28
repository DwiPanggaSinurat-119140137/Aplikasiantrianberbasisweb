<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Antrian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'jam' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'nama_mahasiswa' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => 13,
            ],
            'nama_layanan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nim' => [
                'type' => 'INT',
                'constraint' => 9,
            ],
            'nomor' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'tanggal' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'file' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('antrian');
    }

    public function down()
    {
        $this->forge->dropTable('antrian');
    }
}
