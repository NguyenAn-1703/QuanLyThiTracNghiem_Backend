<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiaoBaiThi extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        "deThiId",
        "nhomHocPhanId",
        "thoiGianBatDau",
        "thoiGianKetThuc"
    ];

    protected $hidden = [

    ];

    protected $casts = [
        "thoiGianBatDau" => "datetime",
        "thoiGianKetThuc" => "datetime"
    ];

    public function deThi(){
        return $this->belongsTo(DeThi::class, 'deThiId');
    }

    public function nhomHocPhan(){
        return $this->belongsTo(NhomHocPhan::class, 'nhomHocPhanId');
    }
}
