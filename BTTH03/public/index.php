<?php
require("../model/database.php");
require("../model/danhmuc.php");
require("../model/mathang.php");

$dm = new DANHMUC();
$danhmuc = $dm->laydanhmuc();

$mh = new MATHANG();

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="null"; 
}

switch($action){
    case "null":
        // Trang chủ
        $mathang = $mh->laymathang();
        $mathang_noibat = $mh->laymathangnoibat();
        include("main.php");
        break;
        
    case "group":
        // Sản phẩm theo danh mục
        if(isset($_REQUEST["id"])){
            $id = $_REQUEST["id"];
            $mathang = $mh->laymathangtheodanhmuc($id);
            include("group.php");
        }
        break;
        
    case "detail":
        // Chi tiết sản phẩm
        if(isset($_REQUEST["id"])){
            $id = $_REQUEST["id"];
            // Tăng view
            $mh->tangluotxem($id);
            // Lấy thông tin SP
            $mhct = $mh->laymathangtheoid($id);
            // Lấy SP cùng danh mục
            $mathang_cung_loai = $mh->laymathangtheodanhmuc($mhct['danhmuc_id']);
            
            include("detail.php");
        }
        break;
        
    default:
        break;
}
?>