<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ThamGiaNhomRequest extends FormRequest
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
            "sinhVienId" => [
                "required",
                "numeric",
                "exists:users,id",
                Rule::unique('chi_tiet_nhoms')
                    ->where(function ($query) {
                        return $query->where('sinhVienId', request()->sinhVienId)
                            ->where('nhomHocPhanId', request()->nhomHocPhanId);
                    })
            ],
            "maMoi" => [
                "required",
                "string",
                "max:20"

            ]
        ];
    }
    public function messages()
    {
        return [
            'sinhVienId.unique' => 'Sinh viên đã tồn tại trong nhóm học phần này.',
        ];
    }
}
