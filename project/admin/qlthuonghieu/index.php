<?php 
if(!isset($_SESSION["nguoidung"]))
    header("location:../index.php");
require("../../model/database.php");

require("../../model/timkiem.php");
require("../../model/thuonghieu.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$th = new THUONGHIEU();
$idsua = 0;

switch($action){
    case "xem":
        $thuonghieu = $th->laythuonghieu();       
        include("main.php");
        break;
    case "them":
        //xu ly them
        $tile = $_POST["txtten"];
        $slug = $_POST["txtslug"]; 
        $description = $_POST["txtmota"];
       
        $th->themthuonghieu($tile, $slug,$description);    
		$thuonghieu = $th->laythuonghieu(); 
        include("main.php");
        break;
	case "xoa":
        $th->xoathuonghieu($_GET["id"]);    
		$thuonghieu = $th->laythuonghieu(); 
        include("main.php");
        break;
	case "sua":
		$idsua = $_GET["id"];
        $thuonghieu = $th->laythuonghieu();       
        include("main.php");
        break;
	case "capnhat":
		$th->suathuonghieu($_POST["txtid"], $_POST["txtten"],$_POST["txtslug"], $_POST["txtmota"]);
        $thuonghieu = $th->laythuonghieu();
        include("main.php");
        break;
    case "timKiem":
        if(isset($_POST['txtTuKhoa']))
            $tuKhoa = $_POST['txtTuKhoa'];
        
        if(isset($_POST['optbang']))
            $loaiTimKiem = $_POST['optbang'];

        if($loaiTimKiem =='selectTenHoacTenVietTat')
            $thuonghieu = layDanhMucTheoTenHoacTenVietTat1($tuKhoa);
    
       
        include("main.php");
        break;
    default:
        break;
}
?>
