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
        Schema::create('nhom_hoc_phans', function (Blueprint $table) {
            $table->id();

            $table->string('tenNhom', 100);

            $table->string('maMoi', 20)->unique(); // mã mời

            $table->text('notes')->nullable();

            $table->integer('hocKy');
            $table->integer('namHoc');

            $table->string('urlBackground')->default('default.png');

            $table->integer('giangVienId');

            $table->boolean('isHide')->default(false);
            $table->boolean('isDeleted')->default(false); // xóa mềm

            // $table->timestamps();

            //foreign
            $table->foreignId('monHocId')
                ->constrained('mon_hocs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhom_hoc_phans');
    }
};
