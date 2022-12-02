<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCourseUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_user', function (Blueprint $table) {
            $table->tinyInteger('status')->default(0);
            $table->timestamp('end_date')->nullable();
            $table->unsignedBigInteger('certificate_id')->nullable();

            $table->foreign('certificate_id')->references('id')->on('certificates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_user', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('end_date');
            $table->dropForeign('course_user_certificate_id_foreign');
            $table->dropColumn('certificate_id');
        });
    }
}
