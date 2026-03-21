<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CauTraLoi extends Model
{
    use HasFactory;
    protected $fillable = [
        "noiDungLuaChon",
        "isCorrectAnswer",
        "cauHoiId",
    ];

    protected $hidden = [];

    protected $casts = [
        "isCorrectAnswer" => "boolean",
    ];

    public $timestamps = false;
}
