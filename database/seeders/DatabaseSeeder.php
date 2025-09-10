<?php

namespace Database\Seeders;

use App\Models\AssetBidang;
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
            JenisBarangSeeder::class,
            MerkSeeder::class,
            TipeSeeder::class,
            KantorSeeder::class,
            JabatanSeeder::class,
            BidangSeeder::class,
            PegawaiSeeder::class,
            BarangSeeder::class,
            AssetBidangSeeder::class,
        ]);
    }
}
