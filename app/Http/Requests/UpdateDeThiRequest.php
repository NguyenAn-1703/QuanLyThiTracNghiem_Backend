<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeThiRequest extends FormRequest
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
            'monThiId' => 'sometimes|integer|exists:mon_this,monThiId',
            'nguoiTaoId' => 'sometimes|string|max:50|exists:users,id',
            'tenDe' => 'sometimes|string|max:255',

            'thoiGianBatDau' => 'sometimes|date',
            'thoiGianKetThuc' => 'sometimes|date|after:thoiGianBatDau',

            'thoiGianLamBai' => 'sometimes|integer|min:1',

            'isDeleted' => 'sometimes|boolean',
        ];
    }
}
