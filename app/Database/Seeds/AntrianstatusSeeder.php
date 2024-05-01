<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AntrianstatusSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['jam_antrian' => '08.00-09.00',
                'status' => 'ON',
                'jumlah' => '0',
                'maksimal' => '15',
            ],

            ['jam_antrian' => '09.00-10.00',
                'status' => 'ON',
                'jumlah' => '0',
                'maksimal' => '15',
            ],

            ['jam_antrian' => '10.00-11.00',
                'status' => 'ON',
                'jumlah' => '0',
                'maksimal' => '15',
            ],

            ['jam_antrian' => '11.00-12.00',
                'status' => 'ON',
                'jumlah' => '0',
                'maksimal' => '15',
            ],

            ['jam_antrian' => '13.00-14.00',
                'status' => 'ON',
                'jumlah' => '0',
                'maksimal' => '15',
            ],

            ['jam_antrian' => '14.00-15.00',
                'status' => 'ON',
                'jumlah' => '0',
                'maksimal' => '15',
            ],

            ['jam_antrian' => '15.00-16.00',
                'status' => 'ON',
                'jumlah' => '0',
                'maksimal' => '15',
            ],
        ];
        $this->db->table('antrian_status')->insertBatch($data);
    }
}
