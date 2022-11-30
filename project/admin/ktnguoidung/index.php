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
            $phoneNumber = $_POST['txtDienThoai'];
            $email = $_POST['txtEmail'];
            $address = $_POST['txtDiaChi'];
            $nguoidung->capnhatnguoidung($userName, $email, $phoneNumber, $address);
            $_SESSION['nguoidung'] = $nguoidung->getUserInfo($userName);
            include('main.php');
        break;
        // case 'doiMatKhau':
        //     $matKhauMoi = $_POST['txtMatKhauMoi'];
        //     $userName = $_SESSION['nguoidung']['username'];
        //     $nguoidung->doiMatKhau($userName, $matKhauMoi);
    
        //     $_SESSION['nguoidung'] = $nguoidung->getUserInfo($userName);
    
        //     include("main.php");
        //     break;
        case 'doiMatKhau':
        
    
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
}
?>
