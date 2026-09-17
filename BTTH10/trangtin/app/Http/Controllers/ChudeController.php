<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chude;

class ChudeController extends Controller
{
    // Hàm hiển thị danh sách chủ đề
    public function index(){
        $chude = Chude::all();
        return view('chude.index', ['chude' => $chude]);
    }

    // Hàm hiển thị form thêm mới chủ đề
    public function create(){
        return view('chude.create');
    }

    // Hàm xử lý lưu chủ đề mới vào database
    public function store(Request $request){
        $data = $request->validate([
            'ten' => 'required',
            'thutu' => 'required|numeric'
        ]);
        
        Chude::create($data);
        return redirect(route('chude.index'));
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
    // Hàm xử lý xóa chủ đề
public function destroy($id){
    $chude = Chude::find($id);
    if($chude){
        $chude->delete();
    }
    return redirect(route('chude.index'));
}
}