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
            // Kiểm tra chuongs phải là một mảng
            'chuongs' => ['required', 'array'],
            // Validate từng item bên trong mảng chuongs
            'chuongs.*.tenChuong' => ['required', 'string', 'max:100'],
        ];
    }
    public function messages()
{
    return [
        // Messages cho mảng chuongs
        'chuongs.required' => 'Danh sách chương không được để trống.',
        'chuongs.array'    => 'Danh sách chương phải là một mảng hợp lệ.',

        // Messages cho từng phần tử trong mảng
        'chuongs.*.tenChuong.required' => 'Tên chương không được để trống.',
        'chuongs.*.tenChuong.string'   => 'Tên chương phải là chuỗi ký tự.',
        'chuongs.*.tenChuong.max'      => 'Tên chương không được vượt quá 100 ký tự.',
    ];
}
}
