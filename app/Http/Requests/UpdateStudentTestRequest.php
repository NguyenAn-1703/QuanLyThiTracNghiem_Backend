<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentTestRequest extends FormRequest
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
            'answers' => ['required', 'array', 'min:1'],

            'answers.*.cauHoiId' => [
                'required',
                'integer',
                'exists:cau_hois,id'
            ],

            'answers.*.dapAnId' => [
                'required',
                'integer',
                'exists:cau_tra_lois,id'
            ],
        ];
    }
}
