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
        Schema::create('giao_bai_this', function (Blueprint $table) {
            // foreign key tới bảng đề thi
            $table->foreignId('deThiId')
                ->constrained('de_this');

            // foreign key tới bảng nhóm học phần
            $table->foreignId('nhomHocPhanId')
                ->constrained('nhom_hoc_phans');

            $table->dateTime('thoiGianBatDau');
            $table->dateTime('thoiGianKetThuc');

            // primary key kép
            $table->primary(['deThiId', 'nhomHocPhanId']);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giao_bai_this');
    }
};
