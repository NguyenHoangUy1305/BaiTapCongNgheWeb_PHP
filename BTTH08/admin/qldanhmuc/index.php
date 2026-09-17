<?php
session_start(); // Phải nằm dòng số 2, không có khoảng trắng nào phía trước

// Kiểm tra đăng nhập
if(!isset($_SESSION["nguoidung"])){
    header("location:../ktnguoidung/index.php");
    exit(); // Bắt buộc phải có lệnh dừng
}

require("../../model/database.php");
require("../../model/danhmuc.php");

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$dm = new DANHMUC();
$idsua = 0;

switch($action){
    case "xem":
        $danhmuc = $dm->laydanhmuc();       
        include("main.php");
        break;
    case "sua":
        $idsua = $_GET["id"];
        $danhmuc = $dm->laydanhmuc();       
        include("main.php");
        break;
    case "capnhat":
        $dmmoi = new DANHMUC();
        $dmmoi->setid($_POST["id"]);
        $dmmoi->settendanhmuc($_POST["ten"]);
        $dm->suadanhmuc($dmmoi);
        $danhmuc = $dm->laydanhmuc();       
        include("main.php");
        break;
    case "them":
        $dmmoi = new DANHMUC();
        $dmmoi->settendanhmuc($_POST["ten"]);
        $dm->themdanhmuc($dmmoi);
        $danhmuc = $dm->laydanhmuc();       
        include("main.php");
        break;
    case "xoa":
        $dmxoa = new DANHMUC();
        $dmxoa->setid($_GET["id"]);
        $dm->xoadanhmuc($dmxoa);
        $danhmuc = $dm->laydanhmuc();       
        include("main.php");
        break;
    default:
        break;
}
?>