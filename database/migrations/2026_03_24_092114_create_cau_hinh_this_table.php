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
        Schema::create('cau_hinh_this', function (Blueprint $table) {
            $table->id('cauHinhId');
            $table->foreignId('deThiId')->unique()->constrained('de_this');

            $table->boolean('hasMonitoring')->default(false);

            $table->boolean('allowCopy')->default(false);
            $table->boolean('allowPrint')->default(false);
            $table->boolean('isEnableResume')->default(false);

            $table->boolean('shuffleQuestions')->default(true);
            $table->boolean('shuffleAnswers')->default(true);

            $table->boolean('showScore')->default(true);
            $table->boolean('showDetailResults')->default(true);

            $table->boolean('isLimitSwitchTab')->default(false);
            $table->integer('tabSwitchLimit')->default(999);
            $table->text('messageOnWarning')->nullable();

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
        Schema::dropIfExists('cau_hinh_this');
    }
};
