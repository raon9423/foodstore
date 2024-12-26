<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTheOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TheOrder', function (Blueprint $table) {
            $table->integerIncrements('id_donhang');
            $table->string('tendonhang',200);
            $table->string('hinhthucthanhtoan',200);
            $table->string('tenkhachhang',100);
            $table->string('diachi',500);
            $table->string('sdt',20);
            $table->string('email',50);
            $table->date('ngaydat');
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
        Schema::dropIfExists('TheOrder');
    }
}
