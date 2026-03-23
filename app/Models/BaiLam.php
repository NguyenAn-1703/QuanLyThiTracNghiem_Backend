<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiLam extends Model
{
    use HasFactory;

    protected $fillable = [
        "thiSinhId",
        "deThiId",
        "thoiGianBatDau",
        "thoiGianNopBai",
        "tongDiem",
        "soCauDung",
        "status",
    ];

    protected $hidden = [];

    protected $casts = [
        "thoiGianBatDau" => "datetime",
        "thoiGianNopBai" => "datetime",
        "tongDiem" => "decimal:2",
    ];

    public function chiTietBaiLams(){
        return $this->hasMany(ChiTietBaiLam::class, 'baiLamId');
    }
}
