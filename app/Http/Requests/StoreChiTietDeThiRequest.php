<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChiTietDeThiRequest extends FormRequest
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
            "cauHoiId" => [
                "required",
                "integer",
                "exists:cau_hois,id"
            ],

            "deThiId" => [
                "required",
                "integer",
                "exists:de_this,id"
            ],

            "thutu" => [
                "required",
                "integer",
                "min:1"
            ],

            "diem" => [
                "required",
                "numeric",
                "min:0"
            ],
        ];
    }
}
