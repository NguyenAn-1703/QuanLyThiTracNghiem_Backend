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
        Schema::table('cau_hois', function (Blueprint $table) {
            $table->foreignId('chuongId')->nullable()->after('monHocId')->constrained('chuongs')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cau_hois', function (Blueprint $table) {
            $table->dropForeign(['chuongId']);
            $table->dropColumn('chuongId');
        });
    }
};
