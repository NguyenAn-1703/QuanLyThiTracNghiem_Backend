<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNhomHocPhanRequest extends FormRequest
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
            'monHocId' => 'sometimes|integer|exists:mon_hocs,id',

            'tenNhom' => 'sometimes|string|max:100',

            'maMoi' => [
                'sometimes',
                'string',
                'max:20'
            ],

            'siSo' => 'sometimes|integer|min:1',

            'notes' => 'sometimes|string',

            'hocKy' => 'sometimes|integer|min:1|max:3',
            'namHoc' => 'sometimes|integer|min:2000',

            'giangVienId' => 'sometimes|integer|exists:users,id',

            'isHide' => 'sometimes|boolean',
            'isDeleted' => 'sometimes|boolean',
        ];
    }
}
