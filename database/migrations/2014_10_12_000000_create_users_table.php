<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->string('name','32')->unique()->comment('用户名');
            $table->string('email','32')->nullable()->unique();
            $table->string('password','80')->comment('密码');
            $table->tinyInteger('status')->default('1')->comment('状态,1:激活,0:锁定');
            $table->tinyInteger('auth')->default('2')->comment('状态,0:超级管理员,1:系统管理员,2:会员');
            $table->bigInteger('telephone')->nullable()->comment('电话');
            $table->string('picture','80')->default('unknow.jpg')->comment('头像图片');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
