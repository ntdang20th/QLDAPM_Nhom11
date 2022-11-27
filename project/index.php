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
        // $mathangnoibat = $mh -> laymathangnoibat();
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
            include("main.php");
        } else {
            $tb = "Đăng nhập không thành công!";
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

        $id = $_POST['txtid'];
        $oldpass = $_POST['txtoldpass'];
        $newpass = $_POST['txtnewpass'];
        $confirmpass = $_POST['txtconfirmpass'];
        $userName = $_SESSION['nguoidung']['username'];
        $row = $nguoidung->checkUser($userName, $oldpass);

        if ($row == 1) {
            if ($newpass == $confirmpass) {
                $message = "Cập nhật mật khẩu mới thành công";
                $nguoidung->resetPass($id, $newpass);
            } else {
                $message = "Xác nhận mật khẩu mới sai";
            }
        } else {
            $message = "Mật khẩu cũ không đúng";
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
        include("main.php");
        break;
    default:
        break;
}
