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
        $users = [
            [
                'nama' => 'Apacona',
                'email' => 'apake@gmail.com',
                'jabatan' => 'Admin',
                'password' => Hash::make('apake123'),
                'is_tugas' => false,
            ],
            [
                'nama' => 'Jarby',
                'email' => 'jarby@gmail.com',
                'jabatan' => 'Karyawan',
                'password' => Hash::make('apake123'),
                'is_tugas' => false,
            ],
            [
                'nama' => 'Tatal',
                'email' => 'tatal@gmail.com',
                'jabatan' => 'Karyawan',
                'password' => Hash::make('apake123'),
                'is_tugas' => false,
            ],
            [
                'nama' => 'Admin',
                'email' => 'admin@gmail.com',
                'jabatan' => 'Admin',
                'password' => Hash::make('admin123'),
                'is_tugas' => false,
            ],
            [
                'nama' => 'Jack Ganma',
                'email' => 'jack@gmail.com',
                'jabatan' => 'Karyawan',
                'password' => Hash::make('jack12345678'),
                'is_tugas' => false,
            ],
            [
                'nama' => 'Budi',
                'email' => 'budi@gmail.com',
                'jabatan' => 'Karyawan',
                'password' => Hash::make('budi123'),
                'is_tugas' => false,
            ],
            [
                'nama' => 'Siti',
                'email' => 'siti@gmail.com',
                'jabatan' => 'Karyawan',
                'password' => Hash::make('siti123'),
                'is_tugas' => false,
            ],
            [
                'nama' => 'Rina',
                'email' => 'rina@gmail.com',
                'jabatan' => 'Karyawan',
                'password' => Hash::make('rina123'),
                'is_tugas' => false,
            ],
            [
                'nama' => 'Doni',
                'email' => 'doni@gmail.com',
                'jabatan' => 'Karyawan',
                'password' => Hash::make('doni123'),
                'is_tugas' => false,
            ],
            [
                'nama' => 'Eka',
                'email' => 'eka@gmail.com',
                'jabatan' => 'Karyawan',
                'password' => Hash::make('eka123'),
                'is_tugas' => false,
            ],
        ];

        foreach ($users as $user) {
            Pegawai::create($user);
        }
    }
}
