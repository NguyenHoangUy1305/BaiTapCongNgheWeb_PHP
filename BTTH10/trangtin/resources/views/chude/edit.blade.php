<!DOCTYPE html>
<html>
<head>
    <title>Cập nhật chủ đề</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <a class="btn btn-secondary" href="{{ route('chude.index') }}">Danh sách</a><br><br>
    <h5>CẬP NHẬT CHỦ ĐỀ</h5>
    
    <div class="text-danger">
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <!-- Lưu ý: Form cập nhật cần nối thêm ID vào URL và dùng @method('PUT') -->
    <form method="post" action="{{route('chude.update', ['id' => $chude->id])}}">
        @method('PUT')
        @csrf
        <div class="my-3">
            <label>Tên</label>
            <!-- value="{{$chude->ten}}" dùng để in lại tên cũ ra ô nhập liệu -->
            <input type="text" name="ten" value="{{$chude->ten}}" class="form-control">
        </div>
        <div class="my-3">
            <label>Thứ tự</label>
            <input type="number" name="thutu" value="{{$chude->thutu}}" class="form-control">
        </div>
        <div class="my-3">
            <input type="submit" value="Cập nhật" class="btn btn-primary">
        </div>
    </form>
</body>
</html>