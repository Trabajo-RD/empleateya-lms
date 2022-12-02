<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddViewsToLearningPathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('learning_paths', function (Blueprint $table) {
            $table->bigInteger('views')->default(0);
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('learning_paths', function (Blueprint $table) {
            $table->dropColumn('views');
            $table->dropForeign('learning_paths_topic_id_foreign');
            $table->dropColumn('topic_id');
        });
    }
}
