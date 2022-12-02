<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\LearningPath;

class CreateLearningPathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_paths', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->text('title');
            $table->text('subtitle')->nullable();
            $table->text('slug');
            $table->text('summary')->nullable();
            $table->text('url')->nullable();
            $table->integer('duration_in_minutes')->nullable();
            $table->enum('status', [LearningPath::DRAFT, LearningPath::PENDING, LearningPath::PUBLISH, LearningPath::TRASH])->default(1);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('level_id')->nullable();
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('set null');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
            $table->unsignedBigInteger('modality_id')->nullable();
            $table->foreign('modality_id')->references('id')->on('modalities')->onDelete('set null');
            $table->unsignedBigInteger('program_id')->nullable();
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('set null');
            $table->unsignedBigInteger('price_id')->default(1);
            $table->foreign('price_id')->references('id')->on('prices');
            $table->unsignedBigInteger('language_id')->nullable();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('set null');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learning_paths');
    }
}
