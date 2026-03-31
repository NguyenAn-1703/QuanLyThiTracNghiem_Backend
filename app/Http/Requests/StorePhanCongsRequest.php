<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePhanCongsRequest extends FormRequest
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
            'giangVienId' => 'required|integer|exists:users,id',
            'monHocIds' => 'required|array|min:1',
            'monHocIds.*' => 'required|integer|distinct|exists:mon_hocs,id',
        ];
    }
}
