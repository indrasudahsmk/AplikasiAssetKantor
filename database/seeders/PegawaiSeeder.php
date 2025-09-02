<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pegawai;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data bisa kamu ubah sesuai kebutuhan
        $dataPegawai = [
            [
                'nip_nik' => '198501012019031001',
                'username' => 'saktal',
                'password' => bcrypt('12345678'),
                'nama' => 'John Doe',
                'id_jabatan' => 1,
                'id_bidang' => 1, 
                'status_pegawai' => 'aktif',
                'created_id' => 1,
                'updated_id' => null,
                'deleted_id' => null,
            ],
            [
                'nip_nik' => '199002022020031002',
                'username' => 'tatal',
                'password' => bcrypt('12345678'),
                'nama' => 'Jane Doe',
                'id_jabatan' => 2,
                'id_bidang' => 2,
                'status_pegawai' => 'aktif',
                'created_id' => 1,
                'updated_id' => null,
                'deleted_id' => null,
            ],
        ];

        foreach ($dataPegawai as $pegawai) {
            Pegawai::create($pegawai);
        }
    }
}
