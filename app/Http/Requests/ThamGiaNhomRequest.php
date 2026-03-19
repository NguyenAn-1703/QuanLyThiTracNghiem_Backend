<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            "sinhVienId" => ["required", "numeric", "exists:users,id"],
            "nhomHocPhanId" => ["required", "numeric", "exists:nhom_hoc_phans,id"],
            "maMoi" => [
                "required",
                "string",
                "size:7",
                "regex:/^[A-Za-z0-9]{7}$/"
            ]
        ];
    }
}
