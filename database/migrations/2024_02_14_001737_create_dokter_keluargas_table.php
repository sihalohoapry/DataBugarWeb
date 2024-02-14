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
        Schema::create('dokter_keluargas', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id');
            $table->string('nama_dokter')->nullable();
            $table->longText('alamat_praktek')->nullable();
            $table->string('no_telpon')->nullable();
            $table->date('terakhir_checkup')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokter_keluargas');
    }
};
