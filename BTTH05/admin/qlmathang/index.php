<?php 
require("../../model/database.php");
require("../../model/danhmuc.php");
require("../../model/mathang.php");

$mh = new MATHANG();
$dm = new DANHMUC(); // Gọi thêm model Danh mục để lấy dữ liệu đổ vào dropdown chọn danh mục

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

switch($action){
    case "xem":
        $mathang = $mh->laymathang();       
        include("main.php");
        break;
        
    case "them":
        $danhmuc = $dm->laydanhmuc(); // Lấy danh sách danh mục
        include("them.php"); // Gọi giao diện form thêm
        break;

    case "xulythem":
        // Xử lý upload file ảnh
        $hinhanh = "images/products/" . basename($_FILES["filehinhanh"]["name"]);
        // Upload ảnh vào thư mục gốc của project
        move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], "../../" . $hinhanh);

        $mathangmoi = new MATHANG();
        $mathangmoi->settenmathang($_POST["txttenmathang"]);
        $mathangmoi->setmota($_POST["txtmota"]);
        $mathangmoi->setgiagoc($_POST["txtgiagoc"]);
        $mathangmoi->setgiaban($_POST["txtgiaban"]);
        $mathangmoi->setsoluongton($_POST["txtsoluongton"]);
        $mathangmoi->setdanhmuc_id($_POST["optdanhmuc"]);
        $mathangmoi->sethinhanh($hinhanh);

        $mh->themmathang($mathangmoi);
        
        $mathang = $mh->laymathang();       
        include("main.php");
        break;

    case "xoa":
        $mathangxoa = new MATHANG();
        $mathangxoa->setid($_GET["id"]);
        $mh->xoamathang($mathangxoa);
        
        $mathang = $mh->laymathang();       
        include("main.php");
        break;

    case "sua":
        $mhct = $mh->laymathangtheoid($_GET["id"]); // Lấy mặt hàng cần sửa
        $danhmuc = $dm->laydanhmuc(); // Lấy danh sách danh mục
        include("sua.php"); // Gọi giao diện form sửa
        break;

    case "xulysua":
        $mathangsua = new MATHANG();
        $mathangsua->setid($_POST["txtid"]);
        $mathangsua->settenmathang($_POST["txttenmathang"]);
        $mathangsua->setmota($_POST["txtmota"]);
        $mathangsua->setgiagoc($_POST["txtgiagoc"]);
        $mathangsua->setgiaban($_POST["txtgiaban"]);
        $mathangsua->setsoluongton($_POST["txtsoluongton"]);
        $mathangsua->setdanhmuc_id($_POST["optdanhmuc"]);
        
        // Kiểm tra xem người dùng có chọn upload ảnh mới không
        if($_FILES["filehinhanh"]["name"] != ""){
            $hinhanh = "images/products/" . basename($_FILES["filehinhanh"]["name"]);
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], "../../" . $hinhanh);
            $mathangsua->sethinhanh($hinhanh);
        } else {
            // Nếu không đổi ảnh thì giữ lại ảnh cũ
            $mathangsua->sethinhanh($_POST["hinhanh_cu"]);
        }

        $mh->suamathang($mathangsua);
        
        $mathang = $mh->laymathang();       
        include("main.php");
        break;
        
    default:
        break;
}
?>