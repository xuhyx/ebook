<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id',32)->nullable()->comment('用户ID');
            $table->tinyInteger('type')->comment('收藏类型;1:文章;2:商品');
            $table->string('goodsId',32)->nullable()->comment('文章或商品ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorates');
    }
}
