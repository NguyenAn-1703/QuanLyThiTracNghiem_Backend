<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietNhom extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "sinhVienId",
        "nhomHocPhanId"
    ];

    protected $hidden = [
        
    ];

    public function sinhVien(){
        return $this->belongsTo(User::class, 'sinhVienId');
    }

    public function nhomHocPhan(){
        return $this->belongsTo(NhomHocPhan::class, 'nhomHocPhanId');
    }
}
