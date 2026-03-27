<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ma',
        'hoTen',
        'email',
        'password',
        'nhomQuyenId',
        'sdt',
        "username",
        "ngaySinh",
        "laGioiTinhNu",
        "ggid",
        "urlAvatar",
        "isLocked",
        "isDeleted",
    ];

    protected $attributes = [
        'urlAvatar' => "example.png",
        'isStudent' => true,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'ngaySinh' => 'date',       // tự động cast sang Carbon (chỉ date)
        'laGioiTinhNu' => 'boolean',
        'isStudent' => 'boolean',
        'isLocked' => 'boolean',
        'isDeleted' => 'boolean',
        'lastLogin' => 'datetime',
        'email_verified_at' => 'datetime',
    ];
    
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn($value) => Hash::make($value),
        );
    }

    public function nhomHocPhans()
    {
        return $this->belongsToMany(NhomHocPhan::class, "chi_tiet_nhoms", "sinhVienId", "nhomHocPhanId");
    }

    public function monHocs()
    {
        return $this->belongsToMany(MonHoc::class, "phan_congs", "giangVienId", "monHocId");
    }

    public function baiLams(){
        return $this->hasMany(BaiLam::class, "thiSinhId");
    }
}
