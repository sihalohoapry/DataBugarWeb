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
        Schema::create('tes_mandiri_siswas', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id');
            $table->double('berat_badan')->nullable();
            $table->double('tinggi_badan')->nullable();
            $table->double('point_imt')->nullable();
            $table->string('result_imt')->nullable();

            $table->double('pushup')->nullable();
            $table->double('situp')->nullable();
            $table->double('backup')->nullable();
            $table->double('squatjump')->nullable();
            $table->double('pullup')->nullable();

            $table->double('waktu_lari')->nullable();
            $table->double('waktu_jalan')->nullable();
            $table->string('jenis_kebugaran')->nullable();
            $table->double('point_kebugaran')->nullable();
            $table->string('result_kebugaran')->nullable();


            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tes_mandiri_siswas');
    }
};
