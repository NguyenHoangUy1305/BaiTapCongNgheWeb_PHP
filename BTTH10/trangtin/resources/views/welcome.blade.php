<!DOCTYPE html>
<html>
<head>
    <title>Trang chủ tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-danger fw-bold">TIN TỨC MỚI NHẤT</h2>
        <div>
            <a href="{{ route('chude.index') }}" class="btn btn-secondary">Quản lý Chủ đề</a>
            <a href="{{ route('bantin.create') }}" class="btn btn-success">+ Đăng tin mới</a>
        </div>
    </div>

    <div class="row">
        @foreach($bantins as $tin)
        <div class="col-12 mb-4">
            <h4 class="text-primary">{{ $tin->tieude }}</h4>
            <p class="text-muted small">{{ \Carbon\Carbon::parse($tin->created_at)->format('d/m/Y h:i:s A') }}</p>
            <div class="d-flex">
                <img src="{{ $tin->hinhanh }}" alt="Ảnh" class="me-3 img-thumbnail" style="width: 250px; height: 150px; object-fit: cover;">
                <div>
                    <p>{{ $tin->tomtat }}</p>
                    <a href="{{ route('bantin.show', ['id' => $tin->id]) }}" class="btn btn-info btn-sm text-white">Đọc chi tiết</a>
                    
                    <!-- Nút Sửa -->
                    <a href="{{ route('bantin.edit', ['id' => $tin->id]) }}" class="btn btn-warning btn-sm mx-1">Sửa</a>
                    
                    <!-- Form Xóa -->
                    <form action="{{ route('bantin.destroy', ['id' => $tin->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa bản tin này?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </div>
            </div>
            <hr>
        </div>
        @endforeach
    </div>
</body>
</html>