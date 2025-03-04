@extends('layouts.app')

@section('content')
    <h2>Danh sách lớp học</h2>
    <a href="{{ route('classes.create') }}" class="btn btn-primary">Thêm lớp</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên lớp</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $class)
                <tr>
                    <td>{{ $class->id }}</td>
                    <td>{{ $class->ClassName }}</td>
                    <td>{{ $class->description }}</td>
                    <td>
                        <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('classes.destroy', $class->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
