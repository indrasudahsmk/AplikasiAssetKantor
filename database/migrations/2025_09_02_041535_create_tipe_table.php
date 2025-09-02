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
        Schema::create('tipe', function (Blueprint $table) {
            $table->id();
            $table->string('tipe', 100)->nullable();
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
        Schema::dropIfExists('tipe');
    }
};
