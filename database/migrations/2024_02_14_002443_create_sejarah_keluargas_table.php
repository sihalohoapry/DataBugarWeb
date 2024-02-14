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
        Schema::create('sejarah_keluargas', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id');
            $table->longText('masalah_kesehatan_kk')->nullable();
            $table->string('meninggal_under_50')->nullable();
            $table->longText('deskripsi_penyebab_meninggal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sejarah_keluargas');
    }
};
