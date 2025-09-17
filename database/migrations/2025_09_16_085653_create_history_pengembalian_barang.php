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
        Schema::create('history_pengembalian_barang', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tanggal');
            $table->unsignedBigInteger('id_pegawai')->nullable();
            $table->unsignedBigInteger('id_aset')->nullable();
            $table->unsignedBigInteger('id_bidang')->nullable();
            $table->unsignedBigInteger('id_barang')->nullable();
            $table->string('status_barang')->nullable();
            $table->string('keterangan')->default('-');
            $table->string('keterangan_aksi'); // dilakuin dimana store,update,delete
            $table->string('jenis_aset'); // jenis aset : aset bidang, aset pegawai kalo dia aset bidang id_asetnya ke aset bidang, klo dia aset pegawai id_asetnya ke aset pegawai
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
        Schema::dropIfExists('history_pengembalian_barang');
    }
};
