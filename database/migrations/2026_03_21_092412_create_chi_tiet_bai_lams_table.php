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
        Schema::create('chi_tiet_bai_lams', function (Blueprint $table) {
            $table->foreignId('baiLamId')->constrained('bai_lams');
            $table->foreignId('cauHoiId')->constrained('cau_hois');

            $table->primary(['baiLamId','cauHoiId']);

            $table->boolean('isCorrectChooser')->nullable();
            $table->decimal('diem', 5, 2)->nullable();

            $table->timestamps();

            // Foreign keys
            $table->foreignId('dapAnId')->nullable()->constrained('cau_tra_lois');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_bai_lams');
    }
};
