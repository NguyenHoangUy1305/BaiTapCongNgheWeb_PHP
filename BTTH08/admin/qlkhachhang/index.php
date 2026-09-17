<?php
session_start();

if(!isset($_SESSION["nguoidung"])){
    header("location:../ktnguoidung/index.php");
    exit();
}

require("../../model/database.php");
require("../../model/nguoidung.php");

$nd = new NGUOIDUNG();
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "xem";

switch($action){
    case "xem":
    default:
        $khachhang = $nd->laydanhsachkhachhang();
        include("main.php");
        break;
}
?>
