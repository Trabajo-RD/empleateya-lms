<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopAbilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshop_ability', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('ability_id');
            $table->unsignedBigInteger('workshop_id');

            $table->foreign('ability_id')->references('id')->on('abilities');
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
        Schema::dropIfExists('workshop_ability');
    }
}
