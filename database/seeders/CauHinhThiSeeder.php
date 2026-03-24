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
            [
                'deThiId' => 3,
                'hasMonitoring' => true,
                'allowCopy' => false,
                'allowPrint' => false,
                'isEnableResume' => false,
                'shuffleQuestions' => false,
                'shuffleAnswers' => true,
                'showScore' => false,
                'showDetailResults' => false,
                'isLimitSwitchTab' => true,
                'tabSwitchLimit' => 1,
                'messageOnWarning' => 'Không được chuyển tab khi làm bài thi.',
            ],
            [
                'deThiId' => 4,
                'hasMonitoring' => false,
                'allowCopy' => true,
                'allowPrint' => true,
                'isEnableResume' => true,
                'shuffleQuestions' => false,
                'shuffleAnswers' => false,
                'showScore' => true,
                'showDetailResults' => true,
                'isLimitSwitchTab' => false,
                'tabSwitchLimit' => 999,
                'messageOnWarning' => null,
            ],
            [
                'deThiId' => 5,
                'hasMonitoring' => true,
                'allowCopy' => false,
                'allowPrint' => false,
                'isEnableResume' => true,
                'shuffleQuestions' => true,
                'shuffleAnswers' => false,
                'showScore' => true,
                'showDetailResults' => true,
                'isLimitSwitchTab' => true,
                'tabSwitchLimit' => 5,
                'messageOnWarning' => 'Hệ thống đang giám sát hành vi bất thường.',
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
