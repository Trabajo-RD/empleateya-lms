<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_skill', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('skill_id');

            $table->foreign('lesson_id')->references('id')->on('lessons');
            $table->foreign('skill_id')->references('id')->on('skills');

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
        Schema::dropIfExists('lesson_skill');
    }
}
