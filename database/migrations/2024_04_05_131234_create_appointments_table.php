<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('timing_id');
            $table->foreign('timing_id')->references('id')->on('timings')->onDelete('cascade');
            $table->date('date');
            $table->string('status')->default('pending');
            $table->string('location')->nullable();
            $table->string('problem')->nullable();
            $table->text('problem_description')->nullable();
            $table->text('patient_description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
