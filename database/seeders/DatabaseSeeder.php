<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KantorSeeder::class,
            JabatanSeeder::class,
            BidangSeeder::class,
            PegawaiSeeder::class,
        ]);
    }
}
