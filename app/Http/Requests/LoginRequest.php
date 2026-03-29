<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'login' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $exists = User::where('email', $value)
                        ->orWhere('username', $value)
                        ->exists();
                    if (!$exists) {
                        $fail('Email hoặc username không tồn tại.');
                    }
                }
            ],
            'password' => [
                'required',
            ],
        ];
    }
}
