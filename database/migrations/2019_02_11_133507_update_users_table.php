<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role_id')->index()->unsigned()->nullable();
            $table->integer('is_active')->default('0');
            $table->integer('is_admin')->default('0');
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_id');
            $table->dropColumn('is_active');
            $table->dropColumn('is_admin');
        });
    }
}
