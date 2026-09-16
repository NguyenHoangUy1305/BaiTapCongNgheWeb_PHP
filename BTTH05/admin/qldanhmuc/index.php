<?php 
require("../../model/database.php");
require("../../model/danhmuc.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{   // mặc định là xem danh sách
    $action="xem";
}

$dm = new DANHMUC();
$idsua = 0;

switch($action){
    case "xem":
        $danhmuc = $dm->laydanhmuc();       
        include("main.php");
        break;
        
    case "them":
        $danhmucmoi = new DANHMUC();
        $danhmucmoi->settendanhmuc($_POST["txtten"]);
        $dm->themdanhmuc($danhmucmoi);
        
        $danhmuc = $dm->laydanhmuc();       
        include("main.php");
        break;
        
    case "xoa":
        $danhmucxoa = new DANHMUC();
        $danhmucxoa->setid($_GET["id"]);
        $dm->xoadanhmuc($danhmucxoa);
        
        $danhmuc = $dm->laydanhmuc();       
        include("main.php");
        break;
        
    case "sua":
        $idsua = $_GET["id"];
        $danhmuc = $dm->laydanhmuc();       
        include("main.php");
        break;
        
    case "capnhat":
        $danhmucsua = new DANHMUC();
        $danhmucsua->setid($_POST["txtid"]);
        $danhmucsua->settendanhmuc($_POST["txtten"]);
        $dm->suadanhmuc($danhmucsua);
        
        $danhmuc = $dm->laydanhmuc();       
        include("main.php");
        break;
        
    default:
        break;
}
?>