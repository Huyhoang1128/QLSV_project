@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Danh sách sinh viên</h2>

    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Thêm sinh viên</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Tên sinh viên</th>
                <th>Ngày sinh</th>
                <th>Lớp</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->StudentName }}</td>
                    <td>{{ $student->birthday }}</td>
                    <td>{{ $student->class->ClassName ?? 'Chưa có lớp' }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Sửa</a>

                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?');">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
