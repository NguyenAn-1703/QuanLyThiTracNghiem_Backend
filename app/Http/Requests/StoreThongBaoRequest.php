<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreThongBaoRequest extends FormRequest
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
            'tieuDe' => 'required|string|max:200',
            'noiDung' => 'required|string',

            'nguoiGuiId' => 'nullable|integer|exists:users,id',

            'thoiGianGui' => 'nullable|date',

            'uuTien' => ['nullable', 'integer'],

            'status' => 'nullable|boolean',

            'nhomHocPhanIds' => 'required|array|min:1',
            'nhomHocPhanIds.*' => 'integer|exists:nhom_hoc_phans,id',
        ];
    }

    public function messages()
    {
        return [
            'tieuDe.required' => 'Tiêu đề không được để trống',
            'noiDung.required' => 'Nội dung không được để trống',

            'nguoiGuiId.exists' => 'Người gửi không tồn tại',
        ];
    }
}
