<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'StudentName',
        'birthday',
        'ClassID',
    ];

    // Quan hệ với bảng Classes (Một sinh viên thuộc một lớp)
    public function class()
    {
        return $this->belongsTo(Classes::class, 'ClassID');
    }

    // Quan hệ với bảng Scores (Một sinh viên có nhiều điểm)
    public function scores()
    {
        return $this->hasMany(Score::class, 'StudentID');
    }
}
