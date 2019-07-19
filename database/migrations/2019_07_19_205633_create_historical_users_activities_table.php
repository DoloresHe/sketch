<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricalUsersActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historical_users_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->default(0)->index();
            $table->string('ip', 45)->nullable()->index();//用户ip
            $table->dateTime('created_at')->nullable();//何时填充数据
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historical_users_activities');
    }
}
