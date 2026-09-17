<?php 
session_start();
require("../model/database.php");
require("../model/danhmuc.php");
require("../model/mathang.php");
require("../model/nguoidung.php");
require("../model/giohang.php"); // Gọi model giỏ hàng
require("../model/donhang.php"); // Gọi model đơn hàng

$dm = new DANHMUC();
$danhmuc = $dm->laydanhmuc();
$mh = new MATHANG();
$mathangxemnhieu = $mh->laymathangxemnhieu();

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
} else {
    $action="null"; 
}

switch($action){
    case "null":    
        $mathang = $mh->laymathang();   
        include("main.php");
        break;
        
    case "group": 
        if(isset($_REQUEST["id"])){
            $madm = $_REQUEST["id"];
            $dmuc = $dm->laydanhmuctheoid($madm);
            $tendm =  $dmuc["tendanhmuc"];   
            $mathang = $mh->laymathangtheodanhmuc($madm);
            include("group.php");
        } else {
            include("main.php");
        }
        break;
        
    case "detail": 
        if(isset($_GET["id"])){
            $mahang = $_GET["id"];
            $mh->tangluotxem($mahang);
            $mhct = $mh->laymathangtheoid($mahang);
            $madm = $mhct["danhmuc_id"];
            $mathang = $mh->laymathangtheodanhmuc($madm);
            include("detail.php");
        }
        break;

    // QUẢN LÝ GIỎ HÀNG
    case "chovaogio":
        if(isset($_REQUEST["id"])){
            $id = $_REQUEST["id"];
            $soluong = isset($_REQUEST["soluong"]) ? $_REQUEST["soluong"] : 1;
            
            if(isset($_SESSION['giohang'][$id])){
                $soluong += $_SESSION['giohang'][$id];
            }
            themhangvaogio($id, $soluong);
            
            $giohang = laygiohang();
            include("cart.php");
        }
        break;
        
    case "giohang":
        $giohang = laygiohang();
        include("cart.php");
        break;
        
    case "capnhatgio":
        if(isset($_REQUEST["mh"])){
            $mh_capnhat = $_REQUEST["mh"];
            foreach($mh_capnhat as $id => $soluong){
                if($soluong > 0) capnhatsoluong($id, $soluong);
                else xoamotmathang($id);
            }
        }
        $giohang = laygiohang();
        include("cart.php");
        break;
        
    case "xoagiohang":
        xoagiohang();
        $giohang = laygiohang();
        include("cart.php");
        break;

    // THANH TOÁN & ĐẶT HÀNG
    case "thanhtoan":
        $giohang = laygiohang();
        include("checkout.php");
        break;

    case "luudonhang":
        $email = trim($_POST["txtemail"]);
        $hoten = trim($_POST["txthoten"]);
        $sodt = trim($_POST["txtsodienthoai"]);
        $diachi = trim($_POST["txtdiachi"]);

        if(empty($email) || empty($hoten) || empty($sodt) || empty($diachi)){
            $thongbao = "Vui lòng nhập đầy đủ thông tin khách hàng.";
            include("checkout.php");
            break;
        }

        $nd = new NGUOIDUNG();
        $khachhang = $nd->laythongtinnguoidung($email);
        $matkhauMacDinh = "123456";

        // Nếu chưa có tài khoản, tự động tạo khách hàng mới với mật khẩu mặc định hợp lệ
        if(!$khachhang){
            $nguoidung_id = $nd->themnguoidung($email, $matkhauMacDinh, $sodt, $hoten, 3);
            $khachhang = $nd->laythongtinnguoidung($email);
        } else {
            // Cập nhật lại thông tin khách hàng nếu cần
            $nd->capnhatnguoidung($khachhang["id"], $email, $sodt, $hoten, $khachhang["hinhanh"] ?? null);
            $nguoidung_id = $khachhang["id"];
        }

        $dh = new DONHANG();
        $diachi_id = $dh->themdiachi($nguoidung_id, $diachi);
        $tongtien = tinhtiengiohang();
        $donhang_id = $dh->themdonhang($nguoidung_id, $diachi_id, $tongtien);

        // Lưu chi tiết đơn hàng
        $giohang = laygiohang();
        foreach($giohang as $id => $item){
            $dh->themchitietdonhang($donhang_id, $id, $item["giaban"], $item["soluong"], $item["thanhtien"]);
        }

        xoagiohang(); // Đặt hàng xong thì xóa giỏ
        $thongbao = "Cảm ơn bạn! Đơn hàng đã được đặt thành công.";
        include("message.php");
        break;

    default:
        break;
}
?>