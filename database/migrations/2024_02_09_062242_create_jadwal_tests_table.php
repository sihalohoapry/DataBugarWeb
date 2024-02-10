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
        Schema::create('jadwal_tests', function (Blueprint $table) {
            $table->id();
            $table->integer('created_by');
            $table->string('nomer_tes');
            $table->integer('class_id');
            $table->integer('sekolah_id');
            $table->dateTime('start_tes');
            $table->dateTime('end_tes');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_tests');
    }
};
