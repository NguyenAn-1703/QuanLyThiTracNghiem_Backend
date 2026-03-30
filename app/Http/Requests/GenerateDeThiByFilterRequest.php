<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerateDeThiByFilterRequest extends FormRequest
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
            'nhomHocPhanIds' => ['sometimes', 'array'],
            'nhomHocPhanIds.*' => ['integer', 'exists:nhom_hoc_phans,id'],

            'chuongIds' => ['nullable', 'array'],
            'chuongIds.*' => ['integer', 'exists:chuongs,id'],

            'doKhoFilters' => ['required', 'array', 'min:1'],
            'doKhoFilters.*.doKhoId' => ['required', 'integer', 'exists:do_khos,id'],
            'doKhoFilters.*.soLuongCau' => ['required', 'integer', 'min:0'],

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
            'cauHinh.tabSwitchLimit' => ['sometimes', 'integer', 'min:0'],
            'cauHinh.messageOnWarning' => ['sometimes', 'nullable', 'string'],
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

            'nhomHocPhanIds.array' => ':attribute phải là mảng',
            'nhomHocPhanIds.*.integer' => ':attribute phải là số nguyên',
            'nhomHocPhanIds.*.exists' => ':attribute không tồn tại trong hệ thống',

            'chuongIds.array' => ':attribute phải là mảng',
            'chuongIds.*.integer' => ':attribute phải là số nguyên',
            'chuongIds.*.exists' => ':attribute không tồn tại trong hệ thống',

            'doKhoFilters.required' => ':attribute không được để trống',
            'doKhoFilters.array' => ':attribute phải là mảng',
            'doKhoFilters.min' => ':attribute phải có ít nhất 1 phần tử',
            'doKhoFilters.*.doKhoId.required' => ':attribute không được để trống',
            'doKhoFilters.*.doKhoId.integer' => ':attribute phải là số nguyên',
            'doKhoFilters.*.doKhoId.exists' => ':attribute không tồn tại trong hệ thống',
            'doKhoFilters.*.soLuongCau.required' => ':attribute không được để trống',
            'doKhoFilters.*.soLuongCau.integer' => ':attribute phải là số nguyên',
            'doKhoFilters.*.soLuongCau.min' => ':attribute phải lớn hơn hoặc bằng 0',

            'cauHinh.required' => ':attribute không được để trống',
            'cauHinh.array' => ':attribute phải là mảng',
            'cauHinh.hasMonitoring.boolean' => ':attribute phải là kiểu đúng/sai',
            'cauHinh.allowCopy.boolean' => ':attribute phải là kiểu đúng/sai',
            'cauHinh.allowPrint.boolean' => ':attribute phải là kiểu đúng/sai',
            'cauHinh.isEnableResume.boolean' => ':attribute phải là kiểu đúng/sai',
            'cauHinh.shuffleQuestions.boolean' => ':attribute phải là kiểu đúng/sai',
            'cauHinh.shuffleAnswers.boolean' => ':attribute phải là kiểu đúng/sai',
            'cauHinh.showScore.boolean' => ':attribute phải là kiểu đúng/sai',
            'cauHinh.showDetailResults.boolean' => ':attribute phải là kiểu đúng/sai',
            'cauHinh.isLimitSwitchTab.boolean' => ':attribute phải là kiểu đúng/sai',
            'cauHinh.tabSwitchLimit.integer' => ':attribute phải là số nguyên',
            'cauHinh.tabSwitchLimit.min' => ':attribute phải lớn hơn hoặc bằng 0',
            'cauHinh.messageOnWarning.string' => ':attribute phải là chuỗi ký tự',
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
            'nhomHocPhanIds' => 'Danh sách nhóm học phần',
            'nhomHocPhanIds.*' => 'Mã nhóm học phần',
            'chuongIds' => 'Danh sách chương',
            'chuongIds.*' => 'Mã chương',
            'doKhoFilters' => 'Danh sách bộ lọc độ khó',
            'doKhoFilters.*.doKhoId' => 'Mã độ khó',
            'doKhoFilters.*.soLuongCau' => 'Số lượng câu',
            'cauHinh' => 'Cấu hình đề thi',
            'cauHinh.hasMonitoring' => 'Giám sát thi',
            'cauHinh.allowCopy' => 'Cho phép sao chép',
            'cauHinh.allowPrint' => 'Cho phép in',
            'cauHinh.isEnableResume' => 'Cho phép tiếp tục bài thi',
            'cauHinh.shuffleQuestions' => 'Trộn câu hỏi',
            'cauHinh.shuffleAnswers' => 'Trộn đáp án',
            'cauHinh.showScore' => 'Hiển thị điểm',
            'cauHinh.showDetailResults' => 'Hiển thị chi tiết kết quả',
            'cauHinh.isLimitSwitchTab' => 'Giới hạn chuyển tab',
            'cauHinh.tabSwitchLimit' => 'Số lần chuyển tab tối đa',
            'cauHinh.messageOnWarning' => 'Thông báo cảnh báo',
        ];
    }
}