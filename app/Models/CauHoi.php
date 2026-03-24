<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CauHoi extends Model
{
    use HasFactory;

    protected $table = 'cau_hois';

    protected $fillable = [
        "monHocId",
        "chuongId",
        "noiDungCauHoi",
        "doKhoId",
        "imageUrl",
        "giaiThichDapAn",
        "diemMacDinh",
        "nguoiTaoId",
        "soLuotSuDung",
        "status",
        "isDeleted",
    ];

    protected $hidden = [];

    protected $casts = [
        "diemMacDinh" => "decimal:2",
        "isDeleted" => "boolean",
        "created_at" => "datetime",
        "updated_at" => "datetime",
    ];

    public function monHoc()
    {
        return $this->belongsTo(MonHoc::class, 'monHocId');
    }

    public function chuong()
    {
        return $this->belongsTo(Chuong::class, 'chuongId');
    }

    public function doKho()
    {
        return $this->belongsTo(DoKho::class, 'doKhoId');
    }

    public function nguoiTao()
    {
        return $this->belongsTo(User::class, 'nguoiTaoId');
    }

    public function deThis()
    {
        return $this->belongsToMany(DeThi::class, 'chi_tiet_de_this', 'cauHoiId', 'deThiId');
    }

    public function cauTraLois()
    {
        return $this->hasMany(CauTraLoi::class, 'cauHoiId');
    }
}
