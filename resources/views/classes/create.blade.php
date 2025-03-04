@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Thêm lớp học</h2>

    <form action="{{ route('classes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên lớp</label>
            <input type="text" name="ClassName" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
</div>
@endsection
