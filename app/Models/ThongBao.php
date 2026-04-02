<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongBao extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "tieuDe",
        "noiDung",
        "nguoiGuiId",
        "thoiGianGui",
        "uuTien",
        "status"
    ];

    protected $hidden = [];

    protected $casts = [
        "thoiGianGui" => "datetime",
        "status" => "boolean"
    ];

    public function nguoiGui()
    {
        return $this->belongsTo(User::class, 'nguoiGuiId');
    }

    public function nhomHocPhans(){
        return $this->belongsToMany(NhomHocPhan::class, 'chi_tiet_thong_baos','thongBaoId', 'nhomHocPhanId');
    }
}
