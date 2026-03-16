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

            $table->string('username', 10);
            $table->string('hoTen');
            $table->string('email')->unique();
            $table->string('password');

            $table->integer('nhomQuyenId');
            $table->string('sdt', 20);

            $table->date('ngaySinh')->default(DB::raw('CURRENT_DATE'));
            $table->boolean('laGioiTinhNu');

            $table->text('ggid')->nullable();
            $table->text('urlAvatar')->nullable();

            $table->boolean('isStudent');
            $table->boolean('isLocked')->default(false);
            $table->boolean('isDeleted')->default(false);

            $table->dateTime('lastLogin')->default(now());

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
        Schema::dropIfExists('users');
    }
};
