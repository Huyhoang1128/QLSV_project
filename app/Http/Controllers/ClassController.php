<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassRequest;
use App\Models\Classes;
use Illuminate\Http\Request;

class ClassController extends BaseController
{
    public function index()
    {
        $classes = Classes::all();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(ClassRequest $request)
    {
        Classes::create($request->validated());
        return redirect()->route('classes.index')->with('success', 'Thêm lớp học thành công');
    }

    public function show(Classes $class)
    {
        return view('classes.show', compact('class'));
    }

    public function edit(Classes $class)
    {
        return view('classes.edit', compact('class'));
    }

    public function update(ClassRequest $request, Classes $class)
    {
        $class->update($request->validated());
        return redirect()->route('classes.index')->with('success', 'Cập nhật lớp học thành công');
    }

    public function destroy(Classes $class)
    {
        $class->delete();
        return redirect()->route('classes.index')->with('success', 'Xóa lớp học thành công');
    }
}
