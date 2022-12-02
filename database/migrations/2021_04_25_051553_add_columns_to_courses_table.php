<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->integer('audience')->nullable();
            $table->dateTimeTz('start_date')->nullable();
            $table->dateTimeTz('end_date')->nullable();

            // Foreign
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign('courses_topic_id_foreign');
            $table->dropColumn('topic_id');
            // $table->dropForeign('audiences_course_id_foreign');
            $table->dropColumn('audience');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
        });
    }
}
