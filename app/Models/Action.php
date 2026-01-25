<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;
    protected $fillable = [
        "name"
    ];

    protected $hidden = [];

    protected $casts = [];

    public function role_details()
    {
        return $this->hasMany(RoleDetail::class, 'actionId');
    }
}
