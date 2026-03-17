<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMonHocRequest extends FormRequest
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
            'tenMonHoc' => 'required|string|max:150',

            'soTinChi' => 'required|integer|min:1',

            'soTietLyThuyet' => 'nullable|integer|min:0',
            'soTietThucHanh' => 'nullable|integer|min:0',

            'isDeleted' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'tenMonHoc.required' => 'Tên môn học không được để trống',

            'soTinChi.required' => 'Số tín chỉ không được để trống',
            'soTinChi.min' => 'Số tín chỉ phải lớn hơn 0',

            'soTietLyThuyet.min' => 'Số tiết lý thuyết không hợp lệ',
            'soTietThucHanh.min' => 'Số tiết thực hành không hợp lệ',
        ];
    }
}
