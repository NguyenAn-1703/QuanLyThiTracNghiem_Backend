<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogBaiLam extends Model
{
    use HasFactory;

    protected $fillable = [
        "baiLamId",
        "soLanChuyenTab",
    ];

    protected $hidden = [];
}
