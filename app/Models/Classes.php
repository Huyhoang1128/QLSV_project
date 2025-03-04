<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'ClassName',
        'description',
    ];

    // Quan hệ với Students (Một lớp có nhiều sinh viên)
    public function students()
    {
        return $this->hasMany(Student::class, 'ClassID');
    }
}
