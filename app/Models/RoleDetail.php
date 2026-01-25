<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        "roleId",
        "actionId",
        "hanhdong"
    ];
    
    protected $hidden = [
        
    ];
    
    protected $casts = [
        
    ];

    public function role(){
        return $this->belongsTo(Role::class, 'roleId');
    }

    public function action(){
        return $this->belongsTo(Action::class, 'actionId');
    }
}
