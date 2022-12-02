<?php

use App\Models\Lesson;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\LessonContent;

class CreateLessonContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('name')->nullable();
            $table->string('slug');
            $table->string('type');

            $table->unsignedBigInteger('lesson_id');
            $table->enum('status', [LessonContent::DRAFT, LessonContent::PENDING, LessonContent::PUBLISHED, LessonContent::TRASHED])->default(LessonContent::PUBLISHED);
            $table->enum('visibility', [LessonContent::PRIVATE, LessonContent::PUBLIC])->default(LessonContent::PUBLIC);
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
        Schema::dropIfExists('lesson_contents');
    }
}
