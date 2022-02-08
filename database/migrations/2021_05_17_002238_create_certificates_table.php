<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // $table->text('description');
            // $table->text('certificate_number');
            $table->string('slug');
            // $table->timestamp('date');
            // $table->string('responsible_name');
            // $table->string('responsible_position');

            // $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('course_id');
            // $table->unsignedBigInteger('partner_id')->nullable();

            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('course_id')->references('id')->on('courses');
            // $table->foreign('partner_id')->references('id')->on('partners')->onDelete('set null');

            $table->unsignedBigInteger('certificateable_id');
            $table->string('certificateable_type');

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
        Schema::dropIfExists('certificates');
    }
}
