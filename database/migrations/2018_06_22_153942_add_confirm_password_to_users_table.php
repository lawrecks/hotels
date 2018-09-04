<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConfirmPasswordToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('users','confirm_password')){
            Schema::table('users', function (Blueprint $table) {
                $table->string('confirm_password')->after('password');
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
        if(Schema::hasColumn('users','confirm_password')){
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('confirm_password');
            });
        }
    }
}
