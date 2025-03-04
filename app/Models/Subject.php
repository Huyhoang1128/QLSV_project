<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'SubjectID',
        'description',
    ];

    // Quan hệ với bảng Scores (Một môn học có nhiều điểm)
    public function scores()
    {
        return $this->hasMany(Score::class, 'SubjectID');
    }
}

