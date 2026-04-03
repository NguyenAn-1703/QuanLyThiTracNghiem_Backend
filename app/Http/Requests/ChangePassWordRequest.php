<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ChangePassWordRequest extends FormRequest
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
            'currentPassword' => ['required', 'string'],

            'newPassword' => [
                'required',
                Password::min(6)
                    ->letters()
                    ->numbers()
                    ->mixedCase(),
                'different:current_password',
                'confirmed'
            ],
        ];
    }

    public function messages()
    {
        return [
            'currentPassword.required' => 'Vui lòng nhập mật khẩu hiện tại.',
            'currentPassword.string'   => 'Mật khẩu hiện tại không hợp lệ.',

            'newPassword.required' => 'Vui lòng nhập mật khẩu mới.',
            'newPassword.min'      => 'Mật khẩu mới phải có ít nhất 6 ký tự.',
            'newPassword.letters'  => 'Mật khẩu mới phải chứa ít nhất một chữ cái.',
            'newPassword.numbers'  => 'Mật khẩu mới phải chứa ít nhất một số.',
            'newPassword.mixedCase' => 'Mật khẩu mới phải có cả chữ hoa và chữ thường.',
            'newPassword.different' => 'Mật khẩu mới phải khác mật khẩu hiện tại.',
            'newPassword.confirmed' => 'Xác nhận mật khẩu không khớp.',
        ];
    }
}
