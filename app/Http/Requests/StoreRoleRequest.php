<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
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
            //tên quyền
            'name' => 'required|max:255|string',
            //chi tiết quyền
            'role_details' => ['required', 'array', 'min:1'],
            //kiểm tra xem name của role detail có tồn tại trong db không
            'role_details.*.name' => [
                'required',
                'string',
                //kiểm tra truy suất trực tiếp trong db
                'exists:actions,name',
            ],

            'role_details.*.canView' => [
                'required',
                'boolean',
            ],

            'role_details.*.canCreate' => [
                'required',
                'boolean',
            ],

            'role_details.*.canUpdate' => [
                'required',
                'boolean',
            ],

            'role_details.*.canDelete' => [
                'required',
                'boolean',
            ],
        ];
    }
}
