<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CauHoi extends Model
{
    use HasFactory;

    protected $fillable = [
        "monHocId",
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
    ];

    public function deThis(){
        return $this->belongsToMany(DeThi::class, 'chiTietDeThi', 'cauHoiId', 'deThiId');
    }

    public function cauTraLois(){
        return $this->hasMany(CauTraLoi::class, 'cauHoiId');
    }
}
