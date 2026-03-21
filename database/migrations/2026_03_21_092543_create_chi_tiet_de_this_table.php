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
        Schema::create('chi_tiet_de_this', function (Blueprint $table) {
            $table->foreignId('cauHoiId')->constrained('cau_hois');
            $table->foreignId('deThiId')->constrained('de_this');

            $table->primary(['cauHoiId','deThiId']);

            $table->integer('thuTu');
            $table->decimal('diem', 5, 2)->default(1.00);

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
        Schema::dropIfExists('chi_tiet_de_this');
    }
};
