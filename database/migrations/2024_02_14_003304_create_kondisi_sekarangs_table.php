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
        Schema::create('kondisi_sekarangs', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id');
            $table->double('berat_lalu')->nullable();
            $table->double('berat_sekarang')->nullable();
            $table->double('tinggi_lalu')->nullable();
            $table->double('tinggi_sekarang')->nullable();
            $table->double('result_berat')->nullable();
            $table->double('result_tinggi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kondisi_sekarangs');
    }
};
