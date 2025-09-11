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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id('id_pegawai');
            $table->string('nip_nik', 18)->nullable();
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->string('nama', 35);
            $table->unsignedBigInteger('id_jabatan');
            $table->unsignedBigInteger('id_bidang');
            $table->unsignedBigInteger('id_role')->default(0);
            $table->string('status_pegawai', 10);
            $table->timestamp('created_at')->useCurrent();
            $table->integer('created_id')->nullable();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
            $table->integer('updated_id')->nullable();
            $table->softDeletes();
            $table->integer('deleted_id')->nullable();

            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatan');
            $table->foreign('id_bidang')->references('id_bidang')->on('bidang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
