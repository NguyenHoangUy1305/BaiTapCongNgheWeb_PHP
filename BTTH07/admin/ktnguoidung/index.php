<?php
session_start();
require("../../model/database.php");
require("../../model/nguoidung.php");

$isLogin = isset($_SESSION["nguoidung"]);

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
} elseif ($isLogin == FALSE) {
    $action = "dangnhap";
} else {
    $action = "macdinh";
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
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        if($nd->kiemtranguoidunghople($email, $matkhau) == TRUE) {
            $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
            include("main.php");
        } else {
            $thongbao = "Email, mật khẩu không đúng hoặc tài khoản đã bị khóa!";
            include("login.php");
        }
        break;
        
    case "dangxuat":
        unset($_SESSION["nguoidung"]);
        include("login.php");
        break;
        
    case "hoso":
        include("profile.php");
        break;
        
    case "xlhoso":
        $id = $_POST["txtid"];
        $email = $_POST["txtemail"];
        $sodt = $_POST["txtdienthoai"];
        $hoten = $_POST["txthoten"];
        $hinhanh = $_POST["txthinhanh"];
        
        if($_FILES["fhinh"]["name"] != null){
            $hinhanh = basename($_FILES["fhinh"]["name"]);
            $duongdan = "../../images/users/" . $hinhanh;
            move_uploaded_file($_FILES["fhinh"]["tmp_name"], $duongdan);
        }
        $nd->capnhatnguoidung($id, $email, $sodt, $hoten, $hinhanh);
        $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
        include("main.php");
        break;
        
    case "matkhau":
        include("changepass.php");
        break;
        
    case "xldoimatkhau":
        $email = $_SESSION["nguoidung"]["email"];
        $mkcu = $_POST["txtmatkhaucu"];
        $mkmoi = $_POST["txtmatkhaumoi"];
        
        // Kiem tra mat khau cu
        if($nd->kiemtranguoidunghople($email, $mkcu) == TRUE){
            $nd->doimatkhau($email, $mkmoi);
            $thongbao = "Đổi mật khẩu thành công!";
        } else {
            $thongbao = "Mật khẩu cũ không chính xác!";
        }
        include("changepass.php");
        break;

    default:
        break;
}
?>