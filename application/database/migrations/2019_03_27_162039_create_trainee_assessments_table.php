<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTraineeAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainee_assessments', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->unsignedInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->unsignedInteger('trainee_id');
            $table->foreign('trainee_id')->references('id')->on('trainees');
            $table->unsignedTinyInteger('pretest');
            $table->unsignedTinyInteger('posttest');
            $table->unsignedTinyInteger('improvement');
            $table->unsignedTinyInteger('average_trainee_satisfaction');
            $table->string('attachment');
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
        Schema::dropIfExists('trainee_assessments');
    }
}
