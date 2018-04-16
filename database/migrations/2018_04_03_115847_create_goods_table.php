<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->string('gname',50)->comment('商品名称');
            $table->string('gimg',150)->default('unknow.jpg')->comment('商品图片');
            $table->decimal('gPrise',50)->comment('商品价格');
            $table->string('gauthor')->comment('作者');
            $table->integer('gstock')->comment('商品库存');
            $table->tinyInteger('isSale')->default(1)->comment('是否上架:0:否;1:是');
            $table->tinyInteger('isHot')->default(0)->comment('是否热销:0:否;1:是');
            $table->tinyInteger('isNew')->default(0)->comment('是否新品:0:否;1:是');
            $table->integer('cate_id')->comment('所属类别');
            $table->integer('press_id')->comment('出版社ID');
            $table->text('gDesc')->comment('商品详情');
            $table->integer('saleNum')->default(0)->comment('总销售量');
            $table->integer('visitNum')->default(0)->comment('访问量');
            $table->tinyInteger('dataFlag')->default('1')->comment('删除标志;-1:删除 1:有效');
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
        Schema::dropIfExists('goods');
    }
}
