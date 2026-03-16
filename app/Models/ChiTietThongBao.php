<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietThongBao extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "taiKhoanId",
        "thongBaoId"
    ];

    protected $hidden = [

    ];

    public function taiKhoan(){
        return $this->belongsTo(User::class, 'taiKhoanId');
    }

    public function thongBao(){
        return $this->belongsTo(ThongBao::class, 'thongBaoId');
    }
}
