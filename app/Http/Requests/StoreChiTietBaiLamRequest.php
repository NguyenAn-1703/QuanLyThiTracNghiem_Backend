<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChiTietBaiLamRequest extends FormRequest
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
            "baiLamId" => [
                "required",
                "integer",
                "exists:bai_lams,baiLamId"
            ],

            "cauHoiId" => [
                "required",
                "integer",
                "exists:cau_hois,cauHoiId"
            ],

            "dapAnId" => [
                "nullable",
                "integer",
                "exists:cau_tra_lois,cauTraLoiId"
            ],

            "isCorrectChooser" => [
                "nullable",
                "boolean"
            ],

            "diem" => [
                "nullable",
                "numeric",
                "min:0"
            ],
        ];
    }
}
