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
        Schema::create('de_this', function (Blueprint $table) {
            $table->id();
            $table->integer('monThiId');

            $table->string('tenDe', 255);

            $table->dateTime('thoiGianBatDau');
            $table->dateTime('thoiGianKetThuc');

            $table->integer('thoiGianLamBai'); // phút

            $table->boolean('isDeleted')->default(false);

            $table->timestamps();

            $table->foreignId('nguoiTaoId')
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
        Schema::dropIfExists('de_this');
    }
};
