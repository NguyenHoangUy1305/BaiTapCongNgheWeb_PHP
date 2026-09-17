<?php
session_start();

if(!isset($_SESSION["nguoidung"])){
    header("location:../ktnguoidung/index.php");
    exit();
}

require("../../model/database.php");
require("../../model/donhang.php");

$dh = new DONHANG();
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "xem";

switch($action){
    case "xem":
    default:
        $donhang = $dh->laydanhsachdonhang();
        include("main.php");
        break;
}
?>
