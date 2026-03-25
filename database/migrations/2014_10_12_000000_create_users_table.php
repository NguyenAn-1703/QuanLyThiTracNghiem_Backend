<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('ma')->unique();
            $table->string('username', 10);
            $table->string('hoTen');
            $table->string('email')->unique();
            $table->string('password');

            $table->integer('nhomQuyenId');
            $table->string('sdt', 20);

            // Ngày sinh bỏ default, để nullable hoặc fill giá trị khi insert
            $table->date('ngaySinh')->nullable();

            $table->boolean('laGioiTinhNu');

            $table->text('ggid')->nullable();
            $table->text('urlAvatar')->nullable();

            $table->boolean('isStudent');
            $table->boolean('isLocked')->default(false);
            $table->boolean('isDeleted')->default(false);

            // lastLogin dùng CURRENT_TIMESTAMP trong MySQL
            $table->dateTime('lastLogin')->useCurrent();

            $table->timestamps();

            // Set charset và collation để hỗ trợ Unicode
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
