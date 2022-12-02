<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetenciesTable extends Migration
{
    /**
     * Run the migrations.
     * Competencies to develope in every Task
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competencies', function (Blueprint $table) {
            $table->id();

            $table->text('name');
            $table->text('slug');
            $table->string('icon')->nullable();
            $table->integer('value')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('order')->nullable();

            $table->text('description')->nullable();

            $table->timestamps();
        });

        Schema::table('competencies', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('competencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competencies');
    }
}
