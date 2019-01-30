<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTraineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('phone')->unique();

            $table->string('identity')->unique();
            $table->enum('identity_type', ['passport','national']);

            $table->unsignedInteger('speciality_id');
            $table->foreign('speciality_id')->references('id')->on('specialties');

            $table->string('country')->nullable();
            $table->string('city')->nullable();

            $table->string('government')->nullable();

            $table->string('refereedFrom')->nullable();

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
        Schema::dropIfExists('trainees');
    }
}
