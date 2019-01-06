<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('hall_id');
            $table->string('name');
            $table->text('notes')->nullable();
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('hall_id')->references('id')->on('halls');
            $table->index('course_id');
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
        Schema::dropIfExists('lectures');
    }
}
