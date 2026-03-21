<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBaiLamRequest extends FormRequest
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
            "thiSinhId" => [
                "required",
                "integer",
                "exists:users,id"
            ],

            "deThiId" => [
                "required",
                "integer",
                "exists:de_this,id"
            ],

            "thoiGianBatDau" => [
                "required",
                "date"
            ],

            "thoiGianNopBai" => [
                "nullable",
                "date",
                "after_or_equal:thoiGianBatDau"
            ],

            "tongDiem" => [
                "nullable",
                "numeric",
                "min:0",
                "max:10"
            ],

            "soCauDung" => [
                "nullable",
                "integer",
                "min:0"
            ],

            "status" => [
                "required",
                Rule::in(["DANG_LAM", "TAM_LUU", "DA_NOP", "BI_HUY"])
            ],

            "updatedAt" => [
                "nullable",
                "date"
            ],
        ];
    }
}
