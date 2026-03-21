<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCauTraLoiRequest extends FormRequest
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
            "noiDungLuaChon" => [
                "required",
                "string",
                "max:1000"
            ],

            "isCorrectAnswer" => [
                "required",
                "boolean"
            ],

            "cauHoiId" => [
                "required",
                "integer",
                "exists:cau_hois,cauHoiId"
            ],
        ];
    }
}
