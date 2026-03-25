<?php

namespace Database\Seeders;

use App\Models\CauHinhThi;
use Illuminate\Database\Seeder;

class CauHinhThiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'deThiId' => 1,
                'hasMonitoring' => false,
                'allowCopy' => false,
                'allowPrint' => false,
                'isEnableResume' => true,
                'shuffleQuestions' => true,
                'shuffleAnswers' => true,
                'showScore' => true,
                'showDetailResults' => true,
                'isLimitSwitchTab' => false,
                'tabSwitchLimit' => 999,
                'messageOnWarning' => null,
            ],
            [
                'deThiId' => 2,
                'hasMonitoring' => true,
                'allowCopy' => false,
                'allowPrint' => false,
                'isEnableResume' => false,
                'shuffleQuestions' => true,
                'shuffleAnswers' => true,
                'showScore' => true,
                'showDetailResults' => false,
                'isLimitSwitchTab' => true,
                'tabSwitchLimit' => 3,
                'messageOnWarning' => 'Bạn đã chuyển tab quá số lần cho phép.',
            ],
        ];

        foreach ($data as $item) {
            CauHinhThi::updateOrCreate(
                ['deThiId' => $item['deThiId']],
                $item
            );
        }
    }
}
