<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="d-flex align-items-center justify-content-center">
    <div class="card p-4">
        <h2 class="text-center">Đăng Nhập</h2>
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Tên đăng nhập</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit" class="btn btn-primary w-100">Đăng Nhập</button>
        </form>
    </div>
</body>
</html>
