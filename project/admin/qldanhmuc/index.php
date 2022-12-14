<?php 
if(!isset($_SESSION["nguoidung"]))
    header("location:../index.php");
require("../../model/database.php");
require("../../model/danhmuc.php");
require("../../model/timkiem.php");

// Xét xem có thao tác nào được chọn
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
    case "them":
        //xu ly them
        $tile = $_POST["txtten"];
        $description = $_POST["txtmota"];
       
        $dm->themdanhmuc($tile,$description);    
		$danhmuc = $dm->laydanhmuc(); 
        include("main.php");
        break;
	case "xoa":
        $dm->xoadanhmuc($_GET["id"]);    
		$danhmuc = $dm->laydanhmuc(); 
        include("main.php");
        break;
	case "sua":
		$idsua = $_GET["id"];
        $danhmuc = $dm->laydanhmuc();       
        include("main.php");
        break;
	case "capnhat":
		$dm->suadanhmuc($_POST["txtid"], $_POST["txtten"], $_POST["txtmota"]);
        $danhmuc = $dm->laydanhmuc();
        include("main.php");
        break;
    case "timKiem":
        if(isset($_POST['txtTuKhoa']))
            $tuKhoa = $_POST['txtTuKhoa'];
        
        if(isset($_POST['optbang']))
            $loaiTimKiem = $_POST['optbang'];

        if($loaiTimKiem =='selectTenHoacTenVietTat')
            $danhmuc = layDanhMucTheoTenHoacTenVietTat($tuKhoa);
        else if($loaiTimKiem == 'selectConHang')
            $danhmuc = layDanhMucConHang();
        else if($loaiTimKiem =='selectHetHang')
            $danhmuc = layDanhMucHetHang();
        include("main.php");
        break;
    default:
        break;
}
?>
