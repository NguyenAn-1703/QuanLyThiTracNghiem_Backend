<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeThiRequest extends FormRequest
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
            'monThiId' => ['sometimes', 'integer', 'exists:mon_hocs,id'],
            'nguoiTaoId' => ['sometimes', 'integer', 'exists:users,id'],
            'tenDe' => ['sometimes', 'string', 'max:255'],
            'thoiGianBatDau' => ['sometimes', 'date'],
            'thoiGianKetThuc' => ['sometimes', 'date', 'after:thoiGianBatDau'],
            'thoiGianLamBai' => ['sometimes', 'integer', 'min:1'],
            'isDeleted' => ['sometimes', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            'monThiId.integer' => ':attribute phải là số nguyên',
            'monThiId.exists' => ':attribute không tồn tại trong hệ thống',

            'nguoiTaoId.integer' => ':attribute phải là số nguyên',
            'nguoiTaoId.exists' => ':attribute không tồn tại trong hệ thống',

            'tenDe.string' => ':attribute phải là chuỗi ký tự',
            'tenDe.max' => ':attribute không được vượt quá 255 ký tự',

            'thoiGianBatDau.date' => ':attribute không đúng định dạng ngày giờ',

            'thoiGianKetThuc.date' => ':attribute không đúng định dạng ngày giờ',
            'thoiGianKetThuc.after' => ':attribute phải sau thời gian bắt đầu',

            'thoiGianLamBai.integer' => ':attribute phải là số nguyên',
            'thoiGianLamBai.min' => ':attribute phải lớn hơn hoặc bằng 1',

            'isDeleted.boolean' => ':attribute phải là kiểu đúng/sai',
        ];
    }

    public function attributes()
    {
        return [
            'monThiId' => 'Mã môn thi',
            'nguoiTaoId' => 'Mã người tạo',
            'tenDe' => 'Tên đề',
            'thoiGianBatDau' => 'Thời gian bắt đầu',
            'thoiGianKetThuc' => 'Thời gian kết thúc',
            'thoiGianLamBai' => 'Thời gian làm bài',
            'isDeleted' => 'Trạng thái xóa',
        ];
    }
}
