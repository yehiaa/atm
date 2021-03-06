<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('phone')->unique();

            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('attachment')->nullable();
            $table->string('identity')->unique();
            $table->enum('identity_type', ['passport','national']);

            $table->unsignedInteger('speciality_id');
            $table->foreign('speciality_id')->references('id')->on('specialties');


            $table->unsignedInteger('university_affiliation_id')->nullable();
            $table->foreign('university_affiliation_id')->references('id')->on('university_affiliations');

            $table->unsignedInteger('professional_data_id')->nullable();
            $table->foreign('professional_data_id')->references('id')->on('professional_data');

            $table->string('affiliate_university')->nullable();

            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->text('experiences')->nullable();

            $table->boolean('is_cooperate')->nullable();

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
        Schema::dropIfExists('trainers');
    }
}
