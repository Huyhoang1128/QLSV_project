<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'StudentID',
        'SubjectID',
        'score',
    ];

    // Quan hệ với bảng Students (Một điểm thuộc về một sinh viên)
    public function student()
    {
        return $this->belongsTo(Student::class, 'StudentID');
    }

    // Quan hệ với bảng Subjects (Một điểm thuộc về một môn học)
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'SubjectID');
    }
}
