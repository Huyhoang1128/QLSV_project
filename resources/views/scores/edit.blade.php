@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Chỉnh sửa điểm</h2>

    <form action="{{ route('scores.update', $score->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="stu_id" class="form-label">Sinh viên</label>
            <select name="stu_id" id="stu_id" class="form-control" required>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ $student->id == $score->StudentID ? 'selected' : '' }}>
                        {{ $student->stu_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="subjects_id" class="form-label">Môn học</label>
            <select name="subjects_id" id="subjects_id" class="form-control" required>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ $subject->id == $score->SubjectID ? 'selected' : '' }}>
                        {{ $subject->subjects_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="score" class="form-label">Điểm</label>
            <input type="number" name="score" id="score" class="form-control" value="{{ $score->score }}" min="0" max="10" step="0.1" required>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
</div>
@endsection
