<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Content;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();



            $table->integer('order')->nullable();
            $table->enum('visibility', [Content::HIDDEN, Content::VISIBLE])->default(Content::VISIBLE);

            $table->unsignedBigInteger('contentable_id');
            $table->string('contentable_type');

            // $table->unsignedBigInteger('lesson_id')->nullable();
            // $table->unsignedBigInteger('unit_id')->nullable();
            // $table->unsignedBigInteger('task_id')->nullable();

            // $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
            // $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            // $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');

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
        Schema::dropIfExists('contents');
    }
}
