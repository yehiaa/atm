<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_registration', function (Blueprint $table) {
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('trainee_id');

            $table->unsignedInteger('created_by');
            $table->unsignedInteger('payment_by');

            $table->dateTime('payment_at');

            $table->string('status')->nullable();
            $table->string('notes')->nullable();
            $table->integer('payment_amount')->default(0);
            $table->boolean('is_paid')->default(false);

            $table->smallInteger('payment_type')->nullable(); //cash , visa , nomination
            $table->unsignedInteger('affiliation_id')->nullable();
            $table->string('reference')->nullable();

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('trainee_id')->references('id')->on('trainees');

            $table->foreign('affiliation_id')->references('id')->on('affiliations');

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('payment_by')->references('id')->on('users');

            $table->index('course_id');
            $table->index('trainee_id');
            $table->primary(['trainee_id', 'course_id']);

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
        Schema::dropIfExists('course_registration');
    }
}
