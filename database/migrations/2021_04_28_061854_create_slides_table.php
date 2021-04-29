<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('content')->nullable();
            $table->string('title_color')->nullable();
            $table->string('title_color_saturation')->nullable();
            $table->string('content_color')->nullable();
            $table->string('content_color_saturation')->nullable();
            $table->string('background_color')->nullable();
            $table->string('background_color_saturation')->nullable();
            $table->string('background_color_opacity')->nullable();
            $table->text('link')->nullable();
            $table->string('link_text')->nullable();
            $table->string('link_type')->default('font-italic');
            $table->string('link_color')->nullable();
            $table->string('link_color_saturation')->nullable();
            $table->string('link_bg_color')->nullable();
            $table->string('link_bg_color_saturation')->nullable();
            $table->text('information')->nullable();
            $table->string('target')->default('none');
            // $table->string('status');
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('slides');
    }
}
