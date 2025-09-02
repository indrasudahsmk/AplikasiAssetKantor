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
        Schema::create('aset_pegawai', function (Blueprint $table) {
            $table->id('id_aset');
            $table->unsignedBigInteger('id_barang')->nullable();
            $table->unsignedBigInteger('id_pegawai')->nullable();
            $table->string('status', 20)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->integer('created_id')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('updated_id')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('deleted_id')->nullable();

            $table->foreign('id_barang')->references('id_barang')->on('barang');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset_pegawai');
    }
};
