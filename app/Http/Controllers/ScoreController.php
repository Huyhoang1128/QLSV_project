<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index()
    {
        $scores = Score::with(['student', 'subject'])->get();
        return view('scores.index', compact('scores'));
    }

    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('scores.create', compact('students', 'subjects'));
    }

    public function store(ScoreRequest $request)
    {
        Score::create($request->validated());
        return redirect()->route('scores.index')->with('success', 'Thêm điểm thành công');
    }

    public function edit(Score $score)
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('scores.edit', compact('score', 'students', 'subjects'));
    }

    public function update(ScoreRequest $request, Score $score)
    {
        $score->update($request->validated());
        return redirect()->route('scores.index')->with('success', 'Cập nhật điểm thành công');
    }

    public function destroy(Score $score)
    {
        $score->delete();
        return redirect()->route('scores.index')->with('success', 'Xóa điểm thành công');
    }
}
