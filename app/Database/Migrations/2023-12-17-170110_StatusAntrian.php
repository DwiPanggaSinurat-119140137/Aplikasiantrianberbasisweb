<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatusAntrian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'jam_antrian' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
            ],
            'jumlah' => [
                'type'       => 'INT',
                'constraint'     => 5,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('antrian_status');
    }

    public function down()
    {
        $this->forge->dropTable('antrian_status');
    }
}
