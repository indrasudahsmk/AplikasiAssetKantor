<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tipe;

class TipeSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        $data = [
            [
                'tipe'       => 'Laptop Gaming',
                'created_id' => 1,
            ],
            [
                'tipe'       => 'Printer Inkjet',
                'created_id' => 1,
            ],
            [
                'tipe'       => 'Mobil Sedan',
                'created_id' => 1,
            ],
            [
                'tipe'       => 'Meja Kantor',
                'created_id' => 1,
            ],
            [
                'tipe'       => 'Keyboard Mekanik',
                'created_id' => 1,
            ],
        ];

        foreach ($data as $item) {
            Tipe::create($item);
        }
    }
}
