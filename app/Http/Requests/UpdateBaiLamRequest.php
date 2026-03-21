<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBaiLamRequest extends FormRequest
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
            "thoiGianBatDau" => [
                "sometimes",
                "date"
            ],

            "thoiGianNopBai" => [
                "nullable",
                "date",
                "after_or_equal:thoiGianBatDau"
            ],

            "status" => [
                "sometimes",
                Rule::in(["DANG_LAM", "TAM_LUU", "DA_NOP", "BI_HUY"])
            ],
        ];
    }
}
