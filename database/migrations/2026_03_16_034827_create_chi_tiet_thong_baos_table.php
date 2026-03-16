<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_thong_baos', function (Blueprint $table) {
            // foreign key tới bảng tài khoản
            $table->foreignId('taiKhoanId')
                ->constrained('users');

            // foreign key tới bảng thông báo
            $table->foreignId('thongBaoId')
                ->constrained('thong_baos');

            // primary key kép
            $table->primary(['taiKhoanId', 'thongBaoId']);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_thong_baos');
    }
};
