<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScormScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scorm_scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scorm_id');
            $table->string('uuid');
            $table->bigInteger('sco_parent_id')->unsigned()->nullable();
            $table->string('entry_url')->nullable();
            $table->string('identifier');
            $table->string('title');
            $table->tinyInteger('visible');
            $table->longText('sco_parameters')->nullable();
            $table->longText('launch_data')->nullable();
            $table->string('max_time_allowed')->nullable();
            $table->string('time_limit_action')->nullable();
            $table->tinyInteger('block');
            $table->integer('score_int')->nullable();
            $table->decimal('score_decimal', 10,7)->nullable();
            $table->decimal('completion_threshold', 10,7)->nullable();
            $table->string('prerequisites')->nullable();

            $table->foreign('scorm_id')->references('id')->on('scorms');

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
        Schema::dropIfExists('scorm_scores');
    }
}
