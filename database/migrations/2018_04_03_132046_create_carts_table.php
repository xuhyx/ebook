<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->integer('userId')->default(0)->comment('用户ID');
            $table->tinyInteger('isCheck')->default(1)->comment('是否选中;0:否;1:是');
            $table->integer('goodsId')->default(0)->comment('商品id');
            $table->integer('cartNum')->default(0)->comment('商品数量');
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
        Schema::dropIfExists('carts');
    }
}
