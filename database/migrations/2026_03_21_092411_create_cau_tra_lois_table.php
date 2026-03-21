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
        Schema::create('cau_tra_lois', function (Blueprint $table) {
            $table->id();

            $table->text('noiDungLuaChon');
            $table->boolean('isCorrectAnswer');

            $table->timestamps();

            // Foreign key
            $table->foreignId('cauHoiId')->constrained('cau_hois');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cau_tra_lois');
    }
};
