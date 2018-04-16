<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->tinyInteger('user_id')->comment('用户id');
            $table->integer('cate_id')->comment('所属分类');
            $table->string('title',255)->comment('文章标题');
            $table->string('descr',255)->comment('文章简介');
            $table->text('content')->comment('文章内容');
            $table->string('picture',50)->default('unknow.jpg')->comment('文章配图');
            $table->tinyInteger('state')->default(0)->comment('是否公开;0:私有 1:公开');
            $table->tinyInteger('flag')->default(0)->comment('审核标志;0:未审核 1:审核 2:锁定');
            $table->integer('click_num')->default(0)->comment('点击量');
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
        Schema::dropIfExists('articles');
    }
}
