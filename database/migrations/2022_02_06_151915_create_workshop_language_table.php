<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshop_language', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('workshop_id');

            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('workshop_id')->references('id')->on('workshops');

            $table->boolean('is_primary')->default(false);

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
        Schema::dropIfExists('workshop_language');
    }
}
