<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        $data = [
            [
                'kode_barang'     => 'BRG-001',
                'nama_barang'     => 'Laptop Asus ROG',
                'id_jenis'        => 1,
                'nomor_register'  => 'REG-2023-001',
                'id_merk'         => 1,
                'id_tipe'         => 2,
                'tahun_pembelian' => 2023,
                'harga'           => 15000000,
                'no_pabrik'       => 'NP-12345',
                'no_rangka'       => 'NR-67890',
                'no_mesin'        => 'NM-54321',
                'keterangan'      => 'Digunakan untuk keperluan kantor',
                'created_id'      => 1,
            ],
            [
                'kode_barang'     => 'BRG-002',
                'nama_barang'     => 'Printer Epson L3110',
                'id_jenis'        => 2,
                'nomor_register'  => 'REG-2023-002',
                'id_merk'         => 2,
                'id_tipe'         => 3,
                'tahun_pembelian' => 2022,
                'harga'           => 2500000,
                'no_pabrik'       => 'NP-98765',
                'no_rangka'       => 'NR-45678',
                'no_mesin'        => null,
                'keterangan'      => 'Printer tinta warna',
                'created_id'      => 1,
            ],
        ];

        foreach ($data as $item) {
            Barang::create($item);
        }
    }
}
