<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJabatan = [
            ['jabatan' => 'Kepala Dinas', 'created_id' => 1],
            ['jabatan' => 'Sekretaris', 'created_id' => 1],
            ['jabatan' => 'Kepala Sub Bagian Umum dan Kepegawaian', 'created_id' => 1],
            ['jabatan' => 'Kepala Sub Bagian Program dan Pelaporan', 'created_id' => 1],
            ['jabatan' => 'Pengolah Data dan Informasi', 'created_id' => 1],
            ['jabatan' => 'Penelaah Teknis Kebijakan', 'created_id' => 1],
            ['jabatan' => 'Pranata Hubungan Masyarakat Ahli Pertama', 'created_id' => 1],
            ['jabatan' => 'Fasilitator Pemerintahan', 'created_id' => 1],
            ['jabatan' => 'Pengadministrasi Perkantoran', 'created_id' => 1],
            ['jabatan' => 'Analis Keuangan Pusat dan Daerah Ahli Muda', 'created_id' => 1],
            ['jabatan' => 'Pengelola Layanan Operasional', 'created_id' => 1],
            ['jabatan' => 'Kepala Bidang Infrastruktur Teknologi Informasi dan Komunikasi', 'created_id' => 1],
            ['jabatan' => 'Operator Layanan Operasional', 'created_id' => 1],
            ['jabatan' => 'Pranata Komputer Ahli Pertama', 'created_id' => 1],
            ['jabatan' => 'Pranata Komputer Ahli Muda', 'created_id' => 1],
            ['jabatan' => 'Penata Layanan Operasional', 'created_id' => 1],
            ['jabatan' => 'Penelaah Informasi dan Komunikasi Publik', 'created_id' => 1],
            ['jabatan' => 'Kepala Bidang Layanan E-Government', 'created_id' => 1],
            ['jabatan' => 'Pranata Komputer Terampil', 'created_id' => 1],
            ['jabatan' => 'Analis Kebijakan Ahli Muda', 'created_id' => 1],
            ['jabatan' => 'Plt. Kepala Bidang Pengelolaan Informasi dan Komunikasi Publik', 'created_id' => 1],
            ['jabatan' => 'Pranata Hubungan Masyarakat Ahli Muda', 'created_id' => 1],
            ['jabatan' => 'Kepala Bidang Persandian dan Keamanan Informasi', 'created_id' => 1],
            ['jabatan' => 'Sandiman Ahli Muda', 'created_id' => 1],
            ['jabatan' => 'Sandiman Ahli Pertama', 'created_id' => 1],
            ['jabatan' => 'Kepala Bidang Statistik Sektoral', 'created_id' => 1],
            ['jabatan' => 'Statistisi Ahli Muda', 'created_id' => 1],
            ['jabatan' => 'Statistisi Ahli Pertama', 'created_id' => 1],
            ['jabatan' => 'Surveyor Pemetaan Terampil', 'created_id' => 1],
            ['jabatan' => 'Call Taker 112', 'created_id' => 1],
            // Tambahkan jika ada jabatan lain yang belum terdata
        ];

        foreach ($dataJabatan as $jabatan) {
            Jabatan::create([
                'jabatan'    => $jabatan['jabatan'],
                'created_id' => $jabatan['created_id'],
                'updated_id' => null,
                'deleted_id' => null,
            ]);
        }
    }
}
