<!DOCTYPE html>
<html>
<head>
    <title>Thêm chủ đề</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <a class="btn btn-secondary" href="{{ route('chude.index') }}">Danh sách</a><br><br>
    <h5>THÊM CHỦ ĐỀ</h5>
    
    <div class="text-danger">
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <form method="post" action="{{route('chude.store')}}">
        @method('POST')
        @csrf
        <div class="my-3">
            <label>Tên</label>
            <input type="text" name="ten" class="form-control">
        </div>
        <div class="my-3">
            <label>Thứ tự</label>
            <input type="number" name="thutu" class="form-control">
        </div>
        <div class="my-3">
            <input type="submit" value="Lưu" class="btn btn-info">
        </div>
    </form>
</body>
</html>