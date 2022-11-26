<?php 
require("../../model/database.php");
require("../../model/nguoidung.php");

// Biến cho biết ng dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
elseif($isLogin == FALSE){
    $action = "dangnhap";
}
else{
    $action="macdinh"; 
}


$nguoidung = new NGUOIDUNG();
$tb = "";
switch($action){
    case "macdinh":   
             
        include("main.php");
        break;
    case "dangxuat":
        
        unset($_SESSION["nguoidung"]);
                
        $tb = "Cảm ơn!";
        include("loginform.php");
        break;
    case "dangnhap":
        include("loginform.php");
        break;
    case "xldangnhap":
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        if($nguoidung->checkUser($email,$matkhau)==TRUE){
            $_SESSION["nguoidung"] = $nguoidung->getUserInfo($email);
            include("main.php");
        }
        else{
            $tb = "Đăng nhập không thành công!";
            include("loginform.php");
        }
        break;
        case "capNhatHoSoCaNhan":
            $userName = $_POST['txtUserName'];
            $email = $_POST['txtEmail'];
            $phoneNumber = $_POST['txtDienThoai'];
            $address = $_POST['txtDiaChi'];
            $nguoidung->capnhatnguoidung($userName, $email, $phoneNumber, $address);
            $_SESSION['nguoidung'] = $nguoidung->getUserInfo($userName);
            include('main.php');
        break;
        case 'doiMatKhau':
            $matKhauMoi = $_POST['txtMatKhauMoi'];
            $userName = $_SESSION['nguoidung']['username'];
            $nguoidung->doiMatKhau($userName, $matKhauMoi);
    
            $_SESSION['nguoidung'] = $nguoidung->getUserInfo($userName);
    
            include("main.php");
            break;
}
?>
