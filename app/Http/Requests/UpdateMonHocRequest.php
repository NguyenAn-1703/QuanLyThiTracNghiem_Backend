<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMonHocRequest extends FormRequest
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
            'tenMonHoc' => 'sometimes|string|max:150',

            'soTinChi' => 'sometimes|integer|min:1',

            'soTietLyThuyet' => 'sometimes|integer|min:0',
            'soTietThucHanh' => 'sometimes|integer|min:0',

            'isDeleted' => 'sometimes|boolean',
        ];
    }
}
