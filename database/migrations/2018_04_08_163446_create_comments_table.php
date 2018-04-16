<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->integer('user_id')->comment('评论用户ID');
            $table->tinyInteger('cmtType')->comment('评论类型:1:博客评论;2:书籍评论');
            $table->integer('bmId')->comment('博客或书籍ID');
            $table->text('cmtContent')->comment('评论内容');
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
        Schema::dropIfExists('comments');
    }
}
