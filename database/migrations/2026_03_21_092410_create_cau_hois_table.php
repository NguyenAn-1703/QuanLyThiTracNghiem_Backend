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
        Schema::create('cau_hois', function (Blueprint $table) {
            $table->id();

            $table->text('noiDungCauHoi');

            $table->text('imageUrl')->nullable();

            $table->text('giaiThichDapAn')->nullable();
            $table->decimal('diemMacDinh', 5, 2)->default(1.00);

            $table->integer('soLuotSuDung')->default(0);

            $table->enum('status', ['public', 'private', 'archive'])->default('private');
            $table->boolean('isDeleted')->default(false);

            $table->timestamps();

            // Foreign keys
            $table->unsignedBigInteger('doKhoId')->nullable(); //chỉnh sửa khi có bảng độ khó

            $table->foreignId('monHocId')->constrained('mon_hocs');
            $table->foreignId('nguoiTaoId')->contrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cau_hois');
    }
};
