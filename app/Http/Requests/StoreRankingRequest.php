<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRankingRequest extends FormRequest
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
            'name' => ['required', 'min:5', 'max:255'],
        ];
    }

    /**
     * Summary of message
     * @return array{name.max: string, name.min: string, name.required: string}
     */
    public function message()
    {
        return [
            'name.required' => 'Tên độ khó là bắt buộc',
            'name.min'      => 'Tên độ khó phải ít nhất 5 kí tự',
            'name.max'      => 'Tên độ khó không vượt quá 255 kí tự',
        ];
    }
}
