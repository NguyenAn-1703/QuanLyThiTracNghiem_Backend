<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDeThi extends Model
{
    use HasFactory;

    protected $fillable = [
        "cauHoiId",
        "deThiId",
        "thutu",
        "diem",
    ];

    protected $hidden = [];

    protected $casts = [
        "diem" => "decimal:2",
    ];

    public $timestamps = false;
}
