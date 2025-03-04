@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Thêm điểm</h2>

    <form action="{{ route('scores.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="stu_id" class="form-label">Sinh viên</label>
            <select name="stu_id" id="stu_id" class="form-control" required>
                <option value="">Chọn sinh viên</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->StudentName }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="subjects_id" class="form-label">Môn học</label>
            <select name="subjects_id" id="subjects_id" class="form-control" required>
                <option value="">Chọn môn học</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->SubjectName }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="score" class="form-label">Điểm</label>
            <input type="number" name="score" id="score" class="form-control" min="0" max="10" step="0.1" required>
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
</div>
@endsection
