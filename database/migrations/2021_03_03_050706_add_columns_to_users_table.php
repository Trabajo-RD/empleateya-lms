<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('document_id')->after('id')->nullable();
            $table->enum('document_type', [User::IDENTITY, User::PASSPORT])->nullable()->after('document_id');
            $table->string('surname')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('document_id');
            $table->dropColumn('document_type');
            $table->dropColumn('surname');
        });
    }
}
