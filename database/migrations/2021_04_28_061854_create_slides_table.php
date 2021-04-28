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
            $table->string('subtitle')->nullable();
            $table->text('content')->nullable();
            $table->string('title_color')->nullable();
            $table->string('content_color')->nullable();
            $table->text('link')->nullable();
            $table->string('link_color')->nullable();
            $table->string('link_bg_color')->nullable();
            
            $table->enum('target', ['none', '_top', '_blank' ])->default('none');
            // $table->string('status');
            $table->enum('status', [1, 2 ])>default(2);
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
