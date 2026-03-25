<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chuong extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'tenChuong',
        'monHocId',
        'isDeleted',
    ];

    public function monHoc()
    {
        return $this->belongsTo(MonHoc::class, 'monHocId');
    }
}
