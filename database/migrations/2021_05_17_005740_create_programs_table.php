<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('responsible_name')->nullable();
            $table->string('responsible_position')->nullable();
            $table->tinyInteger('document_id_required')->default(1);
            $table->tinyInteger('adult_required')->default(1);

            // $table->unsignedBigInteger('partner_id')->nullable();
            // $table->foreign('partner_id')->references('id')->on('partners')->onDelete('cascade');

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
        Schema::dropIfExists('programs');
    }
}
