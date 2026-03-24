<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCauHoiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'monHocId' => ['sometimes', 'integer', 'exists:mon_hocs,id'],
            'chuongId' => ['sometimes', 'nullable', 'integer', 'exists:chuongs,id'],
            'doKhoId' => ['sometimes', 'nullable', 'integer', 'exists:do_khos,id'],
            'nguoiTaoId' => ['sometimes', 'integer', 'exists:users,id'],
            'noiDungCauHoi' => ['sometimes', 'string'],
            'imageUrl' => ['sometimes', 'nullable', 'string'],
            'giaiThichDapAn' => ['sometimes', 'nullable', 'string'],
            'diemMacDinh' => ['sometimes', 'numeric', 'min:0'],
            'status' => ['sometimes', 'in:public,private,archive'],
            'isDeleted' => ['sometimes', 'boolean'],
            'cauTraLois' => ['sometimes', 'array', 'min:2'],
            'cauTraLois.*.id' => ['sometimes', 'integer', 'exists:cau_tra_lois,id'],
            'cauTraLois.*.noiDungLuaChon' => ['required_with:cauTraLois', 'string', 'max:1000'],
            'cauTraLois.*.isCorrectAnswer' => ['required_with:cauTraLois', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            'monHocId.integer' => ':attribute phải là số nguyên',
            'monHocId.exists' => ':attribute không tồn tại trong hệ thống',

            'chuongId.integer' => ':attribute phải là số nguyên',
            'chuongId.exists' => ':attribute không tồn tại trong hệ thống',

            'doKhoId.integer' => ':attribute phải là số nguyên',
            'doKhoId.exists' => ':attribute không tồn tại trong hệ thống',

            'nguoiTaoId.integer' => ':attribute phải là số nguyên',
            'nguoiTaoId.exists' => ':attribute không tồn tại trong hệ thống',

            'noiDungCauHoi.string' => ':attribute phải là chuỗi ký tự',
            'imageUrl.string' => ':attribute phải là chuỗi ký tự',
            'giaiThichDapAn.string' => ':attribute phải là chuỗi ký tự',

            'diemMacDinh.numeric' => ':attribute phải là số',
            'diemMacDinh.min' => ':attribute phải lớn hơn hoặc bằng 0',

            'status.in' => ':attribute chỉ nhận một trong các giá trị: public, private, archive',
            'isDeleted.boolean' => ':attribute phải là kiểu đúng/sai',

            'cauTraLois.array' => ':attribute phải là mảng',
            'cauTraLois.min' => ':attribute phải có ít nhất 2 lựa chọn',

            'cauTraLois.*.id.integer' => ':attribute phải là số nguyên',
            'cauTraLois.*.id.exists' => ':attribute không tồn tại trong hệ thống',

            'cauTraLois.*.noiDungLuaChon.required_with' => ':attribute không được để trống khi cập nhật danh sách câu trả lời',
            'cauTraLois.*.noiDungLuaChon.string' => ':attribute phải là chuỗi ký tự',
            'cauTraLois.*.noiDungLuaChon.max' => ':attribute không được vượt quá 1000 ký tự',

            'cauTraLois.*.isCorrectAnswer.required_with' => ':attribute không được để trống khi cập nhật danh sách câu trả lời',
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
            'cauTraLois.*.id' => 'Mã câu trả lời',
            'cauTraLois.*.noiDungLuaChon' => 'Nội dung lựa chọn',
            'cauTraLois.*.isCorrectAnswer' => 'Trạng thái đáp án đúng',
        ];
    }
}
