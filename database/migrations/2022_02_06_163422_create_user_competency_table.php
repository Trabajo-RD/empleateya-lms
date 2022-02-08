<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCompetencyTable extends Migration
{
    /**
     * Run the migrations.
     * User adquiring competences when complete Workshop Activity Tasks
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_competency', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('competency_id');

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_competency');
    }
}
