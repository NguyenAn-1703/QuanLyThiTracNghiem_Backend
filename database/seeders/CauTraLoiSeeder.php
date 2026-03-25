<?php

namespace Database\Seeders;

use App\Models\CauHoi;
use App\Models\CauTraLoi;
use Illuminate\Database\Seeder;

class CauTraLoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
public function run()
    {
        $cauHois = CauHoi::all();

        foreach ($cauHois as $cauHoi) {

            $answers = [];

            switch ($cauHoi->noiDungCauHoi) {

                case 'Thủ đô của Việt Nam là gì?':
                    $answers = [
                        ['noiDungLuaChon' => 'Hà Nội', 'isCorrectAnswer' => true],
                        ['noiDungLuaChon' => 'TP.HCM', 'isCorrectAnswer' => false],
                        ['noiDungLuaChon' => 'Đà Nẵng', 'isCorrectAnswer' => false],
                        ['noiDungLuaChon' => 'Cần Thơ', 'isCorrectAnswer' => false],
                    ];
                    break;

                case 'Laravel là framework của ngôn ngữ nào?':
                    $answers = [
                        ['noiDungLuaChon' => 'PHP', 'isCorrectAnswer' => true],
                        ['noiDungLuaChon' => 'Java', 'isCorrectAnswer' => false],
                        ['noiDungLuaChon' => 'Python', 'isCorrectAnswer' => false],
                        ['noiDungLuaChon' => 'C#', 'isCorrectAnswer' => false],
                    ];
                    break;

                case 'RESTful API sử dụng phương thức HTTP nào để cập nhật dữ liệu?':
                    $answers = [
                        ['noiDungLuaChon' => 'PUT / PATCH', 'isCorrectAnswer' => true],
                        ['noiDungLuaChon' => 'GET', 'isCorrectAnswer' => false],
                        ['noiDungLuaChon' => 'DELETE', 'isCorrectAnswer' => false],
                        ['noiDungLuaChon' => 'OPTIONS', 'isCorrectAnswer' => false],
                    ];
                    break;

                case 'Độ phức tạp của thuật toán tìm kiếm nhị phân là bao nhiêu?':
                    $answers = [
                        ['noiDungLuaChon' => 'O(log n)', 'isCorrectAnswer' => true],
                        ['noiDungLuaChon' => 'O(n)', 'isCorrectAnswer' => false],
                        ['noiDungLuaChon' => 'O(n log n)', 'isCorrectAnswer' => false],
                        ['noiDungLuaChon' => 'O(1)', 'isCorrectAnswer' => false],
                    ];
                    break;
            }

            foreach ($answers as $answer) {
                CauTraLoi::firstOrCreate(
                    [
                        'noiDungLuaChon' => $answer['noiDungLuaChon'],
                        'cauHoiId' => $cauHoi->id
                    ],
                    [
                        'isCorrectAnswer' => $answer['isCorrectAnswer'],
                    ]
                );
            }
        }
    }
}
