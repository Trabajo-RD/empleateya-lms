<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\UnitContent;

class CreateUnitContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('name')->nullable();
            $table->string('slug');
            $table->string('type');

            $table->unsignedBigInteger('unit_id');
            $table->enum('status', [UnitContent::DRAFT, UnitContent::PENDING, UnitContent::PUBLISHED, UnitContent::TRASHED])->default(UnitContent::PUBLISHED);
            $table->enum('visibility', [UnitContent::PRIVATE, UnitContent::PUBLIC])->default(UnitContent::PUBLIC);
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
        Schema::dropIfExists('unit_contents');
    }
}
