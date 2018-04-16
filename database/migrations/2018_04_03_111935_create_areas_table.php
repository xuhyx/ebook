<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->integer('parentId')->comment('父ID');
            $table->string('areaName',100)->comment('地区名称');
            $table->integer('areaSort')->comment('地区区号');
            $table->char('areaKey',10)->comment('地区首字母');
            $table->tinyInteger('areaType')->default('1')->comment('级别标志;1:省 2:市 3:县区');
            $table->tinyInteger('dataFlag')->default('1')->comment('删除标志;-1:删除 1:有效');
            $table->string('areaPath',100)->comment('地区路径');
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
        Schema::dropIfExists('areas');
    }
}
