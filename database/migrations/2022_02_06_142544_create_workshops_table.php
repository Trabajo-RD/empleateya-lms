<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Workshop;

class CreateWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('summary');
            $table->text('url')->nullable();
            $table->integer('duration_in_minutes')->nullable();
            $table->enum('status', [Workshop::DRAFT, Workshop::PENDING, Workshop::PUBLISH, Workshop::TRASH, Workshop::INITIATED, Workshop::FINALIZED])->default(1);
            $table->text('slug');
            $table->integer('required_min_age');
            $table->integer('required_max_age');
            $table->integer('audience')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('include_certificate')->default(0);

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('program_id')->nullable();
            $table->unsignedBigInteger('price_id');
            $table->unsignedBigInteger('modality_id');
            $table->unsignedBigInteger('course_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('program_id')->references('id')->on('programs')->nullOnDelete();
            $table->foreign('price_id')->references('id')->on('prices');
            $table->foreign('modality_id')->references('id')->on('modalities');
            $table->foreign('course_id')->references('id')->on('courses')->nullOnDelete();;

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
        Schema::dropIfExists('workshops');
    }
}
