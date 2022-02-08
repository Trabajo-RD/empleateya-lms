<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopAttitudeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshop_attitude', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('attitude_id');
            $table->unsignedBigInteger('workshop_id');

            $table->foreign('attitude_id')->references('id')->on('attitudes');
            $table->foreign('workshop_id')->references('id')->on('workshops');

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
        Schema::dropIfExists('workshop_attitude');
    }
}
