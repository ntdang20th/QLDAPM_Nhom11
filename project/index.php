<?php
require("model/database.php");
require("model/danhmuc.php");
require("model/mathang.php");
require("model/giohang.php");
require("model/timkiem.php");
require("model/nguoidung.php");


$dm = new DANHMUC();
$mh = new MATHANG();
$danhmuc = $dm->laydanhmuc();

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
        $tongmh = $mh->demtongsomathang();
        $mathang = $mh->laymathang();
        $soluong = 4;
        $tongsotrang = ceil($tongmh / $soluong);
        if (!isset($_REQUEST["trang"]))
            $tranghh = 1;
        else
            $tranghh = $_REQUEST["trang"];
        $batdau = ($tranghh - 1) * $soluong;
        $mathang = $mh->laymathangphantrang($batdau, $soluong);
        include("main.php");
        break;
    case "xemchitiet":
        if (isset($_GET["mahang"])) {
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
        if (isset($_REQUEST["txtmahang"]))
            $mahang = $_REQUEST["txtmahang"];
        if (isset($_REQUEST["txtsoluong"]))
            $soluong = $_REQUEST["txtsoluong"];

        // tăng lượt xem lên 1
        themhangvaogio($mahang, $soluong);
        $giohang = laygiohang();
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
            $tongmh = $mh->demtongsomathang();
            $mathang = $mh->laymathang();
            $soluong = 4;
            $tongsotrang = ceil($tongmh / $soluong);
            if (!isset($_REQUEST["trang"]))
                $tranghh = 1;
            else
                $tranghh = $_REQUEST["trang"];
            $batdau = ($tranghh - 1) * $soluong;
            $mathang = $mh->laymathangphantrang($batdau, $soluong);
            include("main.php");
        } else {
            $tb = "Đăng nhập không thành công!";
            include("login.php");
        }
        break;
    case "capNhatHoSoCaNhan":
        $tongmh = $mh->demtongsomathang();
        $mathang = $mh->laymathang();
        $soluong = 4;
        $tongsotrang = ceil($tongmh / $soluong);
        if (!isset($_REQUEST["trang"]))
            $tranghh = 1;
        else
            $tranghh = $_REQUEST["trang"];
        $batdau = ($tranghh - 1) * $soluong;
        $mathang = $mh->laymathangphantrang($batdau, $soluong);

        $userName = $_POST['txtUserName'];
        $email = $_POST['txtEmail'];
        $phoneNumber = $_POST['txtDienThoai'];
        $address = $_POST['txtDiaChi'];
        $nguoidung->capnhatnguoidung($userName, $email, $phoneNumber, $address);
        $_SESSION['nguoidung'] = $nguoidung->getUserInfo($userName);
        include('main.php');
        break;
    case 'doiMatKhau':
        $tongmh = $mh->demtongsomathang();
        $mathang = $mh->laymathang();
        $soluong = 4;
        $tongsotrang = ceil($tongmh / $soluong);
        if (!isset($_REQUEST["trang"]))
            $tranghh = 1;
        else
            $tranghh = $_REQUEST["trang"];
        $batdau = ($tranghh - 1) * $soluong;
        $mathang = $mh->laymathangphantrang($batdau, $soluong);

        $matKhauMoi = $_POST['txtMatKhauMoi'];
        $userName = $_SESSION['nguoidung']['username'];
        $nguoidung->doiMatKhau($userName, $matKhauMoi);

        $_SESSION['nguoidung'] = $nguoidung->getUserInfo($userName);

        include("main.php");
        break;
    case 'xulydangkytaikhoan':
        $tongmh = $mh->demtongsomathang();
        $mathang = $mh->laymathang();
        $soluong = 4;
        $tongsotrang = ceil($tongmh / $soluong);
        if (!isset($_REQUEST["trang"]))
            $tranghh = 1;
        else
            $tranghh = $_REQUEST["trang"];
        $batdau = ($tranghh - 1) * $soluong;
        $mathang = $mh->laymathangphantrang($batdau, $soluong);

        if (isset($_POST["txtusername"]) && isset($_POST["txtpassword"]) && isset($_POST["txtemail"]) && isset($_POST["txtphone"]) && isset($_POST["txtaddress"])) {
            $username = $_POST['txtusername'];
            $password = $_POST['txtpassword'];
            $email = $_POST['txtemail'];
            $phone = $_POST['txtphone'];
            $address = $_POST['txtaddress'];
            $nguoidung->addUser($username, $password, $email, $phone, $address);
            include("main.php");
        } else
            include("main.php");
        break;
    default:
        break;
}
