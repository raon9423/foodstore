<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('OrderDetail', function (Blueprint $table) {
            $table->unsignedInteger('id_donhang');
            $table->unsignedInteger('id_sanpham');
            $table->float('thanhtien');
            $table->integer('soluong');
            $table->timestamps();

            $table->foreign('id_donhang')->references('id_donhang')->on('TheOrder');
            $table->foreign('id_sanpham')->references('id_sanpham')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('OrderDetail');
    }
}
