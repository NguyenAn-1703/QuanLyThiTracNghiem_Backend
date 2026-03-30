<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        "maMonHoc",
        "tenMonHoc",
        "soTinChi",
        "soTietLyThuyet",
        "soTietThucHanh",
        "isDeleted"
    ];

    protected $hidden = [];

    public function nhomHocPhans(){
        return $this->hasMany(NhomHocPhan::class, 'monHocId');
    }
}
