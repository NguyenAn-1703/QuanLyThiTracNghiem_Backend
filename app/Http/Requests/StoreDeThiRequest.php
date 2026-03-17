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
            'monThiId' => 'required|integer|exists:mon_this,monThiId',
            'nguoiTaoId' => 'required|string|max:50|exists:users,id',
            'tenDe' => 'required|string|max:255',

            'thoiGianBatDau' => 'required|date',
            'thoiGianKetThuc' => 'required|date|after:thoiGianBatDau',

            'thoiGianLamBai' => 'required|integer|min:1',

            'isDeleted' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'monThiId.required' => 'Môn thi không được để trống',
            'monThiId.exists' => 'Môn thi không tồn tại',

            'nguoiTaoId.required' => 'Người tạo không được để trống',
            'nguoiTaoId.exists' => 'Người tạo không tồn tại',

            'tenDe.required' => 'Tên đề không được để trống',

            'thoiGianBatDau.required' => 'Phải có thời gian bắt đầu',
            'thoiGianKetThuc.after' => 'Thời gian kết thúc phải sau thời gian bắt đầu',

            'thoiGianLamBai.min' => 'Thời gian làm bài phải lớn hơn 0',
        ];
    }
}
