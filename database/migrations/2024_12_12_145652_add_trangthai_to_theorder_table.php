<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrangthaiToTheorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theorder', function (Blueprint $table) {
            //
            $table->enum('trangthai', ['Chờ xác nhận', 'Đã xác nhận'])->default('Chờ xác nhận');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('theorder', function (Blueprint $table) {
            //
            $table->dropColumn('trangthai');
        });
    }
}
