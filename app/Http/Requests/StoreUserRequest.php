<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
            "hoTen" => ["required", "string", "max:255"],
            "email" => ["required", "string", "email", "unique:users,email"],
            "password" => [
                "required",
                Password::min(6)
                    ->letters()
                    ->numbers()
                    ->mixedCase(),
                "confirmed", //cần có trường password_confirmation
            ],
            "nhomQuyenId" => ["required", "numeric", "exists:roles,id"],
            "sdt" => ["numeric", "digits:10"],
            "username" => ["required", "unique:users,username"],
            "ngaySinh" => ["required", "date_format:Y-m-d", "before:today"],
            "laGioiTinhNu" => ["required", "boolean"],
            "ggid" => ["string"],
            "urlAvatar" => ["string"]
        ];
    }
}
