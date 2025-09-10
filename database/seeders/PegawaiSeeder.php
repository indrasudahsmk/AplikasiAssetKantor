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
        $dataPegawai = [
            [
                'nip_nik' => '198501012019031001',
                'username' => 'saktal',
                'email' => 'saktal@example.com',
                'password' => bcrypt('12345678'),
                'nama' => 'Saka Tatal',
                'id_jabatan' => 1,
                'id_bidang' => 1, 
                'id_role'   => 1,
                'status_pegawai' => 'ASN',
                'created_id' => 1,
                'updated_id' => null,
                'deleted_id' => null,
            ],
            [
                'nip_nik' => '199002022020031002',
                'username' => 'kipli',
                'email' => 'kipli@example.com',
                'password' => bcrypt('12345678'),
                'nama' => 'Kipli Sukina',
                'id_jabatan' => 2,
                'id_bidang' => 2,
                'status_pegawai' => 'NON ASN',
                'created_id' => 1,
                'updated_id' => null,
                'deleted_id' => null,
            ],
            [
                'nip_nik' => '199503152021031003',
                'username' => 'jackganma',
                'email' => 'jackganma@example.com',
                'password' => bcrypt('12345678'),
                'nama' => 'Jack Ganma',
                'id_jabatan' => 1,
                'id_bidang' => 1,
                'status_pegawai' => 'ASN',
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
