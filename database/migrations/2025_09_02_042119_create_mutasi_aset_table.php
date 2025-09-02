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
        Schema::create('mutasi_aset', function (Blueprint $table) {
            $table->id('id_mutasi');
            $table->unsignedBigInteger('id_barang')->nullable();
            $table->unsignedBigInteger('dari_bidang')->nullable();
            $table->unsignedBigInteger('ke_bidang')->nullable();
            $table->date('tanggal_mutasi')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->integer('created_id')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('updated_id')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('deleted_id')->nullable();

            $table->foreign('id_barang')->references('id_barang')->on('barang');
            $table->foreign('dari_bidang')->references('id_bidang')->on('bidang');
            $table->foreign('ke_bidang')->references('id_bidang')->on('bidang');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasi_aset');
    }
};
