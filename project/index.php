<?php 
require("model/database.php");
require("model/danhmuc.php");
require("model/mathang.php");
require("model/giohang.php");

$dm = new DANHMUC();
$mh = new MATHANG();
$danhmuc = $dm->laydanhmuc();

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="macdinh"; 
}

$mathangnoibat = $mh->laymathangnoibat();

switch($action){
    case "macdinh": 
        $tongmh = $mh->demtongsomathang();
        $mathang = $mh->laymathang();
        $soluong=4;
        $tongsotrang=ceil($tongmh/$soluong);
        if(!isset($_REQUEST["trang"]))
            $tranghh=1;
        else
            $tranghh=$_REQUEST["trang"];
        $batdau=($tranghh-1)*$soluong;
        $mathang=$mh->laymathangphantrang($batdau,$soluong);
        include("main.php");
        break;
    case "xemchitiet": 
        if(isset($_GET["mahang"])){
            $mahang = $_GET["mahang"];
            // tăng lượt xem lên 1
            $mh->tangluotxem($mahang);
            // lấy thông tin chi tiết mặt hàng
            $mhct = $mh->laymathangtheoid($mahang);
            // lấy các mặt hàng cùng danh mục
            $madm = $mhct["danhmuc_id"];
            $mathang = $mh->laymathangtheodanhmuc($madm);
            include("detail.php");
        }
        break;

    case "chovaogio": 
        if(isset($_REQUEST["txtmahang"]))
            $mahang = $_REQUEST["txtmahang"];
        if(isset($_REQUEST["txtsoluong"]))
            $soluong = $_REQUEST["txtsoluong"];
       
        // tăng lượt xem lên 1
        themhangvaogio($mahang, $soluong);
        $giohang = laygiohang();
        include("cart.php");
        
        break;
    default:
        break;
}
?>