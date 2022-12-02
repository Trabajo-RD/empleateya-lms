<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttitudesTable extends Migration
{
    /**
     * Run the migrations.
     * Asign Attitude to Workshops
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attitudes', function (Blueprint $table) {
            $table->id();

            $table->text('name');
            $table->text('slug');
            $table->string('icon')->nullable();
            $table->integer('order')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('workshop_id');
            $table->foreign('workshop_id')->references('id')->on('workshops')->onDelete('cascade');
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
        Schema::dropIfExists('attitudes');
    }
}
