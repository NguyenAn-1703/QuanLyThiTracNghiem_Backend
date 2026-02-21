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
        Schema::table('users', function (Blueprint $table) {
            //xóa cột
            $table->dropColumn('status');
            $table->dropColumn('groupId');
            //thêm cột
            $table->string('username', 10);
            $table->date('ngaySinh')->default(DB::raw('CURRENT_DATE'));
            $table->boolean('laGioiTinhNu');
            $table->text('ggid');
            $table->text('urlAvatar');
            $table->boolean('isStudent')->default(true);
            $table->boolean('isLocked')->default(false);
            $table->boolean('isDeleted')->default(false);
            //đổi tên
            $table->renameColumn('fullname', 'hoTen');
            $table->renameColumn('passwordHash', 'password');
            $table->renameColumn('roleId', 'nhomQuyenId');
            $table->renameColumn('phoneNumber', 'sdt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('status');
            $table->integer('groupId');

            $table->dropColumn([
                'username',
                'ngaySinh',
                'laGioiTinhNu',
                'ggid',
                'urlAvatar',
                'isStudent',
                'isLocked',
                'isDeleted'
            ]);

            $table->renameColumn('hoTen', 'fullname');
            $table->renameColumn('password', 'passwordHash');
            $table->renameColumn('nhomQuyenId', 'roleId');
            $table->renameColumn('sdt', 'phoneNumber');
        });
    }
};
