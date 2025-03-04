<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassRequest;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassController extends BaseController
{
    public function index()
    {
        $classes = ClassModel::all();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(ClassRequest $request)
    {
        ClassModel::create($request->validated());
        return redirect()->route('classes.index')->with('success', 'Thêm lớp học thành công');
    }

    public function show(ClassModel $class)
    {
        return view('classes.show', compact('class'));
    }

    public function edit(ClassModel $class)
    {
        return view('classes.edit', compact('class'));
    }

    public function update(ClassRequest $request, ClassModel $class)
    {
        $class->update($request->validated());
        return redirect()->route('classes.index')->with('success', 'Cập nhật lớp học thành công');
    }

    public function destroy(ClassModel $class)
    {
        $class->delete();
        return redirect()->route('classes.index')->with('success', 'Xóa lớp học thành công');
    }
}
