<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCauHoiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'monHocId' => ['required', 'integer', 'exists:mon_hocs,id'],
            'chuongId' => ['nullable', 'integer', 'exists:chuongs,id'],
            'doKhoId' => ['nullable', 'integer', 'exists:do_khos,id'],
            'nguoiTaoId' => ['required', 'integer', 'exists:users,id'],
            'noiDungCauHoi' => ['required', 'string'],
            'imageUrl' => ['nullable', 'string'],
            'giaiThichDapAn' => ['nullable', 'string'],
            'diemMacDinh' => ['nullable', 'numeric', 'min:0'],
            'status' => ['nullable', 'in:public,private,archive'],
            'isDeleted' => ['nullable', 'boolean'],
            'cauTraLois' => ['required', 'array', 'min:2'],
            'cauTraLois.*.noiDungLuaChon' => ['required', 'string', 'max:1000'],
            'cauTraLois.*.isCorrectAnswer' => ['required', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            'monHocId.required' => ':attribute không được để trống',
            'monHocId.integer' => ':attribute phải là số nguyên',
            'monHocId.exists' => ':attribute không tồn tại trong hệ thống',

            'chuongId.integer' => ':attribute phải là số nguyên',
            'chuongId.exists' => ':attribute không tồn tại trong hệ thống',

            'doKhoId.integer' => ':attribute phải là số nguyên',
            'doKhoId.exists' => ':attribute không tồn tại trong hệ thống',

            'nguoiTaoId.required' => ':attribute không được để trống',
            'nguoiTaoId.integer' => ':attribute phải là số nguyên',
            'nguoiTaoId.exists' => ':attribute không tồn tại trong hệ thống',

            'noiDungCauHoi.required' => ':attribute không được để trống',
            'noiDungCauHoi.string' => ':attribute phải là chuỗi ký tự',

            'imageUrl.string' => ':attribute phải là chuỗi ký tự',
            'giaiThichDapAn.string' => ':attribute phải là chuỗi ký tự',

            'diemMacDinh.numeric' => ':attribute phải là số',
            'diemMacDinh.min' => ':attribute phải lớn hơn hoặc bằng 0',

            'status.in' => ':attribute chỉ nhận một trong các giá trị: public, private, archive',
            'isDeleted.boolean' => ':attribute phải là kiểu đúng/sai',

            'cauTraLois.required' => ':attribute không được để trống',
            'cauTraLois.array' => ':attribute phải là mảng',
            'cauTraLois.min' => ':attribute phải có ít nhất 2 lựa chọn',

            'cauTraLois.*.noiDungLuaChon.required' => ':attribute không được để trống',
            'cauTraLois.*.noiDungLuaChon.string' => ':attribute phải là chuỗi ký tự',
            'cauTraLois.*.noiDungLuaChon.max' => ':attribute không được vượt quá 1000 ký tự',

            'cauTraLois.*.isCorrectAnswer.required' => ':attribute không được để trống',
            'cauTraLois.*.isCorrectAnswer.boolean' => ':attribute phải là kiểu đúng/sai',
        ];
    }

    public function attributes()
    {
        return [
            'monHocId' => 'Mã môn học',
            'chuongId' => 'Mã chương',
            'doKhoId' => 'Mã độ khó',
            'nguoiTaoId' => 'Mã người tạo',
            'noiDungCauHoi' => 'Nội dung câu hỏi',
            'imageUrl' => 'Đường dẫn ảnh',
            'giaiThichDapAn' => 'Giải thích đáp án',
            'diemMacDinh' => 'Điểm mặc định',
            'status' => 'Trạng thái',
            'isDeleted' => 'Trạng thái xóa',
            'cauTraLois' => 'Danh sách câu trả lời',
            'cauTraLois.*.noiDungLuaChon' => 'Nội dung lựa chọn',
            'cauTraLois.*.isCorrectAnswer' => 'Trạng thái đáp án đúng',
        ];
    }
}
