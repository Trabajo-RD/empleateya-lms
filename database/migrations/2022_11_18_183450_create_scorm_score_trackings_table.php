<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScormScoreTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scorm_score_trackings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('scorm_score_id')->unsigned();
            $table->string('uuid');
            $table->double('progression');
            $table->integer('score_raw')->nullable();
            $table->integer('score_min')->nullable();
            $table->integer('score_max')->nullable();
            $table->decimal('score_scaled', 10,7)->nullable();
            $table->string('lesson_status')->nullable();
            $table->string('completion_status')->nullable();
            $table->integer('session_time')->nullable();
            $table->integer('total_time_int')->nullable();
            $table->string('total_time_string')->nullable();
            $table->string('entry')->nullable();
            $table->longText('suspend_data')->nullable();
            $table->string('credit')->nullable();
            $table->string('exit_mode')->nullable();
            $table->string('lesson_location')->nullable();
            $table->string('lesson_mode')->nullable();
            $table->tinyInteger('is_locked')->nullable();
            $table->longText('details')->comment('json_array')->nullable();
            $table->dateTime('latest_date')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('scorm_score_id')->references('id')->on('scorm_scores');

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
        Schema::dropIfExists('scorm_score_trackings');
    }
}
