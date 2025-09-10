<?php

namespace Database\Seeders;

use App\Models\AssetBidang;
use Illuminate\Database\Seeder;

class AssetBidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data custom
        $data = [
            [
                'id_barang' => 1, // misalnya Laptop
                'id_bidang' => 1, // misalnya Bidang IT
                'status'    => 'aktif',
                'created_id' => 1,
            ],
            [
                'id_barang' => 2, // misalnya Printer
                'id_bidang' => 2, // misalnya Bidang Administrasi
                'status'    => 'aktif',
                'created_id' => 1,
            ],
            [
                'id_barang' => 1, // misalnya Mobil
                'id_bidang' => 1, // misalnya Bidang Operasional
                'status'    => 'nonaktif',
                'created_id' => 1,
            ],
        ];

        foreach ($data as $item) {
            AssetBidang::create($item);
        }
    }
}
