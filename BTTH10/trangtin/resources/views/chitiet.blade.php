<!DOCTYPE html>
<html>
<head>
    <title>{{ $tin->tieude }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <a href="/" class="btn btn-secondary mb-3">Về trang chủ</a>
    <h2>{{ $tin->tieude }}</h2>
    <p class="text-muted">Đăng bởi: {{ $tin->nguoidang }} | Ngày: {{ \Carbon\Carbon::parse($tin->created_at)->format('d/m/Y') }}</p>
    <img src="{{ $tin->hinhanh }}" class="img-fluid mb-3" style="max-height: 400px;">
    <p class="fw-bold">{{ $tin->tomtat }}</p>
    <div>
        <!-- Hiển thị nội dung chi tiết -->
        {{ $tin->noidung }}
    </div>
</body>
</html>