<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TaskContent;

class CreateTaskContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('name')->nullable();
            $table->string('slug');
            $table->string('type');

            $table->unsignedBigInteger('task_id');
            $table->enum('status', [TaskContent::DRAFT, TaskContent::PENDING, TaskContent::PUBLISHED, TaskContent::TRASHED])->default(TaskContent::PUBLISHED);
            $table->enum('visibility', [TaskContent::PRIVATE, TaskContent::PUBLIC])->default(TaskContent::PUBLIC);
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
        Schema::dropIfExists('task_contents');
    }
}
