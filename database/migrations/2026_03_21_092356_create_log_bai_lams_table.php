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
        Schema::create('log_bai_lams', function (Blueprint $table) {
            $table->id();
            $table->integer('soLanChuyenTab')->default(0);
            $table->timestamp('createdAt')->useCurrent();

            // Foreign key
            $table->foreignId('baiLamId')->constrained('bai_lams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_bai_lams');
    }
};
