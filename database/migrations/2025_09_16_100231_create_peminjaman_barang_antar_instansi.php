<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjaman_barang_antar_instansi', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->date('tanggal_surat_masuk');
            $table->string('file_surat');// bentuk filenya wajib pdf maksimal 2MB
            $table->string('nama_peminjam');
            $table->string('nama_instansi');
            $table->unsignedBigInteger('id_barang');
            $table->integer('jumlah_awal');
            $table->integer('jumlah_akhir');
            $table->date('tanggal_awal_pinjam');
            $table->date('tanggal_akhir_pinjam');
            $table->string('kondisi_barang_awal');
            $table->string('kondisi_barang_akhir');
            $table->string('status_pinjaman'); // dikembalikan,dipinjam
            $table->timestamp('created_at')->nullable();
            $table->integer('created_id')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('updated_id')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('deleted_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_barang_antarinstansi');
    }
};
