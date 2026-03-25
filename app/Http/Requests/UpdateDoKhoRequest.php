<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDoKhoRequest extends FormRequest
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
            'tenDoKho' => ["string", "max:100", "required", Rule::unique('do_khos', 'tenDoKho')->ignore($this->route('doKho'))],
        ];
    }

    public function messages()
    {
        return [
            'tenDoKho.string'  => ':attribute phải là chuỗi',
            'tenDoKho.max'     => ':attribute có độ dài tối đa là 100',
            'tenDoKho.required' => ':attribute không được để trống',
            'tenDoKho.unique'  => ':attribute đã tồn tại trên hệ thống',
        ];
    }

    public function attributes()
    {
        return [
            'tenDoKho' => 'Tên độ khó',
        ];
    }
}
