@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Chỉnh sửa môn học</h2>

    <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tên môn học</label>
            <input type="text" name="Subjectame" class="form-control" value="{{ $subject->SubjectName }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea name="description" class="form-control">{{ $subject->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
</div>
@endsection
