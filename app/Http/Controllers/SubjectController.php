<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(SubjectRequest $request)
    {
        Subject::create($request->validated());
        return redirect()->route('subjects.index')->with('success', 'Thêm môn học thành công');
    }

    public function show(Subject $subject)
    {
        return view('subjects.show', compact('subject'));
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    public function update(SubjectRequest $request, Subject $subject)
    {
        $subject->update($request->validated());
        return redirect()->route('subjects.index')->with('success', 'Cập nhật môn học thành công');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Xóa môn học thành công');
    }
}

