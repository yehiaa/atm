<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainerEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('trainer_evaluation', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_id');
            $table->foreign('course_id')->reference('id')->on('courses');
            $table->unsignedInteger('trainer_id');
            $table->foreign('trainer_id')->reference('id')->on('trainers');
            $table->unsignedInteger('trainee_id');
            $table->foreign('trainee_id')->reference('id')->on('trainees');
            $table->enum('scientific_skills', ['unsatisfied','satisfied','highly_satisfied']);
            $table->enum('presentation_skills', ['unsatisfied','satisfied','highly_satisfied']);
            $table->enum('communication_skills', ['unsatisfied','satisfied','highly_satisfied']);
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
        Schema::dropIfExists('trainer_evaluation');
    }
}
