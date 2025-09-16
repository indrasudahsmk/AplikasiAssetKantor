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
        Schema::create('table_history_pengembalian_barang', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->unsignedBigInteger('id_pegawai');
            $table->unsignedBigInteger('id_aset');
            $table->unsignedBigInteger('id_bidang');
            $table->unsignedBigInteger('id_barang');
            $table->string('status_barang');
            $table->string('keterangan');
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
        Schema::dropIfExists('table_history_pengembalian_barang');
    }
};
