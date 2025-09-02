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
                'jabatan' => 'Admin',
                'created_id' => 1,
                'updated_id' => null,
                'deleted_id' => null,
            ],
            [
                'jabatan' => 'Pegawai',
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
