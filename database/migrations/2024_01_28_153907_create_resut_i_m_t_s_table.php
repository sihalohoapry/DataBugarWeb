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
        Schema::create('resut_i_m_t_s', function (Blueprint $table) {
            $table->id();
            $table->string('result');
            $table->string('gender');
            $table->double('start_value', 8, 2);
            $table->double('end_value', 8, 2);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resut_i_m_t_s');
    }
};
