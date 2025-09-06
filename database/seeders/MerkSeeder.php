<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Merk;

class MerkSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        $data = [
            [
                'merk'       => 'Asus',
                'created_id' => 1,
            ],
            [
                'merk'       => 'Epson',
                'created_id' => 1,
            ],
            [
                'merk'       => 'Honda',
                'created_id' => 1,
            ],
            [
                'merk'       => 'Samsung',
                'created_id' => 1,
            ],
            [
                'merk'       => 'Logitech',
                'created_id' => 1,
            ],
        ];

        foreach ($data as $item) {
            Merk::create($item);
        }
    }
}
