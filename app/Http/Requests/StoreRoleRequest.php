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
            'tenNhomQuyen' => 'required|max:255|string|unique:roles,tenNhomQuyen',
            //chi tiết quyền
            'role_details' => ['required', 'array', 'min:1'],
            //kiểm tra xem chức năng có tồn tại trong db không
            'role_details.*.tenChucNang' => [
                'required',
                'string',
                //kiểm tra truy suất trực tiếp trong db
                'exists:actions,tenChucNang',
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

    public function messages()
    {
        return [
            'tenNhomQuyen.unique' => 'Tên nhóm quyền đã tồn tại',
        ];
    }
}
