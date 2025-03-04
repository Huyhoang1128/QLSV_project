@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Chỉnh sửa lớp học</h2>

    <form action="{{ route('classes.update', $class->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tên lớp</label>
            <input type="text" name="ClassName" class="form-control" value="{{ $class->ClassName }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea name="description" class="form-control">{{ $class->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
</div>
@endsection
