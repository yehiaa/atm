<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTraineeAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainee_attendance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('trainee_id');
            $table->unsignedInteger('lecture_id');

            $table->unsignedInteger('created_by');
            $table->dateTime('attended_at');

            $table->foreign('lecture_id')->references('id')->on('lectures');
            $table->foreign('trainee_id')->references('id')->on('trainees');
            $table->foreign('created_by')->references('id')->on('users');


            $table->unique(['trainee_id', 'lecture_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainee_attendance');
    }
}
