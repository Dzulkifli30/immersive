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
        Schema::create('biodata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_usaha');
            $table->foreignId('bidang_usaha_id')->references('id')->on('usaha');
            $table->text('alamat');
            $table->string('nomor_telpon');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->json('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata');
    }
};
