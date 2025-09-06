<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisBarang;

class JenisBarangSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        $data = [
            [
                'jenis_barang' => 'Elektronik',
                'created_id'   => 1,
            ],
            [
                'jenis_barang' => 'Furniture',
                'created_id'   => 1,
            ],
            [
                'jenis_barang' => 'Kendaraan',
                'created_id'   => 1,
            ],
            [
                'jenis_barang' => 'Alat Tulis Kantor',
                'created_id'   => 1,
            ],
        ];

        foreach ($data as $item) {
            JenisBarang::create($item);
        }
    }
}
