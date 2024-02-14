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
        Schema::create('permasalahan_medis_terakhirs', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id');
            $table->longText('nama_permasalahan_medis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permasalahan_medis_terakhirs');
    }
};
