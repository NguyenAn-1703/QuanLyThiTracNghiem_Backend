<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
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
            'tenNhomQuyen' => [
                'required',
                'string',
                'max:255',
                //cho trường hợp giữ nguyên tên quyền và chỉ sửa chi tiết quyền
                Rule::unique('roles', 'tenNhomQuyen')->ignore(
                    $this->route('role')->id
                ),
            ],
            //chi tiết quyền
            'role_details' => ['required', 'array', 'min:1'],
            //kiểm tra xem name của role detail có tồn tại trong db không
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
}
