<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // $table->string('subject');
            // $table->string('specialization');
            // $table->integer('work_experience');
            // $table->string('education');
            // $table->string('work_field');
            // $table->string('reference_name');
            // $table->string('reference_position');
            // $table->string('reference_email');
            // $table->string('reference_contact');
            // $table->text('message');
            // $table->string('file')->nullable();
            // $table->string('status')->default('pending');
            // $table->text('reason')->nullable();
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
