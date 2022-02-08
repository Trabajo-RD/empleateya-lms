<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrganizationToWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('workshops', function (Blueprint $table) {
            $table->unsignedBigInteger('learning_path_id')->nullable();

            $table->foreign('learning_path_id')->references('id')->on('learning_paths')->onDelete('set null');

            $table->unsignedBigInteger('organization_id')->nullable();

            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workshops', function (Blueprint $table) {
            $table->dropColumn('learning_path_id');
            $table->dropColumn('organization_id');
        });
    }
}
