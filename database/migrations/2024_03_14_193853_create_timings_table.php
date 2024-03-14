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
        Schema::create('timings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id')->constrained()->onDelete('cascade');
            $table->string('day');
            $table->unsignedTinyInteger('shift'); // 1-3 shifts
            $table->time('start_time');
            $table->time('end_time');
            $table->unsignedSmallInteger('avg_consultation_time'); // In minutes
            $table->timestamps();

            $table->foreign('doctor_id')->references('id')->on('doctors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timings');
    }
};
