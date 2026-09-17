<?php 
session_start(); // 1. BẮT BUỘC PHẢI CÓ ĐỂ CHẠY SESSION

require("../../model/database.php");
require("../../model/nguoidung.php");

// Biến $isLogin cho biết người dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
elseif($isLogin == FALSE){  // chưa đăng nhập
    $action="dangnhap";
}
else{   // mặc định
    $action="macdinh";
}

$nd = new NGUOIDUNG();

switch($action){
    case "macdinh":               
        include("main.php");
        break;
        
    case "dangnhap":
        include("login.php");
        break;
        
    case "xldangnhap":
        $email = $_REQUEST["txtemail"];
        $matkhau = $_REQUEST["txtmatkhau"];
        
        if($nd->kiemtranguoidunghople($email,$matkhau)==TRUE){
            $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email); // đặt biến session
            include("main.php");
        }
        else{
            // 2. Thêm thông báo khi đăng nhập thất bại
            $thongbao = "Email, mật khẩu không đúng hoặc tài khoản bị khóa!"; 
            include("login.php");
        }
        break;
        
    case "dangxuat":
        unset($_SESSION["nguoidung"]);  // hủy biến session
        header("Location: ../../public/index.php"); // quay về trang khách
        exit(); // Phải có exit() khi dùng header location
        break;  
        
    case "hoso":               
        include("profile.php");
        break; 
        
    case "xlhoso":
        $mand = $_POST["txtid"];
        $email = $_POST["txtemail"];        
        $sodt = $_POST["txtdienthoai"];
        $hoten = $_POST["txthoten"];
        $hinhanh = $_POST["txthinhanh"];

        if($_FILES["fhinh"]["name"] != null){
            $hinhanh = basename($_FILES["fhinh"]["name"]);
            $duongdan = "../../images/users/" . $hinhanh;
            move_uploaded_file($_FILES["fhinh"]["tmp_name"], $duongdan);
        }
        
        $nd->capnhatnguoidung($mand,$email,$sodt,$hoten,$hinhanh);
        $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
        
        include("main.php");        
        break;
       
    case "matkhau":               
        include("changepass.php");
        break; 
        
    case "doimatkhau":
        if(isset($_POST["txtmatkhaucu"]) && isset($_POST["txtmatkhaumoi"])){
            $email = $_SESSION["nguoidung"]["email"];
            $mkcu = $_POST["txtmatkhaucu"];
            $mkmoi = $_POST["txtmatkhaumoi"];

            if(empty($mkcu) || empty($mkmoi)){
                $thongbao = "Vui lòng nhập đầy đủ mật khẩu cũ và mật khẩu mới!";
            }
            else if($nd->kiemtranguoidunghople($email, $mkcu) == TRUE){
                $nd->doimatkhau($email, $mkmoi);
                $thongbao = "Đổi mật khẩu thành công!";
            } else {
                $thongbao = "Mật khẩu cũ không chính xác!";
            }
        }
        include("changepass.php");
        break; 
        
    default:
        break;
}
?>