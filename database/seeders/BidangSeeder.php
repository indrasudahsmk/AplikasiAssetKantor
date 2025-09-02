<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bidang')->insert([
            [
                'nama_bidang'     => 'Sekretariat',
                'id_kantor'       => '1',
                'created_at'      => now(),
                'created_id'      => 1,
            ],
            [
                'nama_bidang'     => 'Statistik',
                'id_kantor'       => '1',
                'created_at'      => now(),
                'created_id'      => 1,
            ],
            [
                'nama_bidang'     => 'PKIP',
                'id_kantor'       => '1',
                'created_at'      => now(),
                'created_id'      => 1,
            ],
            [
                'nama_bidang'     => 'E-Goverment',
                'id_kantor'       => '2',
                'created_at'      => now(),
                'created_id'      => 2,
            ],
            [
                'nama_bidang'     => 'ITIK',
                'id_kantor'       => '2',
                'created_at'      => now(),
                'created_id'      => 2,
            ],
            [
                'nama_bidang'     => 'Persandian',
                'id_kantor'       => '2',
                'created_at'      => now(),
                'created_id'      => 2,
            ]
        ]);
    }
}
