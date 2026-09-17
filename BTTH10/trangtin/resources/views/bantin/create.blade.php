<!DOCTYPE html>
<html>
<head>
    <title>Thêm bản tin mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h5>THÊM BẢN TIN MỚI</h5>
    <form method="post" action="{{ route('bantin.store') }}">
        @csrf
        <div class="my-2"><label>Tiêu đề</label><input type="text" name="tieude" class="form-control" required></div>
        <div class="my-2"><label>Tóm tắt</label><textarea name="tomtat" class="form-control" required></textarea></div>
        <div class="my-2"><label>Nội dung</label><textarea name="noidung" class="form-control" rows="5" required></textarea></div>
        <div class="my-2"><label>Link hình ảnh</label><input type="text" name="hinhanh" class="form-control" required></div>
        <div class="my-2"><label>Chú thích ảnh</label><input type="text" name="chuthichanh" class="form-control" required></div>
        <div class="my-2"><label>Người đăng</label><input type="text" name="nguoidang" class="form-control" required></div>
        
        <div class="my-3">
            <label class="fw-bold text-primary">Chọn Chủ đề:</label>
            <select name="chude_id" class="form-control">
                @foreach($chudes as $cd)
                    <option value="{{ $cd->id }}">{{ $cd->ten }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-2">Đăng bài</button>
    </form>
</body>
</html>