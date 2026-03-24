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
        Schema::create('phan_congs', function (Blueprint $table) {
            //khóa ngoại
            $table->foreignId('giangVienId')
                ->constrained('users');

            $table->foreignId('monHocId')
                ->constrained('mon_hocs');

            $table->primary(['giangVienId', 'monHocId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phan_congs');
    }
};
