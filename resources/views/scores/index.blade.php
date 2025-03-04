@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Danh sách điểm</h2>

    <a href="{{ route('scores.create') }}" class="btn btn-primary mb-3">Thêm điểm</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Sinh viên</th>
                <th>Môn học</th>
                <th>Điểm</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($scores as $score)
                <tr>
                    <td>{{ $score->id }}</td>
                    <td>{{ $score->student->StudentName }}</td>
                    <td>{{ $score->subject->SubjectName }}</td>
                    <td>{{ $score->score }}</td>
                    <td>
                        <a href="{{ route('scores.edit', $score->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('scores.destroy', $score->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa điểm này?');">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
