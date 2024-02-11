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
        Schema::create('tes_m_e_t_s', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id');
            $table->integer('tes_id');
            $table->boolean('is_fisik_berat')->nullable();
            $table->boolean('is_fisik_sedang')->nullable();
            $table->boolean('is_fisik_ringan')->nullable();
            $table->double('repetisi_berat')->nullable();
            $table->double('repetisi_sedang')->nullable();
            $table->double('lama_berat')->nullable();
            $table->double('lama_sedang')->nullable();
            $table->double('lama_jalan')->nullable();

            $table->double('hasil_berat')->nullable();
            $table->double('hasil_sedang')->nullable();
            $table->double('hasil_ringan')->nullable();
            $table->double('hasil_met')->nullable();
            $table->string('result_met')->nullable();
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tes_m_e_t_s');
    }
};
