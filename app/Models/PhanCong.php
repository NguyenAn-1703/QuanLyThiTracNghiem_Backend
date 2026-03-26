<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanCong extends Model
{
    use HasFactory;

    protected $fillable = [
        "giangVienId",
        "monHocId",
    ];

    protected $hidden = [];

    public $timestamps = false;

    public function monHoc(){
        return $this->belongsTo(MonHoc::class, 'monHocId');
    }

    public function giangVien(){
        return $this->belongsTo(User::class, 'giangVienId');
    }
}
