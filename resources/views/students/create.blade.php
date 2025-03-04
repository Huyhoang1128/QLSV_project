@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Thêm sinh viên</h2>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên sinh viên</label>
            <input type="text" name="StudentName" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Ngày sinh</label>
            <input type="date" name="birthday" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Lớp</label>
            <select name="class_id" class="form-control">
                <option value="">Chọn lớp</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->ClassName }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
</div>
@endsection
