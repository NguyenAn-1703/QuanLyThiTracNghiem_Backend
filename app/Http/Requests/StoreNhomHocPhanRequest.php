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
            'monHocId' => ['required', 'integer', 'exists:mon_hocs,id'],
            'tenNhom' => ['required', 'string', 'max:100'],
            'maMoi' => ['required', 'string', 'max:20', 'unique:nhom_hoc_phans,maMoi'],
            'siSo' => ['nullable', 'integer', 'min:1'],
            'notes' => ['nullable', 'string'],
            'hocKy' => ['required', 'integer', 'min:1', 'max:3'],
            'namHoc' => ['required', 'integer', 'min:2000'],
            'giangVienId' => ['nullable', 'integer', 'exists:users,id'],
            'isHide' => ['nullable', 'boolean'],
            'isDeleted' => ['nullable', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            'monHocId.required' => ':attribute không được để trống',
            'monHocId.integer' => ':attribute phải là số nguyên',
            'monHocId.exists' => ':attribute không tồn tại trong hệ thống',

            'tenNhom.required' => ':attribute không được để trống',
            'tenNhom.string' => ':attribute phải là chuỗi ký tự',
            'tenNhom.max' => ':attribute không được vượt quá 100 ký tự',

            'maMoi.required' => ':attribute không được để trống',
            'maMoi.string' => ':attribute phải là chuỗi ký tự',
            'maMoi.max' => ':attribute không được vượt quá 20 ký tự',
            'maMoi.unique' => ':attribute đã tồn tại',

            'siSo.integer' => ':attribute phải là số nguyên',
            'siSo.min' => ':attribute phải lớn hơn hoặc bằng 1',

            'notes.string' => ':attribute phải là chuỗi ký tự',

            'hocKy.required' => ':attribute không được để trống',
            'hocKy.integer' => ':attribute phải là số nguyên',
            'hocKy.min' => ':attribute phải từ 1 đến 3',
            'hocKy.max' => ':attribute phải từ 1 đến 3',

            'namHoc.required' => ':attribute không được để trống',
            'namHoc.integer' => ':attribute phải là số nguyên',
            'namHoc.min' => ':attribute phải từ năm 2000 trở lên',

            'giangVienId.integer' => ':attribute phải là số nguyên',
            'giangVienId.exists' => ':attribute không tồn tại trong hệ thống',

            'isHide.boolean' => ':attribute phải là kiểu đúng/sai',
            'isDeleted.boolean' => ':attribute phải là kiểu đúng/sai',
        ];
    }

    public function attributes()
    {
        return [
            'monHocId' => 'Mã môn học',
            'tenNhom' => 'Tên nhóm',
            'maMoi' => 'Mã mời',
            'siSo' => 'Sỉ số',
            'notes' => 'Ghi chú',
            'hocKy' => 'Học kỳ',
            'namHoc' => 'Năm học',
            'giangVienId' => 'Mã giảng viên',
            'isHide' => 'Trạng thái ẩn',
            'isDeleted' => 'Trạng thái xóa',
        ];
    }
}
