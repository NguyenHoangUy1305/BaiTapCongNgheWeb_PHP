<?php
session_start();
if(!isset($_SESSION["nguoidung"]) || $_SESSION["nguoidung"]["loai"] != 1){
    header("location:../ktnguoidung/index.php"); // Chỉ Admin mới được vào
    exit();
}
require("../../model/database.php");
require("../../model/nguoidung.php");

$nd = new NGUOIDUNG();
if(isset($_REQUEST["action"])){ $action = $_REQUEST["action"]; } else { $action="xem"; }

switch($action){
    case "xem":
        $nguoidung = $nd->laydanhsachnguoidung();
        include("main.php");
        break;
        
    case "them":
        include("addform.php");
        break;
        
    case "xulythem":
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        $sodt = $_POST["txtdienthoai"];
        $hoten = $_POST["txthoten"];
        $loai = $_POST["optloai"];
        $nd->themnguoidung($email, $matkhau, $sodt, $hoten, $loai);
        $nguoidung = $nd->laydanhsachnguoidung();
        include("main.php");
        break;
        
    case "khoa":
        $id = $_GET["id"];
        $trangthai = $_GET["trangthai"];
        $nd->doitrangthai($id, $trangthai);
        $nguoidung = $nd->laydanhsachnguoidung();
        include("main.php");
        break;

    case "doiquyen":
        $email = $_GET["email"];
        $loai = $_GET["loai"];
        $nd->doiloainguoidung($email, $loai);
        $nguoidung = $nd->laydanhsachnguoidung();
        include("main.php");
        break;
}
?>