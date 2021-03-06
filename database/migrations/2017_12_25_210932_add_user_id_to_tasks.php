<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //追加
            $table->integer('user_id')->unsigned()->index();
            
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
   
            
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //追加
            $table->dropForeign(['user_id']);
            $table->dropColumn('users_id');
        });
    }
}
