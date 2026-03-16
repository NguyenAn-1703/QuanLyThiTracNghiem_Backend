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
        Schema::create('mon_hocs', function (Blueprint $table) {
            $table->id();
            $table->string('tenMonHoc', 150);
            $table->integer('soTinChi');

            $table->integer('soTietLyThuyet')->nullable();
            $table->integer('soTietThucHanh')->nullable();

            $table->boolean('isDeleted')->default(false); // xóa mềm

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mon_hocs');
    }
};
