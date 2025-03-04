@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Thêm môn học</h2>

    <form action="{{ route('subjects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên môn học</label>
            <input type="text" name="SubjectName" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
</div>
@endsection
