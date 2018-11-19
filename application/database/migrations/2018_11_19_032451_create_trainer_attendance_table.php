<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainerAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainer_attendance', function (Blueprint $table) {
            $table->unsignedInteger('trainer_id');
            $table->unsignedInteger('lecture_id');

            $table->unsignedInteger('created_by');
            $table->dateTime('attended_at');

            $table->foreign('lecture_id')->references('id')->on('lectures');
            $table->foreign('trainer_id')->references('id')->on('trainers');
            $table->foreign('created_by')->references('id')->on('users');

            $table->index('lecture_id');
            $table->index('trainer_id');
            $table->primary(['trainer_id', 'lecture_id']);
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
        Schema::dropIfExists('trainer_attendance');
    }
}
