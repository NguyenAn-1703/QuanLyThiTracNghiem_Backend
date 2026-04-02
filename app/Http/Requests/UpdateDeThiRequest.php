<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeThiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'monThiId' => ['sometimes', 'integer', 'exists:mon_hocs,id'],
            'tenDe' => ['sometimes', 'string', 'max:255'],

            'thoiGianBatDau' => ['sometimes', 'date'],
            'thoiGianKetThuc' => ['sometimes', 'date', 'after:thoiGianBatDau'],

            'thoiGianLamBai' => ['sometimes', 'integer', 'min:1'],

            'nhomHocPhanIds' => ['sometimes', 'array'],
            'nhomHocPhanIds.*' => ['integer', 'exists:nhom_hoc_phans,id'],

            'cauHois' => ['sometimes', 'array'],
            'cauHois.*.id' => ['required_with:cauHois', 'integer', 'exists:cau_hois,id'],
            'cauHois.*.thuTu' => ['required_with:cauHois', 'integer'],
            'cauHois.*.diem' => ['required_with:cauHois', 'numeric', 'min:0', 'max:10'],

            'cauHinh' => ['sometimes', 'array'],
            'cauHinh.hasMonitoring' => ['sometimes', 'boolean'],
            'cauHinh.allowCopy' => ['sometimes', 'boolean'],
            'cauHinh.allowPrint' => ['sometimes', 'boolean'],
            'cauHinh.isEnableResume' => ['sometimes', 'boolean'],
            'cauHinh.shuffleQuestions' => ['sometimes', 'boolean'],
            'cauHinh.shuffleAnswers' => ['sometimes', 'boolean'],
            'cauHinh.showScore' => ['sometimes', 'boolean'],
            'cauHinh.showDetailResults' => ['sometimes', 'boolean'],
            'cauHinh.isLimitSwitchTab' => ['sometimes', 'boolean'],
            'cauHinh.tabSwitchLimit' => ['sometimes', 'integer'],
            'cauHinh.messageOnWarning' => ['sometimes', 'string'],
        ];
    }

    public function messages()
    {
        return [
            // monThiId
            'monThiId.integer' => 'Môn thi phải là số.',
            'monThiId.exists' => 'Môn thi không tồn tại.',

            // tenDe
            'tenDe.string' => 'Tên đề phải là chuỗi.',
            'tenDe.max' => 'Tên đề không được vượt quá 255 ký tự.',

            // thời gian
            'thoiGianBatDau.date' => 'Thời gian bắt đầu không hợp lệ.',
            'thoiGianKetThuc.date' => 'Thời gian kết thúc không hợp lệ.',
            'thoiGianKetThuc.after' => 'Thời gian kết thúc phải sau thời gian bắt đầu.',

            // thời gian làm bài
            'thoiGianLamBai.integer' => 'Thời gian làm bài phải là số.',
            'thoiGianLamBai.min' => 'Thời gian làm bài phải lớn hơn 0.',

            // nhóm học phần
            'nhomHocPhanIds.array' => 'Danh sách nhóm học phần không hợp lệ.',
            'nhomHocPhanIds.*.integer' => 'ID nhóm học phần phải là số.',
            'nhomHocPhanIds.*.exists' => 'Nhóm học phần không tồn tại.',

            // câu hỏi
            'cauHois.array' => 'Danh sách câu hỏi không hợp lệ.',

            'cauHois.*.id.required_with' => 'ID câu hỏi là bắt buộc.',
            'cauHois.*.id.integer' => 'ID câu hỏi phải là số.',
            'cauHois.*.id.exists' => 'Câu hỏi không tồn tại.',

            'cauHois.*.thuTu.required_with' => 'Thứ tự câu hỏi là bắt buộc.',
            'cauHois.*.thuTu.integer' => 'Thứ tự phải là số.',

            'cauHois.*.diem.required_with' => 'Điểm câu hỏi là bắt buộc.',
            'cauHois.*.diem.numeric' => 'Điểm phải là số.',
            'cauHois.*.diem.min' => 'Điểm phải lớn hơn hoặc bằng 0.',
            'cauHois.*.diem.max' => 'Điểm không được vượt quá 10.',

            // cấu hình
            'cauHinh.array' => 'Cấu hình không hợp lệ.',

            'cauHinh.hasMonitoring.boolean' => 'Giám sát phải là true/false.',
            'cauHinh.allowCopy.boolean' => 'Cho phép copy phải là true/false.',
            'cauHinh.allowPrint.boolean' => 'Cho phép in phải là true/false.',
            'cauHinh.isEnableResume.boolean' => 'Cho phép tiếp tục bài phải là true/false.',
            'cauHinh.shuffleQuestions.boolean' => 'Trộn câu hỏi phải là true/false.',
            'cauHinh.shuffleAnswers.boolean' => 'Trộn đáp án phải là true/false.',
            'cauHinh.showScore.boolean' => 'Hiển thị điểm phải là true/false.',
            'cauHinh.showDetailResults.boolean' => 'Hiển thị chi tiết kết quả phải là true/false.',
            'cauHinh.isLimitSwitchTab.boolean' => 'Giới hạn chuyển tab phải là true/false.',

            'cauHinh.tabSwitchLimit.integer' => 'Số lần chuyển tab phải là số.',
            'cauHinh.messageOnWarning.string' => 'Thông báo cảnh báo phải là chuỗi.',
        ];
    }

    public function attributes()
    {
        return [
            'monThiId' => 'Mã môn thi',
            'nguoiTaoId' => 'Mã người tạo',
            'tenDe' => 'Tên đề',
            'thoiGianBatDau' => 'Thời gian bắt đầu',
            'thoiGianKetThuc' => 'Thời gian kết thúc',
            'thoiGianLamBai' => 'Thời gian làm bài',
            'isDeleted' => 'Trạng thái xóa',
        ];
    }
}
