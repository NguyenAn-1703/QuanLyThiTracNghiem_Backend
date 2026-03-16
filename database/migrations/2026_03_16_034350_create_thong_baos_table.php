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
        Schema::create('thong_baos', function (Blueprint $table) {
            $table->id();
            $table->string('tieuDe', 200);
            $table->text('noiDung');

            $table->timestamp('thoiGianGui')->useCurrent();

            $table->integer('uuTien')->default(0);
            // độ ưu tiên

            $table->boolean('status')->default(true);
            // true = còn hiển thị, false = đã xóa mềm

            // $table->timestamps();

            // ref
            $table->foreignId('nguoiGuiId')
                ->constrained('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thong_baos');
    }
};
