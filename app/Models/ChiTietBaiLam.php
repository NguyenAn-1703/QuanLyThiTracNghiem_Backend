<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietBaiLam extends Model
{
    use HasFactory;

    protected $fillable = [
        "baiLamId",
        "cauHoiId",
        "dapAnId",
    ];

    protected $hidden = [];

    protected $casts = [
        "isCorrectChooser" => "boolean",
        "diem" => "decimal:2",
    ];

    public $timestamps = false;
}
