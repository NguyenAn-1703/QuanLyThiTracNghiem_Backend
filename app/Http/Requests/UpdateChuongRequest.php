<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChuongRequest extends FormRequest
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
            'tenChuong' => ['sometimes', 'string', 'max:100'],
            'monHocId'  => ['sometimes', 'integer', 'exists:mon_hocs,id'],
            'isDeleted' => ['nullable', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            'tenChuong.string'  => ':attribute phải là chuỗi ký tự',
            'tenChuong.max'     => ':attribute không được vượt quá 100 ký tự',
            'monHocId.integer'  => ':attribute phải là số nguyên',
            'monHocId.exists'   => ':attribute không tồn tại trong hệ thống',
            'isDeleted.boolean' => ':attribute phải là kiểu đúng/sai',
        ];
    }

    public function attributes()
    {
        return [
            'tenChuong' => 'Tên chương',
            'monHocId'  => 'Mã môn học',
            'isDeleted' => 'Trạng thái xóa',
        ];
    }
}
