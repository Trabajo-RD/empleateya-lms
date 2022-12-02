<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->text('title');
            $table->text('slug');
            $table->longText('content')->nullable();
            $table->text('summary')->nullable();
            // $table->integer('order')->nullable();
            $table->text('url')->nullable();
            $table->text('iframe')->nullable();
            $table->integer('duration_in_minutes')->nullable();

            // $table->unsignedBigInteger('module_id')->nullable();
            // $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');

            // $table->unsignedBigInteger('platform_id')->nullable();
            // $table->foreign('platform_id')->references('id')->on('platforms')->onDelete('set null');

            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');

            $table->unsignedBigInteger('language_id')->nullable();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('set null');

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
        Schema::dropIfExists('units');
    }
}
