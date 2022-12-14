<?php
require("model/database.php");
require("model/danhmuc.php");
require("model/mathang.php");
require("model/giohang.php");
require("model/timkiem.php");
require("model/nguoidung.php");
require("model/thuonghieu.php");

$dm = new DANHMUC();
$mh = new MATHANG();
$th = new THUONGHIEU();
$gh = new GIOHANG();

$danhmuc = $dm->laydanhmuc();
$thuonghieu = $th->laythuonghieu();

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "macdinh";
}

$nguoidung = new NGUOIDUNG();
$acitve = 0;


// $mathangnoibat = $mh->laymathangnoibat();

switch ($action) {
    case "macdinh":
        $tongmh = $mh->demtongsomathang(null, null);
        $mathang = $mh->laymathang(null, null);
        $soluong = 8;
        $tongsotrang = ceil($tongmh / $soluong);
        if (!isset($_REQUEST["trang"]))
            $tranghh = 1;
        else
            $tranghh = $_REQUEST["trang"];
        $batdau = ($tranghh - 1) * $soluong;
        $mathang = $mh->laymathangphantrang($batdau, $soluong, null, null);
        $mathangnoibat = $mh -> laymathangnoibat();
        include("main.php");
        break;

    case "detail":
        if (isset($_GET["product_id"])) {
            $mahang = $_GET["product_id"];
           
            $mhct = $mh->laymathangtheoid($mahang);
          
            include("detail.php");
        }
        break;

    case "chovaogio":
        if(isset($_REQUEST["txtmahang"]) && isset($_REQUEST["txtsoluong"])){
            $mahang = $_REQUEST["txtmahang"];
            $soluong = $_REQUEST["txtsoluong"];
        }
        $card_id = $gh->layidgiohang($_SESSION['nguoidung']['id']);
        $gh -> themhangvaogio($card_id ,$mahang, $soluong);

        $soluongtronggio = $gh->demhangtronggio();
        $giohang = $gh->laygiohang();
        $tongtiengiohang = $gh->tinhtiengiohang();
        include("cart.php");
        break;

    case "viewcart":
        if(!isset($_SESSION['nguoidung']))
            return;
        $soluongtronggio = $gh->demhangtronggio();
        $giohang = $gh->laygiohang();
        $tongtiengiohang = $gh->tinhtiengiohang();
        include("cart.php");
        break;

    case "timKiem":
        // $tongmh = $mh->demtongsomathang();
        // $soluong = 4;
        // $tongsotrang = ceil($tongmh / $soluong);
        // if (!isset($_REQUEST["trang"]))
        //     $tranghh = 1;
        // else
        //     $tranghh = $_REQUEST["trang"];
        // $batdau = ($tranghh - 1) * $soluong;

        if (isset($_POST['txtTuKhoa']))
            $tuKhoa = $_POST['txtTuKhoa'];

        if (isset($_POST['optbang']))
            $loaiTimKiem = $_POST['optbang'];


        if ($loaiTimKiem == "tenSP")
            $mathang = getProductsbyName($tuKhoa);
        else if ($loaiTimKiem == "giaMin")
            $mathang = getPriceMin($tuKhoa);
        else
            $mathang = getPriceMax($tuKhoa);
        include('main.php');
        break;

    case "dangnhap":
        include("login.php");
        break;

    case "dangxuat":


        unset($_SESSION["nguoidung"]);

        include("login.php");
        break;

    case "xldangnhap":
        $username = $_POST["txtusername"];
        $matkhau = $_POST["txtmatkhau"];
        if ($nguoidung->checkUser($username, $matkhau) == TRUE) {
            $_SESSION["nguoidung"] = $nguoidung->getUserInfo($username);
            $tongmh = $mh->demtongsomathang(null, null);
            $mathang = $mh->laymathang(null, null);
            $soluong = 8;
            $tongsotrang = ceil($tongmh / $soluong);
            if (!isset($_REQUEST["trang"]))
                $tranghh = 1;
            else
                $tranghh = $_REQUEST["trang"];
            $batdau = ($tranghh - 1) * $soluong;
            $mathang = $mh->laymathangphantrang($batdau, $soluong, null, null);
            $mathangnoibat = $mh -> laymathangnoibat();
            $gh -> giohang();
            include("main.php");
        } else {
            $tb = "????ng nh???p kh??ng th??nh c??ng!";
            include("login.php");
        }
        break;
    case "capNhatHoSoCaNhan":
        $tongmh = $mh->demtongsomathang(null, null);
        $mathang = $mh->laymathang(null, null);
        $soluong = 4;
        $tongsotrang = ceil($tongmh / $soluong);
        if (!isset($_REQUEST["trang"]))
            $tranghh = 1;
        else
            $tranghh = $_REQUEST["trang"];
        $batdau = ($tranghh - 1) * $soluong;
        $mathang = $mh->laymathangphantrang($batdau, $soluong, null, null);
        $mathangnoibat = $mh -> laymathangnoibat();
        $userName = $_POST['txtUserName'];
        $email = $_POST['txtEmail'];
        $phoneNumber = $_POST['txtDienThoai'];
        $address = $_POST['txtDiaChi'];
        $nguoidung->capnhatnguoidung($userName, $email, $phoneNumber, $address);
        $_SESSION['nguoidung'] = $nguoidung->getUserInfo($userName);
        include('main.php');
        break;
    case 'doiMatKhau':
        $tongmh = $mh->demtongsomathang(null, null);
        $mathang = $mh->laymathang(null, null);
        $soluong = 4;
        $tongsotrang = ceil($tongmh / $soluong);
        if (!isset($_REQUEST["trang"]))
            $tranghh = 1;
        else
            $tranghh = $_REQUEST["trang"];
        $batdau = ($tranghh - 1) * $soluong;
        $mathang = $mh->laymathangphantrang($batdau, $soluong, null, null);
        $mathangnoibat = $mh -> laymathangnoibat();
        $id = $_POST['txtid'];
        $oldpass = $_POST['txtoldpass'];
        $newpass = $_POST['txtnewpass'];
        $confirmpass = $_POST['txtconfirmpass'];
        $userName = $_SESSION['nguoidung']['username'];
        $row = $nguoidung->checkUser($userName, $oldpass);

        if ($row == 1) {
            if ($newpass == $confirmpass) {
                $message = "C???p nh???t m???t kh???u m???i th??nh c??ng";
                $nguoidung->resetPass($id, $newpass);
            } else {
                $message = "X??c nh???n m???t kh???u m???i sai";
            }
        } else {
            $message = "M???t kh???u c?? kh??ng ????ng";
        }

        $_SESSION['nguoidung'] = $nguoidung->getUserInfo($userName);

        include("main.php");
        break;
    case 'xulydangkytaikhoan':
        $tongmh = $mh->demtongsomathang(null, null);
        $mathang = $mh->laymathang(null, null);
        $soluong = 4;
        $tongsotrang = ceil($tongmh / $soluong);
        if (!isset($_REQUEST["trang"]))
            $tranghh = 1;
        else
            $tranghh = $_REQUEST["trang"];
        $batdau = ($tranghh - 1) * $soluong;
        $mathang = $mh->laymathangphantrang($batdau, $soluong, null, null);
        $mathangnoibat = $mh -> laymathangnoibat();
        if (isset($_POST["txtusername"]) && isset($_POST["txtpassword"]) && isset($_POST["txtemail"]) && isset($_POST["txtphone"]) && isset($_POST["txtaddress"])) {
            $username = $_POST['txtusername'];
            $password = $_POST['txtpassword'];
            $email = $_POST['txtemail'];
            $phone = $_POST['txtphone'];
            $address = $_POST['txtaddress'];
            $nguoidung->addUser($username, $password, $email, $phone, $address);
            include("login.php");
        } else
            include("login.php");
        break;

    case "xemloai":
        $tongmh = $mh->demtongsomathang(null, $_REQUEST["madm"]);
        $mathang = $mh->laymathang(null, $_REQUEST["madm"]);
        $soluong = 8;
        $tongsotrang = ceil($tongmh / $soluong);
        if (!isset($_REQUEST["trang"]))
            $tranghh = 1;
        else
            $tranghh = $_REQUEST["trang"];
        $batdau = ($tranghh - 1) * $soluong;
        $mathang = $mh->laymathangphantrang($batdau, $soluong, null, $_REQUEST["madm"]);
        $mathangnoibat = $mh -> laymathangnoibat();
        include("main.php");
        break;
    case "xembrand":
        $tongmh = $mh->demtongsomathang($_REQUEST["brandid"], null);
        $mathang = $mh->laymathang($_REQUEST["brandid"], null);
        $soluong = 8;
        $tongsotrang = ceil($tongmh / $soluong);
        if (!isset($_REQUEST["trang"]))
            $tranghh = 1;
        else
            $tranghh = $_REQUEST["trang"];
        $batdau = ($tranghh - 1) * $soluong;
        $mathang = $mh->laymathangphantrang($batdau, $soluong, $_REQUEST["brandid"], null);
        $mathangnoibat = $mh -> laymathangnoibat();
        include("main.php");
        break;
    
    case "thoedoidonhang":
        break;

    case "xoagiohang":
        $card_id = $gh->layidgiohang($_SESSION['nguoidung']['id']);
        $gh->xoagiohang($card_id);
        if(!isset($_SESSION['nguoidung']))
            return;
        $soluongtronggio = $gh->demhangtronggio();
        $giohang = $gh->laygiohang();
        $tongtiengiohang = $gh->tinhtiengiohang();
        include("cart.php");
        break;
    default:
        break;
}
