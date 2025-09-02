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
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_barang');
            $table->string('kode_barang', 35)->nullable();
            $table->string('nama_barang', 50)->nullable();
            $table->unsignedBigInteger('id_jenis')->nullable();
            $table->string('nomor_register', 50)->nullable();
            $table->unsignedBigInteger('id_merk')->nullable();
            $table->unsignedBigInteger('id_tipe')->nullable();
            $table->integer('tahun_pembelian')->nullable();
            $table->double('harga')->nullable();
            $table->string('no_pabrik', 50)->nullable();
            $table->string('no_rangka', 50)->nullable();
            $table->string('no_mesin', 50)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->integer('created_id')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('updated_id')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('deleted_id')->nullable();

            $table->foreign('id_jenis')->references('id')->on('jenis_barang');
            $table->foreign('id_merk')->references('id')->on('merk');
            $table->foreign('id_tipe')->references('id')->on('tipe');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
