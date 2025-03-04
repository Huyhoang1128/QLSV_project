@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Chỉnh sửa sinh viên</h2>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tên sinh viên</label>
            <input type="text" name="StudentName" class="form-control" value="{{ $student->StudentName }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Ngày sinh</label>
            <input type="date" name="birthday" class="form-control" value="{{ $student->birthday }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Lớp</label>
            <select name="ClassID" class="form-control">
                <option value="">Chọn lớp</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}" {{ $class->id == $student->ClassID ? 'selected' : '' }}>
                        {{ $class->class_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
</div>
@endsection
