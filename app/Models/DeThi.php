<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeThi extends Model
{
    use HasFactory;

    protected $fillable = [
        "monThiId",
        "nguoiTaoId",
        "tenDe",
        "thoiGianBatDau",
        "thoiGianKetThuc",
        "thoiGianLamBai",
        "isDeleted",
        "createdAt"
    ];

    protected $hidden = [];

    protected $casts = [ // phần này sẽ tự chuyển kiểu dữ liệu của database về kiểu dữ liệu phù hợp của php để xử lý
        "thoiGianBatDau" => "datetime",
        "thoiGianKetThuc" => "datetime",
        "createdAt" => "datetime",
        "isDeleted" => "boolean"
    ];

    public function monThi()
    {
        return $this->belongsTo(MonHoc::class, 'monThiId');
    }

    public function nguoiTao()
    {
        return $this->belongsTo(User::class, 'nguoiTaoId');
    }
}
