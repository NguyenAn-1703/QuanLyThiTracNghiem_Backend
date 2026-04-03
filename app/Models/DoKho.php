<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoKho extends Model
{
    use HasFactory;
    protected $fillable = ['tenDoKho'];

    public function cauHois()
    {
        return $this->hasMany(CauHoi::class, 'doKhoId');
    }
}
