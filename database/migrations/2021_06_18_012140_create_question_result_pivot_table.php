<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionResultPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_result_pivot', function (Blueprint $table) {

            $table->integer('points')->default(0);

            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('result_id');
            $table->unsignedBigInteger('answer_id');

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');

            $table->foreign('result_id')->references('id')->on('results')->onDelete('cascade');

            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');

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
        Schema::dropIfExists('question_result_pivot');
    }
}
