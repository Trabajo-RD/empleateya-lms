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
        if(Schema::hasTable('users')){
            Schema::table('users', function (Blueprint $table) {
                // $table->renameColumn('name', 'name');
                $table->string('document_id')->after('id')->unique();
                // $table->enum('document_type', ['CED', 'PAS'])->after('document_id');
                $table->string('document_type')->default('CED')->after('document_id');
                $table->string('lastname')->nullable()->after('name');
                // $table->enum('gender', ['M', 'F', 'O', 'NS'])->nullable()->after('lastname');
                $table->string('gender')->nullable()->after('lastname');
                $table->text('options')->nullable();
                $table->string('email')->nullable()->change(); // Set email nullable to use login with Document ID
            });
        }
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
            $table->dropColumn('lastname');
            $table->dropColumn('gender');
            $table->dropColumn('options');
        });
    }
}
