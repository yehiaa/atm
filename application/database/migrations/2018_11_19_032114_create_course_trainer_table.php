<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTrainerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_trainer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('trainer_id');

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('trainer_id')->references('id')->on('trainers');


            $table->unique(['trainer_id', 'course_id']);

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
        Schema::dropIfExists('course_trainer');
    }
}
