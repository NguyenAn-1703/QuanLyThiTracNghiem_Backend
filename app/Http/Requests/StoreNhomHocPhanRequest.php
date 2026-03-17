<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNhomHocPhanRequest extends FormRequest
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

    public function rules()
    {
        return [
            'monHocId' => 'required|integer|exists:mon_hocs,monHocId',

            'tenNhom' => 'required|string|max:100',

            'maMoi' => 'required|string|max:20|unique:nhom_hoc_phans,maMoi',

            'siSo' => 'nullable|integer|min:1',

            'notes' => 'nullable|string',

            'hocKy' => 'required|integer|min:1|max:3',
            'namHoc' => 'required|integer|min:2000',

            'giangVienId' => 'nullable|integer|exists:users,id',

            'isHide' => 'nullable|boolean',
            'isDeleted' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'monHocId.required' => 'Môn học không được để trống',
            'monHocId.exists' => 'Môn học không tồn tại',

            'tenNhom.required' => 'Tên nhóm không được để trống',

            'maMoi.required' => 'Mã mời không được để trống',
            'maMoi.unique' => 'Mã mời đã tồn tại',

            'hocKy.required' => 'Học kỳ không được để trống',
            'hocKy.max' => 'Học kỳ chỉ từ 1 đến 3',

            'namHoc.required' => 'Năm học không được để trống',
        ];
    }
}
