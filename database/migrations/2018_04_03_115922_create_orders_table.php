<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->string('orderNo',20)->comment('订单号');
            $table->integer('userId')->unsigned()->default(0)->comment('用户ID;0：为0则说明是闪电购，游客直接下单');
            $table->tinyInteger('orderStatus')->default(-2)->comment('订单状态;-3:用户拒收 -2:未付款的订单 -1：用户取消 0:待发货 1:配送中 2:用户确认收货');
            $table->decimal('goodsMoney',11,2)->comment('商品总价格--未进行任何折扣的总价格');
            $table->tinyInteger('deliverType')->unsigned()->default(0)->comment('收货方式;0:送货上门 1:自提');
            $table->decimal('deliverMoney',11,2)->default('0.00')->comment('运费');
            $table->decimal('totalMoney',11,2)->comment('订单总金额--包括运费');
            $table->decimal('realTotalMoney',11,2)->default('0.00')->comment('实际订单总金额--进行各种折扣之后的金额');
            $table->tinyInteger('payType')->default(0)->comment('支付方式;0:货到付款 1:在线支付');
            $table->integer('payFrom')->unsigned()->comment('支付来源;1:支付宝，2：微信');
            $table->tinyInteger('isPay')->default(0)->comment('是否支付;0:未支付 1:已支付');
            $table->string('userName',20)->comment('收货人名称');
            $table->string('userAddress',255)->comment('收件人地址');
            $table->char('userPhone',11)->nullable()->comment('收件人手机');
            $table->tinyInteger('isInvoice')->default(0)->comment('是否需要发票;1:需要 0:不需要');
            $table->string('invoiceClient',255)->comment('发票抬头;0:不需要');
            $table->string('orderRemarks',255)->comment('订单备注');
            $table->tinyInteger('orderSrc')->default(0)->comment('订单来源;0:商城 1:微信 2:手机版');
            $table->tinyInteger('isRefund')->default(0)->comment('是否退款;0:否 1：是');
            $table->tinyInteger('isAppraise')->default(0)->nullable()->comment('是否点评;0:未点评 1:已点评');
            $table->integer('cancelReason')->unsigned()->nullable()->comment('取消原因ID');
            $table->integer('rejectReason')->unsigned()->nullable()->comment('拒收原因ID');
            $table->string('rejectOtherReason',255)->nullable()->comment('拒收原因');
            $table->tinyInteger('isClosed')->default(0)->comment('是否订单已完结;0：未完结 1:已完结');
            $table->string('orderunique',50)->comment('订单流水号');
            $table->dateTime('receiveTime')->nullable()->comment('收货时间');
            $table->dateTime('deliveryTime')->nullable()->comment('发货时间');
            $table->integer('expressId')->unsigned()->nullable()->comment('快递公司ID');
            $table->string('expressNo',20)->nullable()->comment('快递号');
            $table->string('tradeNo',100)->nullable()->comment('在线支付交易流水;0:线下支付');
            $table->tinyInteger('dataFlag')->default(1)->comment('订单有效标志;-1：删除 1:有效');
            $table->dateTime('createTime')->comment('下单时间');
            $table->integer('areaId')->unsigned()->comment('最后一级区域Id');
            $table->string('areaIdPath',255)->nullable()->comment('区域Id路径,省级id_市级id_县级Id_ 例如:110000_110100_110101_');
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
        Schema::dropIfExists('orders');
    }
}
