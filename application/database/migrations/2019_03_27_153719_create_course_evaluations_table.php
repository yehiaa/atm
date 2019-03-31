<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('course_evaluations', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->unsignedInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->unsignedInteger('trainee_id');
            $table->foreign('trainee_id')->references('id')->on('trainees');
            $table->enum('organization', ['unsatisfied','satisfied','highly_satisfied']);
            $table->enum('educational_tools', ['unsatisfied','satisfied','highly_satisfied']);
            $table->enum('cofee_break', ['unsatisfied','satisfied','highly_satisfied']);
            $table->enum('overall_evaluation', ['unsatisfied','satisfied','highly_satisfied']);
            $table->string('comment')->nullable();
            $table->string('attachment')->nullable();
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
        Schema::dropIfExists('course_evaluations');
    }
}
