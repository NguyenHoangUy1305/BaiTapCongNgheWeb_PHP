<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Bantin;
use App\Models\Chude;

class BantinController extends Controller
{
    // Lấy danh sách tin tức đưa ra trang chủ
    public function index(){
        $bantins = Bantin::orderBy('created_at', 'desc')->get();
        return view('welcome', ['bantins' => $bantins]);
    }
// Hàm hiển thị form cập nhật chủ đề
public function edit($id){
    $chude = Chude::find($id);
    return view('chude.edit', ['chude' => $chude]);
}

// Hàm xử lý cập nhật chủ đề
public function update(Request $request, $id){
    $data = $request->validate([
        'ten' => 'required',
        'thutu' => 'required|numeric'
    ]);
    
    $chude = Chude::find($id);
    $chude->update($data);
    return redirect(route('chude.index'));
}
// Hàm xem chi tiết 1 bản tin
public function show($id){
    $tin = Bantin::find($id);
    return view('chitiet', ['tin' => $tin]);
}
// Hiển thị form thêm bản tin
public function create(){
    // Lấy danh sách chủ đề để đưa vào thẻ <select>
    $chudes = Chude::all(); 
    return view('bantin.create', ['chudes' => $chudes]);
}

// Xử lý lưu bản tin
public function store(Request $request){
    Bantin::create($request->all());
    return redirect('/'); // Lưu xong quay về trang chủ
}
// 5. Hiển thị form cập nhật bản tin

// 7. Xử lý xóa bản tin
public function destroy($id){
    $tin = Bantin::find($id);
    if($tin){
        $tin->delete();
    }
    return redirect('/');
}

}
