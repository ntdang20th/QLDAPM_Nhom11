<?php 
if(!isset($_SESSION["nguoidung"])){
    header("location:../index.php");
}
require("../../model/database.php");
require("../../model/danhmuc.php");
require("../../model/mathang.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$dm = new DANHMUC();
$mh = new MATHANG();

switch($action){
    case "xem":
        $mathang = $mh->laymathang();
		include("main.php");
        break;
	case "them":
		$danhmuc = $dm->laydanhmuc();
		include("addform.php");
        break;
	case "xulythem":	
		// xử lý file upload
		$hinhanh = "images/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
		$duongdan = "../../" . $hinhanh; // nơi lưu file upload
		move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
		// xử lý thêm		
		$tenmathang = $_POST["txttenmathang"];
		$mota = $_POST["txtmota"];
		$giagoc = $_POST["txtgianhap"];
		$giaban = $_POST["txtgiaban"];
		$soluongton = $_POST["txtsoluong"];
		$danhmuc_id = $_POST["optdanhmuc"];
		$mh->themmathang($tenmathang,$mota,$giagoc,$giaban,$soluongton,$danhmuc_id,$hinhanh);
		$mathang = $mh->laymathang();
		include("main.php");
        break;
	case "xoa":
		if(isset($_GET["id"]))
			$mh->xoamathang($_GET["id"]);
		$mathang = $mh->laymathang();
		include("main.php");
		break;	
    case "sua":
        if(isset($_GET["id"])){ 
            $m = $mh->laymathangtheoid($_GET["id"]);
            $danhmuc = $dm->laydanhmuc(); 
            include("updateform.php");
        }
        else{
            $mathang = $mh->laymathang();        
            include("main.php");            
        }
        break;
    case "xulysua":
        $id = $_POST["txtid"];
        $danhmuc_id = $_POST["optdanhmuc"];
        $tenmathang = $_POST["txttenhang"];
        $mota = $_POST["txtmota"];
        $giagoc = $_POST["txtgiagoc"];
        $giaban = $_POST["txtgiaban"];
        $soluongton = $_POST["txtsoluongton"];
        $luotxem = $_POST["txtluotxem"];
        $luotmua = $_POST["txtluotmua"];
        $hinhanh = $_POST["txthinhcu"];

        // upload file mới (nếu có)
        if($_FILES["filehinhanh"]["name"]!=""){
            // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
            $hinhanh = "images/" . basename($_FILES["filehinhanh"]["name"]);// đường dẫn lưu csdl
            $duongdan = "../../" . $hinhanh; // đường dẫn lưu upload file        
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }
        
        // sửa mặt hàng
        $mh->suamathang($id, $tenmathang,$mota,$giagoc,$giaban,$soluongton,$danhmuc_id,$hinhanh,$luotxem,$luotmua);         
    
        // hiển thị ds mặt hàng
        $mathang = $mh->laymathang();    
        include("main.php");
        break;

    default:
        break;
}
?>
