<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainerEvaluationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainer_evaluation_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('trainer_evaluation_id');
            $table->foreign('trainer_evaluation_id')->references('id')->on('trainer_evaluations');
            $table->unsignedInteger('trainer_id');
            $table->foreign('trainer_id')->references('id')->on('trainers');
            $table->enum('scientific_skills', ['unsatisfied','satisfied','highly_satisfied']);
            $table->enum('presentation_skills', ['unsatisfied','satisfied','highly_satisfied']);
            $table->enum('communication_skills', ['unsatisfied','satisfied','highly_satisfied']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainer_evaluation_attachment');
    }
}
