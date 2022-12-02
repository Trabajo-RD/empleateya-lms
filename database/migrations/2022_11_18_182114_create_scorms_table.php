<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scorms', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('summary')->nullable();
            $table->string('origin_file')->nullable();
            $table->string('data_from_lms');
            $table->string('version')->nullable();
            $table->double('ratio')->nullable();
            $table->string('uuid');
            $table->string('identifier')->nullable();
            $table->string('entry_url')->nullable();
            $table->longText('data')->nullable();

            $table->unsignedBigInteger('scormable_id');
            $table->string('scormable_type');

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
        Schema::dropIfExists('scorms');
    }
}
