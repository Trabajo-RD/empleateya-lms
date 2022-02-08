<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserActivityTable extends Migration
{
    /**
     * Run the migrations.
     * Register any completed user workshop activities
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_activity', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('activity_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('activity_id')->references('id')->on('activities');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('user_activity');
    }
}
