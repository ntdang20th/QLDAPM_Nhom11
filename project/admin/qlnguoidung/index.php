<?php
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "macdinh";
}

$nguoidung = new NGUOIDUNG();

switch ($action) {
    case "macdinh":
        $nguoidung = $nguoidung->selectAllUser();
        include("main.php");
        break;
    case "khoa":
        $mand = $_GET["mand"];
        $trangthai = $_GET["trangthai"];
        if (!$nguoidung->doitrangthai($mand, $trangthai)) {
            $tb = "Đã đổi trạng thái!";
        }
        $nguoidung = $nguoidung->laydanhsachnguoidung();
        include("main.php");
        break;
    case "them":
        $username = $_POST['txtusername'];
        $password = $_POST['txtpassword'];
        $email = $_POST['txtemail'];
        $phone = $_POST['txtphone'];
        $address = $_POST['txtaddress'];
        $check = $nguoidung->checkUsername($username);
        if ($check != null) {
            $message = "Tài khoản đã có vui lòng chọn tài khoản khác !!!";
            $nguoidung = $nguoidung->selectAllUser();
            include("main.php");
        } else {
            $message = "Thêm tài khoản thành công !!!";
            $nguoidung->addUser($username, $password, $email, $phone, $address);
            $nguoidung = $nguoidung->selectAllUser();
            include("main.php");
        }
        break;
    case "xoa":
        if (isset($_GET["id"])) {
            $message = "Xóa tài khoản thành công !!!";
            $nguoidung->deleteUser($_GET["id"]);
        }
        $nguoidung = $nguoidung->selectAllUser();
        include("main.php");
        break;
    case "resetpass":
        if (isset($_GET["id"])) {
            $message = "Đã đặt mật khẩu trở về 123 !!!";
            $newpass = 123;
            $nguoidung->resetPass($_GET["id"], $newpass);
        }
        $nguoidung = $nguoidung->selectAllUser();
        include("main.php");
        break;
    case "updateUser":
        $id = $_POST['txtId'];
        $email = $_POST['txtEmail'];
        $phoneNumber = $_POST['txtDienThoai'];
        $address = $_POST['txtDiaChi'];
        $nguoidung->capnhatnguoidung($id, $email, $phoneNumber, $address);
        $nguoidung = $nguoidung->selectAllUser();
        $message = "Cập nhật thành công !!!";
        include('main.php');
        break;
    default:
        break;
}
