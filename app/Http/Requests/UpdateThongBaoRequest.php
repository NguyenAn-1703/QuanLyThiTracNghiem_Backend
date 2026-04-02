<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateThongBaoRequest extends FormRequest
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
            'tieuDe' => 'sometimes|string|max:200',
            'noiDung' => 'sometimes|string',

            'nguoiGuiId' => 'sometimes|nullable|integer|exists:users,id',

            'thoiGianGui' => 'sometimes|nullable|date',

            'uuTien' => ['sometimes', 'nullable', 'integer'],

            'status' => 'sometimes|nullable|boolean',

            'nhomHocPhanIds' => 'sometimes|array|min:1',
            'nhomHocPhanIds.*' => 'integer|exists:nhom_hoc_phans,id',
        ];
    }
}
