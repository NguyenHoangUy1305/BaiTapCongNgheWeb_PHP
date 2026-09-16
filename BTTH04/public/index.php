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
        // Ở trang chủ, ta không cần lấy tất cả sản phẩm ở đây nữa
        // mà sẽ dùng vòng lặp để lấy theo từng danh mục bên trong file main.php
        include("main.php");
        break;
        
    case "group":
        // Lấy sản phẩm theo danh mục cụ thể
        if(isset($_REQUEST["id"])){
            $madm = $_REQUEST["id"];
            $tendm = $dm->laydanhmuctheoid($madm); // Lấy tên danh mục để làm tiêu đề
            $mathang = $mh->laymathangtheodanhmuc($madm);
            include("group.php");
        }
        break;
        
    case "detail":
        // Xem chi tiết mặt hàng
        if(isset($_REQUEST["id"])){
            $ma = $_REQUEST["id"];
            // Yêu cầu 3: Tăng lượt xem cho mặt hàng
            $mh->tangluotxem($ma);
            // Lấy chi tiết mặt hàng
            $mhct = $mh->laymathangtheoid($ma);
            // Lấy mặt hàng cùng danh mục
            $mathang_cung_loai = $mh->laymathangtheodanhmuc($mhct['danhmuc_id']);
            
            include("detail.php");
        }
        break;
        
    default:
        break;
}
?>