<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhomHocPhan extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        "monHocId",
        "tenNhom",
        "maMoi",
        "siSo",
        "notes",
        "hocKy",
        "namHoc",
        "giangVienId",
        "isHide",
        "isDeleted"
    ];

    protected $hidden = [
        
    ];

    public function monHoc(){
        return $this->belongsTo(MonHoc::class, 'monHocId');
    }

    public function giangVien(){
        return $this->belongsTo(User::class, 'giangVienId');
    }

    public function deThis(){
        return $this->belongsToMany(DeThi::class, 'giao_bai_this', 'nhomHocPhanId', "deThiId");
    }

    public function sinhViens(){
        return $this->belongsToMany(User::class, "chi_tiet_nhoms", "nhomHocPhanId", "sinhVienId");
    }
}
