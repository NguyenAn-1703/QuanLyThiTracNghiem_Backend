<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->route('user');

        return [
            "hoTen" => ["sometimes", "string", "max:255"],
            "nhomQuyenId" => ["sometimes", "numeric", "exists:roles,id", "nullable"],
            "sdt" => ["sometimes", "numeric", "digits:10"],
            "username" => [
                "sometimes",
                Rule::unique("users", "username")->ignore($userId)
            ],

            "ngaySinh" => ["sometimes", "date_format:Y-m-d", "before:today"],

            "laGioiTinhNu" => ["sometimes", "boolean"],
            "isStudent" => ["required", "boolean"],
            "isLocked" => ["required", "boolean"],

            "ggid" => ["sometimes", "string"],

            "urlAvatar" => ["sometimes", "string"]
        ];
    }
}
