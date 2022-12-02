<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Module;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->text('title');
            $table->text('subtitle')->nullable();
            $table->text('summary')->nullable();
            $table->text('url')->nullable();
            $table->integer('duration_in_minutes')->nullable();
            $table->enum('status', [Module::DRAFT, Module::PENDING, Module::PUBLISH, Module::INITIATED, Module::FINALIZED])->default(1);
            $table->text('slug');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('level_id')->nullable();
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->unsignedBigInteger('price_id')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->unsignedBigInteger('modality_id')->nullable();
            $table->unsignedBigInteger('language_id')->nullable();
            $table->unsignedBigInteger('program_id')->nullable();
            // $table->integer('order')->nullable();

            // $table->unsignedBigInteger('learning_path_id');
            // $table->foreign('learning_path_id')->references('id')->on('learning_paths')->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('set null');
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('set null');
            $table->foreign('price_id')->references('id')->on('prices')->onDelete('set null');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
            $table->foreign('modality_id')->references('id')->on('modalities')->onDelete('set null');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('set null');
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('set null');
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
        Schema::dropIfExists('modules');
    }
}
