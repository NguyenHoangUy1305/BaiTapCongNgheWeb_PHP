<!DOCTYPE html>
<html>
<head>
    <title>Quản lý chủ đề</title>
    <!-- Tạm dùng bootstrap CDN để giao diện giống tài liệu -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <a class="btn btn-info" href="{{ route('chude.create') }}">Thêm mới</a><br><br>
    <h5>DANH SÁCH CHỦ ĐỀ</h5>
    <table class="table table-hover">
        <tr>
            <th>Tên</th>
            <th>Thứ tự</th>
            <th>Cập nhật</th>
            <th>Xóa</th>
        </tr>
        @foreach($chude ?? [] as $c)
        <tr>
            <td>{{$c->ten}}</td>
            <td>{{$c->thutu}}</td>
            <td>
                <a href="{{route('chude.edit', ['id' => $c->id])}}" class="btn btn-warning btn-sm">Sửa</a>
            </td>
            <td>
                <!-- Form xử lý nút Xóa -->
                <form action="{{route('chude.destroy', ['id' => $c->id])}}" method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa chủ đề này?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>