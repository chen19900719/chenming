<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('项目名称');
            $table->integer('start_time')->comment('项目开始时间');
            $table->integer('end_time')->comment('项目结束时间');
            $table->decimal('price')->comment('项目金额');
            $table->unsignedTinyInteger('contract_id')->comment('合同样式');
            $table->string('desc')->comment('项目描述');
            $table->string('thumb')->nullable()->default('Null')->comment('封面图');
            $table->string('file')->nullable()->default('Null')->comment('附件');
            $table->unsignedTinyInteger('push_id')->default('1')->comment('推送类型');
            $table->string('skill_id')->nullable()->default('Null')->comment('推送范围');
            $table->string('cate_id')->nullable()->default('Null')->comment('推送标签');
            $table->unsignedTinyInteger('pay_id')->default('1')->comment('报价方式');
            $table->unsignedTinyInteger('push_type')->default('1')->comment('支付方式');
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
        //
    }
}
