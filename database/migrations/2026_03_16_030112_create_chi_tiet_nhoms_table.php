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
        Schema::create('chi_tiet_nhoms', function (Blueprint $table) {
            //khóa ngoại
            $table->foreignId('sinhVienId')
                ->constrained('users');

            $table->foreignId('nhomHocPhanId')
                ->constrained('nhom_hoc_phans');

            $table->primary(['sinhVienId', 'nhomHocPhanId']);
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_nhoms');
    }
};
