<!DOCTYPE html>
<html>
<head>
    <title>Sửa bản tin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h5>CẬP NHẬT BẢN TIN</h5>
    <form method="post" action="{{ route('bantin.update', ['id' => $tin->id]) }}">
        @csrf
        @method('PUT')
        <div class="my-2"><label>Tiêu đề</label><input type="text" name="tieude" value="{{ $tin->tieude }}" class="form-control" required></div>
        <div class="my-2"><label>Tóm tắt</label><textarea name="tomtat" class="form-control" required>{{ $tin->tomtat }}</textarea></div>
        <div class="my-2"><label>Nội dung</label><textarea name="noidung" class="form-control" rows="5" required>{{ $tin->noidung }}</textarea></div>
        <div class="my-2"><label>Link hình ảnh</label><input type="text" name="hinhanh" value="{{ $tin->hinhanh }}" class="form-control" required></div>
        <div class="my-2"><label>Chú thích ảnh</label><input type="text" name="chuthichanh" value="{{ $tin->chuthichanh }}" class="form-control" required></div>
        <div class="my-2"><label>Người đăng</label><input type="text" name="nguoidang" value="{{ $tin->nguoidang }}" class="form-control" required></div>
        
        <div class="my-3">
            <label class="fw-bold text-primary">Chọn Chủ đề:</label>
            <select name="chude_id" class="form-control">
                @foreach($chudes as $cd)
                    <!-- Dòng này kiểm tra xem chủ đề nào là chủ đề cũ để hiển thị (selected) -->
                    <option value="{{ $cd->id }}" {{ $tin->chude_id == $cd->id ? 'selected' : '' }}>{{ $cd->ten }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Cập nhật</button>
        <a href="/" class="btn btn-secondary mt-2">Hủy</a>
    </form>
</body>
</html>