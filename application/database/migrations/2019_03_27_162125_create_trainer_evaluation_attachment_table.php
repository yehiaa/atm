<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainerEvaluationAttachmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainer_evaluation_attachment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('trainer_evaluation_id');
            $table->foreign('trainer_evaluation_id')->reference('id')->on('trainer_evaluation');
            $table->string('comment')->nullable();
            $table->string('recommendation')->nullable();
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
        Schema::dropIfExists('trainer_evaluation_attachment');
    }
}
