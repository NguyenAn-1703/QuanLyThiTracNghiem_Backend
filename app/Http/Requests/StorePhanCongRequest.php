<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePhanCongRequest extends FormRequest
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
            'giangVienId' => [
                'required',
                'integer',
                'exists:giang_viens,id',
            ],
            'monHocId' => [
                'required',
                'integer',
                'exists:mon_hocs,id',
            ],
            // unique cặp 2 trường
            'giangVienId' => [
                'required',
                'integer',
                Rule::unique('phan_congs')
                    ->where(function ($query) {
                        return $query->where('monHocId', $this->monHocId);
                    }),
            ],
        ];
    }
}
