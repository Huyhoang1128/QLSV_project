<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    // Quan hệ với bảng Students (nếu user là sinh viên)
    public function student()
    {
        return $this->hasOne(Student::class, 'id', 'id');
    }

    // Kiểm tra user có phải là admin không
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
