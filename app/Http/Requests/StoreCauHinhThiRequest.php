<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCauHinhThiRequest extends FormRequest
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
            'deThiId' => ['required', 'integer', 'exists:de_this,id', 'unique:cau_hinh_this,deThiId'],
            'hasMonitoring' => ['nullable', 'boolean'],
            'allowCopy' => ['nullable', 'boolean'],
            'allowPrint' => ['nullable', 'boolean'],
            'isEnableResume' => ['nullable', 'boolean'],
            'shuffleQuestions' => ['nullable', 'boolean'],
            'shuffleAnswers' => ['nullable', 'boolean'],
            'showScore' => ['nullable', 'boolean'],
            'showDetailResults' => ['nullable', 'boolean'],
            'isLimitSwitchTab' => ['nullable', 'boolean'],
            'tabSwitchLimit' => ['nullable', 'integer', 'min:0'],
            'messageOnWarning' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'deThiId.required' => ':attribute không được để trống',
            'deThiId.integer' => ':attribute phải là số nguyên',
            'deThiId.exists' => ':attribute không tồn tại trong hệ thống',
            'deThiId.unique' => ':attribute đã được cấu hình',

            'hasMonitoring.boolean' => ':attribute phải là kiểu đúng/sai',
            'allowCopy.boolean' => ':attribute phải là kiểu đúng/sai',
            'allowPrint.boolean' => ':attribute phải là kiểu đúng/sai',
            'isEnableResume.boolean' => ':attribute phải là kiểu đúng/sai',
            'shuffleQuestions.boolean' => ':attribute phải là kiểu đúng/sai',
            'shuffleAnswers.boolean' => ':attribute phải là kiểu đúng/sai',
            'showScore.boolean' => ':attribute phải là kiểu đúng/sai',
            'showDetailResults.boolean' => ':attribute phải là kiểu đúng/sai',
            'isLimitSwitchTab.boolean' => ':attribute phải là kiểu đúng/sai',

            'tabSwitchLimit.integer' => ':attribute phải là số nguyên',
            'tabSwitchLimit.min' => ':attribute phải lớn hơn hoặc bằng 0',

            'messageOnWarning.string' => ':attribute phải là chuỗi ký tự',
            'messageOnWarning.max' => ':attribute không được vượt quá 255 ký tự',
        ];
    }

    public function attributes()
    {
        return [
            'deThiId' => 'Mã đề thi',
            'hasMonitoring' => 'Giám sát thi',
            'allowCopy' => 'Cho phép sao chép',
            'allowPrint' => 'Cho phép in',
            'isEnableResume' => 'Cho phép tiếp tục bài thi',
            'shuffleQuestions' => 'Trộn câu hỏi',
            'shuffleAnswers' => 'Trộn đáp án',
            'showScore' => 'Hiển thị điểm',
            'showDetailResults' => 'Hiển thị chi tiết kết quả',
            'isLimitSwitchTab' => 'Giới hạn chuyển tab',
            'tabSwitchLimit' => 'Số lần chuyển tab tối đa',
            'messageOnWarning' => 'Thông báo cảnh báo',
        ];
    }
}
