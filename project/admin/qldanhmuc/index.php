<?php 
if(!isset($_SESSION["nguoidung"]))
    header("location:../index.php");
require("../../model/database.php");
require("../../model/danhmuc.php");

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
        $slug = $_POST["txtslug"];
        $active = $_POST["txttrangthai"];
        $description = $_POST["txtmota"];
       
        $dm->themdanhmuc($tile, $slug,$active, $description);    
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
		$dm->suadanhmuc($_POST["txtid"], $_POST["txtten"]);
        $danhmuc = $dm->laydanhmuc();       
        include("main.php");
        break;
    default:
        break;
}
?>
