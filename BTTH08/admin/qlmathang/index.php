<?php
session_start(); // Phải nằm dòng số 2

// Kiểm tra đăng nhập
if(!isset($_SESSION["nguoidung"])){
    header("location:../ktnguoidung/index.php");
    exit();
}

require("../../model/database.php");
require("../../model/danhmuc.php");
require("../../model/mathang.php");

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$dm = new DANHMUC();
$mh = new MATHANG();

switch($action){
    case "xem":
        $mathang = $mh->laymathang();
        include("main.php");
        break;
    case "them":
        $danhmuc = $dm->laydanhmuc();
        include("addform.php");
        break;
    case "xulythem":    
        $hinhanh = "images/products/" . basename($_FILES["filehinhanh"]["name"]);
        $duongdan = "../../" . $hinhanh; 
        move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        
        $mathanghh = new MATHANG();
        $mathanghh->settenmathang($_POST["txttenmathang"]);
        $mathanghh->setmota($_POST["txtmota"]);
        $mathanghh->setgiagoc($_POST["txtgianhap"]);
        $mathanghh->setgiaban($_POST["txtgiaban"]);
        $mathanghh->setsoluongton($_POST["txtsoluong"]);
        $mathanghh->setdanhmuc_id($_POST["optdanhmuc"]);
        $mathanghh->sethinhanh($hinhanh);
        $mh->themmathang($mathanghh);
        
        $mathang = $mh->laymathang();
        include("main.php");
        break;
    case "xoa":
        if(isset($_GET["id"])){
            $mathanghh = new MATHANG();        
            $mathanghh->setid($_GET["id"]);
            $mh->xoamathang($mathanghh);
        }
        $mathang = $mh->laymathang();
        include("main.php");
        break;  
    case "chitiet":
        if(isset($_GET["id"])){ 
            $m = $mh->laymathangtheoid($_GET["id"]);            
            include("detail.php");
        }
        else{
            $mathang = $mh->laymathang();        
            include("main.php");            
        }
        break;
    case "sua":
        if(isset($_GET["id"])){ 
            $m = $mh->laymathangtheoid($_GET["id"]);
            $danhmuc = $dm->laydanhmuc(); 
            include("updateform.php");
        }
        else{
            $mathang = $mh->laymathang();        
            include("main.php");            
        }
        break;
    case "xulysua":
        $mathanghh = new MATHANG();
        $mathanghh->setid($_POST["txtid"]);
        $mathanghh->setdanhmuc_id($_POST["optdanhmuc"]);
        $mathanghh->settenmathang($_POST["txttenhang"]);
        $mathanghh->setmota($_POST["txtmota"]);
        $mathanghh->setgiagoc($_POST["txtgiagoc"]);
        $mathanghh->setgiaban($_POST["txtgiaban"]);
        $mathanghh->setsoluongton($_POST["txtsoluongton"]);
        $mathanghh->setluotxem($_POST["txtluotxem"]);
        $mathanghh->setluotmua($_POST["txtluotmua"]);
        $mathanghh->sethinhanh($_POST["txthinhcu"]);

        if($_FILES["filehinhanh"]["name"]!=""){
            $hinhanh = "images/products/" . basename($_FILES["filehinhanh"]["name"]);
            $mathanghh->sethinhanh($hinhanh);
            $duongdan = "../../" . $hinhanh;        
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }
        $mh->suamathang($mathanghh);         
        
        $mathang = $mh->laymathang();    
        include("main.php");
        break;
    default:
        break;
}
?>