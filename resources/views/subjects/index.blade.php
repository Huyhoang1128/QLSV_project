@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Danh sách môn học</h2>

    <a href="{{ route('subjects.create') }}" class="btn btn-primary mb-3">Thêm môn học</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Tên môn học</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $subject->id }}</td>
                    <td>{{ $subject->SubjectName }}</td>
                    <td>{{ $subject->description }}</td>
                    <td>
                        <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-warning">Sửa</a>

                        <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa môn học này?');">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
