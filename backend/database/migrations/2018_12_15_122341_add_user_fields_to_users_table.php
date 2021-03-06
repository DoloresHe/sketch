<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserFieldsToUsersTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();//软删除必备
            $table->unsignedInteger('title_id')->default(0);//头衔id
            $table->unsignedInteger('unread_reminders')->default(0);//未读消息提醒
            $table->unsignedInteger('unread_updates')->default(0);//未读更新提示
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
            //
        });
    }
}
