<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Course;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->text('title');
            $table->text('subtitle')->nullable();
            $table->text('summary');
            $table->text('url')->nullable();
            $table->integer('duration_in_minutes');
            $table->enum('status', [Course::DRAFT, Course::PENDING, Course::PUBLISH, Course::TRASH, Course::INITIATED, Course::FINALIZED])->default(1);
            $table->text('slug');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('level_id')->nullable();
            // $table->unsignedBigInteger('topic_id')->nullable();
            $table->unsignedBigInteger('price_id')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->unsignedBigInteger('modality_id')->nullable();
            // $table->integer('order')->nullable();

            // Foreign
            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('level_id')->references('id')->on('levels')->onDelete('set null');
            // $table->foreign('topic_id')->references('id')->on('topics')->onDelete('set null');
            $table->foreign('price_id')->references('id')->on('prices')->onDelete('set null');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
            $table->foreign('modality_id')->references('id')->on('modalities')->onDelete('set null');

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
        Schema::dropIfExists('courses');
    }
}
