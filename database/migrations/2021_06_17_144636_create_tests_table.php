<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->longText('name');
            $table->longText('slug');
            $table->longText('summary')->nullable();
            $table->tinyInteger('is_required')->default('0'); // required to complete the course?
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->integer('time_limit')->default('0'); // in seconds
            $table->tinyInteger('status')->default('0'); // visible or hidden
            $table->string('handle_time_over')->default('autoabandon'); // autoabandon, autosubmit, graceperiod
            $table->integer('grace_period')->default('0'); // in seconds, after the time limit, before submit, if handle_time_over is equal to 'grace_period'
            $table->integer('attempts')->default('1');
            $table->tinyInteger('grade_method')->default('1'); // TEST_GRADEHIGHEST, TEST_GRADEAVERAGE, TEST_ATTEMPTFIRST or TEST_ATTEMPTLAST.
            $table->string('nav_method')->default('free'); // free navigation or sequency 'seq' navigator
            $table->string('password')->nullable();
            $table->string('sub_net')->nullable();
            $table->string('browser_security')->nullable();

            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('course_id');

            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

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
        Schema::dropIfExists('tests');
    }
}
