<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group', function (Blueprint $table) {
            $table->string('id_nhomsp', 20);
            $table->primary('id_nhomsp');
            $table->string('tennhom', 100);
            $table->string('id_loaisp', 20);
        
            $table->timestamps();
            // Thêm liên kết khóa ngoại
            $table->foreign('id_loaisp')->references('id_loaisp')->on('category');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group');
    }
}
