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
            ['deThiId' => 1,  'hasMonitoring' => false, 'allowCopy' => false, 'allowPrint' => false, 'isEnableResume' => true, 'shuffleQuestions' => true, 'shuffleAnswers' => true, 'showScore' => true, 'showDetailResults' => true,  'isLimitSwitchTab' => false, 'tabSwitchLimit' => 999, 'messageOnWarning' => null],
            ['deThiId' => 2,  'hasMonitoring' => false, 'allowCopy' => false, 'allowPrint' => false, 'isEnableResume' => true, 'shuffleQuestions' => true, 'shuffleAnswers' => true, 'showScore' => true, 'showDetailResults' => false, 'isLimitSwitchTab' => false, 'tabSwitchLimit' => 999, 'messageOnWarning' => null],
            ['deThiId' => 3,  'hasMonitoring' => false, 'allowCopy' => false, 'allowPrint' => false, 'isEnableResume' => true, 'shuffleQuestions' => true, 'shuffleAnswers' => true, 'showScore' => true, 'showDetailResults' => true,  'isLimitSwitchTab' => false, 'tabSwitchLimit' => 999, 'messageOnWarning' => null],
            ['deThiId' => 4,  'hasMonitoring' => false, 'allowCopy' => false, 'allowPrint' => false, 'isEnableResume' => true, 'shuffleQuestions' => true, 'shuffleAnswers' => true, 'showScore' => true, 'showDetailResults' => false, 'isLimitSwitchTab' => false, 'tabSwitchLimit' => 999, 'messageOnWarning' => null],
            ['deThiId' => 5,  'hasMonitoring' => false, 'allowCopy' => false, 'allowPrint' => false, 'isEnableResume' => true, 'shuffleQuestions' => true, 'shuffleAnswers' => true, 'showScore' => true, 'showDetailResults' => true,  'isLimitSwitchTab' => false, 'tabSwitchLimit' => 999, 'messageOnWarning' => null],
            ['deThiId' => 6,  'hasMonitoring' => false, 'allowCopy' => false, 'allowPrint' => false, 'isEnableResume' => true, 'shuffleQuestions' => true, 'shuffleAnswers' => true, 'showScore' => true, 'showDetailResults' => false, 'isLimitSwitchTab' => false, 'tabSwitchLimit' => 999, 'messageOnWarning' => null],
            ['deThiId' => 7,  'hasMonitoring' => false, 'allowCopy' => false, 'allowPrint' => false, 'isEnableResume' => true, 'shuffleQuestions' => true, 'shuffleAnswers' => true, 'showScore' => true, 'showDetailResults' => true,  'isLimitSwitchTab' => false, 'tabSwitchLimit' => 999, 'messageOnWarning' => null],
            ['deThiId' => 8,  'hasMonitoring' => false, 'allowCopy' => false, 'allowPrint' => false, 'isEnableResume' => true, 'shuffleQuestions' => true, 'shuffleAnswers' => true, 'showScore' => true, 'showDetailResults' => false, 'isLimitSwitchTab' => false, 'tabSwitchLimit' => 999, 'messageOnWarning' => null],
            ['deThiId' => 9,  'hasMonitoring' => false, 'allowCopy' => false, 'allowPrint' => false, 'isEnableResume' => true, 'shuffleQuestions' => true, 'shuffleAnswers' => true, 'showScore' => true, 'showDetailResults' => true,  'isLimitSwitchTab' => false, 'tabSwitchLimit' => 999, 'messageOnWarning' => null],
            ['deThiId' => 10, 'hasMonitoring' => false, 'allowCopy' => false, 'allowPrint' => false, 'isEnableResume' => true, 'shuffleQuestions' => true, 'shuffleAnswers' => true, 'showScore' => true, 'showDetailResults' => false, 'isLimitSwitchTab' => false, 'tabSwitchLimit' => 999, 'messageOnWarning' => null],

            ['deThiId' => 11, 'hasMonitoring' => false, 'allowCopy' => false, 'allowPrint' => false, 'isEnableResume' => true, 'shuffleQuestions' => true, 'shuffleAnswers' => true, 'showScore' => true, 'showDetailResults' => true,  'isLimitSwitchTab' => false, 'tabSwitchLimit' => 999, 'messageOnWarning' => null],
            ['deThiId' => 12, 'hasMonitoring' => false, 'allowCopy' => false, 'allowPrint' => false, 'isEnableResume' => true, 'shuffleQuestions' => true, 'shuffleAnswers' => true, 'showScore' => true, 'showDetailResults' => false, 'isLimitSwitchTab' => false, 'tabSwitchLimit' => 999, 'messageOnWarning' => null],
            ['deThiId' => 13, 'hasMonitoring' => false, 'allowCopy' => false, 'allowPrint' => false, 'isEnableResume' => true, 'shuffleQuestions' => true, 'shuffleAnswers' => true, 'showScore' => true, 'showDetailResults' => true,  'isLimitSwitchTab' => false, 'tabSwitchLimit' => 999, 'messageOnWarning' => null],
            ['deThiId' => 14, 'hasMonitoring' => false, 'allowCopy' => false, 'allowPrint' => false, 'isEnableResume' => true, 'shuffleQuestions' => true, 'shuffleAnswers' => true, 'showScore' => true, 'showDetailResults' => false, 'isLimitSwitchTab' => false, 'tabSwitchLimit' => 999, 'messageOnWarning' => null],
            ['deThiId' => 15, 'hasMonitoring' => false, 'allowCopy' => false, 'allowPrint' => false, 'isEnableResume' => true, 'shuffleQuestions' => true, 'shuffleAnswers' => true, 'showScore' => true, 'showDetailResults' => true,  'isLimitSwitchTab' => false, 'tabSwitchLimit' => 999, 'messageOnWarning' => null],
            ['deThiId' => 16, 'hasMonitoring' => false, 'allowCopy' => false, 'allowPrint' => false, 'isEnableResume' => true, 'shuffleQuestions' => true, 'shuffleAnswers' => true, 'showScore' => true, 'showDetailResults' => false, 'isLimitSwitchTab' => false, 'tabSwitchLimit' => 999, 'messageOnWarning' => null],
            ['deThiId' => 17, 'hasMonitoring' => false, 'allowCopy' => false, 'allowPrint' => false, 'isEnableResume' => true, 'shuffleQuestions' => true, 'shuffleAnswers' => true, 'showScore' => true, 'showDetailResults' => true,  'isLimitSwitchTab' => false, 'tabSwitchLimit' => 999, 'messageOnWarning' => null],
            ['deThiId' => 18, 'hasMonitoring' => false, 'allowCopy' => false, 'allowPrint' => false, 'isEnableResume' => true, 'shuffleQuestions' => true, 'shuffleAnswers' => true, 'showScore' => true, 'showDetailResults' => false, 'isLimitSwitchTab' => false, 'tabSwitchLimit' => 999, 'messageOnWarning' => null],
            ['deThiId' => 19, 'hasMonitoring' => false, 'allowCopy' => false, 'allowPrint' => false, 'isEnableResume' => true, 'shuffleQuestions' => true, 'shuffleAnswers' => true, 'showScore' => true, 'showDetailResults' => true,  'isLimitSwitchTab' => false, 'tabSwitchLimit' => 999, 'messageOnWarning' => null],
            ['deThiId' => 20, 'hasMonitoring' => false, 'allowCopy' => false, 'allowPrint' => false, 'isEnableResume' => true, 'shuffleQuestions' => true, 'shuffleAnswers' => true, 'showScore' => true, 'showDetailResults' => false, 'isLimitSwitchTab' => false, 'tabSwitchLimit' => 999, 'messageOnWarning' => null],
        ];

        foreach ($data as $item) {
            CauHinhThi::updateOrCreate(
                ['deThiId' => $item['deThiId']],
                $item
            );
        }
    }
}
