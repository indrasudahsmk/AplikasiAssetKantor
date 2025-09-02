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
        Schema::create('aset_bidang', function (Blueprint $table) {
            $table->id('id_aset');
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_bidang');
            $table->string('status', 10)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->integer('created_id')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('updated_id')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('deleted_id')->nullable();

            $table->foreign('id_barang')->references('id_barang')->on('barang');
            $table->foreign('id_bidang')->references('id_bidang')->on('bidang');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset_bidang');
    }
};
