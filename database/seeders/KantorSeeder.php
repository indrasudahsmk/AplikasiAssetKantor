<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KantorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kantor')->insert([
            [
                'kantor'     => 'DKIS Sudarsono',
                'alamat'     => 'Jalan Dr. Sudarsono No. 40, Kel. Kesambi, Kec. Kesambi, Kota Cirebon, 45134',
                'created_at' => now(),
                'created_id' => 1,
            ],
            [
                'kantor'     => 'DKIS Bypass',
                'alamat'     => 'Jalan Brigjend Dharsono No. 1, Kel. Sunyaragi, Kec. Kesambi, Kota Cirebon, 45135',
                'created_at' => now(),
                'created_id' => 1,
            ],
            [
                'kantor'     => 'Komisi Informasi Kota Cirebon',
                'alamat'     => 'Jl. DR. Sudarsono No.3, Kesambi, Kota Cirebon, 45134',
                'created_at' => now(),
                'created_id' => 2,
            ],
            [
                'kantor'     => 'Balai Kota Cirebon',
                'alamat'     => 'Jl. Siliwangi No. 84, Kec. Kejaksan, Cirebon, Jawa Barat',
                'created_at' => now(),
                'created_id' => 2,
            ]
        ]);
    }
}
