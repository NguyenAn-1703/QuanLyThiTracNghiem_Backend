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
        "notes",
        "hocKy",
        "namHoc",
        "giangVienId",
        "isHide",
        "isDeleted"
    ];

    protected $withCount = [
        'chiTietNhoms as siSo'
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

    public function chiTietNhoms(){
        return $this->hasMany(ChiTietNhom::class, 'nhomHocPhanId');
    }

    public function thongBaos(){
        return $this->belongsToMany(ThongBao::class, 'chi_tiet_thong_baos','nhomHocPhanId','thongBaoId');
    }
}
