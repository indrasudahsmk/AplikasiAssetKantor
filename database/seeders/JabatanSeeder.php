<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data bisa kamu ubah sesuai kebutuhan
        $dataJabatan = [
            [
                'jabatan' => 'Kepala Dinas',
                'created_id' => 1,
                'updated_id' => null,
                'deleted_id' => null,
            ],
            [
                'jabatan' => 'Sekretariat',
                'created_id' => 1,
                'updated_id' => null,
                'deleted_id' => null,
            ],
            [
                'jabatan' => 'Bidang Infrastruktur Teknologi Informasi dan Komunikasi',
                'created_id' => 1,
                'updated_id' => null,
                'deleted_id' => null,
            ],
            [
                'jabatan' => 'Bidang Layanan E-Government',
                'created_id' => 1,
                'updated_id' => null,
                'deleted_id' => null,
            ],
            [
                'jabatan' => 'Bidang Pengelolaan Informasi dan Komunikasi Publik',
                'created_id' => 1,
                'updated_id' => null,
                'deleted_id' => null,
            ],
            [
                'jabatan' => 'Bidang Persandian dan Keamanan Informasi',
                'created_id' => 1,
                'updated_id' => null,
                'deleted_id' => null,
            ],
            [
                'jabatan' => 'Bidang Statistik Sektoral',
                'created_id' => 1,
                'updated_id' => null,
                'deleted_id' => null,
            ],
        ];

        // Loop untuk insert data
        foreach ($dataJabatan as $jabatan) {
            Jabatan::create($jabatan);
        }
    }
}
