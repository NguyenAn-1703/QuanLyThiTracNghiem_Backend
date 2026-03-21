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
        Schema::create('bai_lams', function (Blueprint $table) {
            $table->id();

            $table->dateTime('thoiGianBatDau');
            $table->dateTime('thoiGianNopBai')->nullable();

            $table->decimal('tongDiem', 5, 2)->nullable();
            $table->integer('soCauDung')->nullable();

            $table->enum('status', ['DANG_LAM', 'TAM_LUU', 'DA_NOP', 'BI_HUY'])
                ->default('DANG_LAM');

            $table->timestamps();

            //constraint
            $table->foreignId('thiSinhId')->constrained('users');
            $table->foreignId('deThiId')->constrained('de_this');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bai_lams');
    }
};
