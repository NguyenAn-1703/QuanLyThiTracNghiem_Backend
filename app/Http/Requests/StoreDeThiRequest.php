<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeThiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'monThiId' => ['required', 'integer', 'exists:mon_hocs,id'],
            'nguoiTaoId' => ['required', 'integer', 'exists:users,id'],
            'tenDe' => ['required', 'string', 'max:255'],
            'thoiGianBatDau' => ['required', 'date'],
            'thoiGianKetThuc' => ['required', 'date', 'after:thoiGianBatDau'],
            'thoiGianLamBai' => ['required', 'integer', 'min:1'],
            'isDeleted' => ['somtimes', 'boolean'],
            'nhomHocPhanIds' => ['required', 'array'],
            'nhomHocPhanIds.*' => ['integer', 'exists:nhom_hoc_phans,id'],
            'cauHois' => ['required', 'array'],
            'cauHois.*.id' => ['required', 'integer', 'exists:cau_hois,id'],
            'cauHois.*.thuTu' => ['required', 'integer'],
            'cauHois.*.diem' => ['required', 'numeric', "min:0", "max:10"],
            'cauHinh' => ['required', 'array'],
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
            'cauHinh.limitQuestionPerPage' => ['sometimes', 'integer', 'min:1'],
            'cauHinh.allowBackLastQuestion' => ['sometimes', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            'monThiId.required' => ':attribute không được để trống',
            'monThiId.integer' => ':attribute phải là số nguyên',
            'monThiId.exists' => ':attribute không tồn tại trong hệ thống',

            'nguoiTaoId.required' => ':attribute không được để trống',
            'nguoiTaoId.integer' => ':attribute phải là số nguyên',
            'nguoiTaoId.exists' => ':attribute không tồn tại trong hệ thống',

            'tenDe.required' => ':attribute không được để trống',
            'tenDe.string' => ':attribute phải là chuỗi ký tự',
            'tenDe.max' => ':attribute không được vượt quá 255 ký tự',

            'thoiGianBatDau.required' => ':attribute không được để trống',
            'thoiGianBatDau.date' => ':attribute không đúng định dạng ngày giờ',

            'thoiGianKetThuc.required' => ':attribute không được để trống',
            'thoiGianKetThuc.date' => ':attribute không đúng định dạng ngày giờ',
            'thoiGianKetThuc.after' => ':attribute phải sau thời gian bắt đầu',

            'thoiGianLamBai.required' => ':attribute không được để trống',
            'thoiGianLamBai.integer' => ':attribute phải là số nguyên',
            'thoiGianLamBai.min' => ':attribute phải lớn hơn hoặc bằng 1',

            'isDeleted.boolean' => ':attribute phải là kiểu đúng/sai',
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
