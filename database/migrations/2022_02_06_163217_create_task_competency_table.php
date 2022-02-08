<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskCompetencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_competency', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('competency_id');

            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('competency_id')->references('id')->on('competencies');

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
        Schema::dropIfExists('task_competency');
    }
}
