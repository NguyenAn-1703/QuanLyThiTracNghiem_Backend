<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGiaoBaiThiRequest extends FormRequest
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

    public function rules()
    {
        return [
            'deThiId' => 'required|integer|exists:de_this,id',
            'nhomHocPhanId' => 'required|integer|exists:nhom_hoc_phans,id',

            'thoiGianBatDau' => 'required|date',
            'thoiGianKetThuc' => 'required|date|after:thoiGianBatDau',
        ];
    }

    public function messages()
    {
        return [
            'deThiId.required' => 'Đề thi không được để trống',
            'deThiId.exists' => 'Đề thi không tồn tại',

            'nhomHocPhanId.required' => 'Nhóm học phần không được để trống',
            'nhomHocPhanId.exists' => 'Nhóm học phần không tồn tại',

            'thoiGianKetThuc.after' => 'Thời gian kết thúc phải sau thời gian bắt đầu',
        ];
    }
}
