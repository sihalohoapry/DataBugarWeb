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
        Schema::create('pola_tidurs', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id');
            $table->time('jam_tidur');
            $table->time('jam_bangun');
            $table->boolean('durasi_tidur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pola_tidurs');
    }
};
