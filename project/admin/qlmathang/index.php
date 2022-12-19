<?php 
if(!isset($_SESSION["nguoidung"])){
    header("location:../index.php");
}
require("../../model/database.php");
require("../../model/danhmuc.php");
require("../../model/mathang.php");
require("../../model/timkiem.php");
require("../../model/thuonghieu.php");
// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$dm = new DANHMUC();
$mh = new MATHANG();
$th = new THUONGHIEU();

switch($action){
    case "xem":
        $mathang = $mh->laymathang(null, null);
        $thuonghieu = $th->laythuonghieu();
		include("main.php");
        break;
	case "them":
		$danhmuc = $dm->laydanhmuc();
		$thuonghieu = $th->laythuonghieu();
		include("addform.php");
        break;
	case "xulythem":	
		// xử lý file upload
		$hinhanh =  basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
		$duongdan = "../../images/" . $hinhanh; // nơi lưu file upload
		move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
		// xử lý thêm		
		$title	 = $_POST["txttenmathang"];
		$description	 = $_POST["txtmota"];
		$price = $_POST["txtgiaban"];
		$category_id	= $_POST["optdanhmuc"];
		$brand_id	= $_POST["optthuonghieu"];
		//$active = $_POST["txtsoluong"];
	    //	$danhmuc_id = $_POST["optdanhmuc"];
		$mh->themmathang($title, $description, $category_id, $brand_id, null, $hinhanh);
        $getLastId = $mh->getLastProductID();
        $mh->themVariation($getLastId['id'], $price, 1, 1, null);

		$mathang = $mh->laymathang(null, null);
		include("main.php");
        break;
	case "xoa":
		if(isset($_GET["id"]))
			$mh->xoamathang($_GET["id"]);
		$mathang = $mh->laymathang(null, null);
		include("main.php");
		break;	
    case "sua":
        if(isset($_GET["id"])){ 
            $m = $mh->laymathangtheoid($_GET["id"]);
            $danhmuc = $dm->laydanhmuc(); 
            $thuonghieu =$th->laythuonghieu();
            include("updateform.php");
        }
        else{
            $mathang = $mh->laymathang(null, null);        
            include("main.php");            
        }
        break;
    case "xulysua":
        $id = $_POST["txtid"];
        $title	 = $_POST["txttenhang"];
        $category_id	= $_POST["optdanhmuc"];
        $description	 = $_POST["txtmota"];
        $price =$_POST["txtgiaban"];
        $hinhanh = $_POST["txthinhcu"];
        $price = $_POST["txtgiaban"];

        // upload file mới (nếu có)
        if($_FILES["filehinhanh"]["name"]!=""){
            // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
            $hinhanh = "images/" . basename($_FILES["filehinhanh"]["name"]);// đường dẫn lưu csdl
            $duongdan = "../../" . $hinhanh; // đường dẫn lưu upload file        
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }
        
        // sửa mặt hàng
        $mh->suamathang($id,$title,$category_id,$description,$price,$hinhanh);         
    
        // hiển thị ds mặt hàng
        $mathang = $mh->laymathang(null, null);    
        include("main.php");
        break;
    case "timKiem":
        if(isset($_POST['txtTuKhoa']))
            $tuKhoa = $_POST['txtTuKhoa'];
        if(isset($_POST['optbang']))
            $loaiTimKiem = $_POST['optbang'];
        if($loaiTimKiem == "tenSP")
            $mathang = getProductsbyName($tuKhoa);
        else if($loaiTimKiem == "giaMin")
            $mathang = getPriceMin($tuKhoa);
        else if($loaiTimKiem == 'giaMax')
            $mathang = getPriceMax($tuKhoa);
        else if($loaiTimKiem == 'conHang')
            $mathang = laySPConHang();
        else if($loaiTimKiem == 'hetHang')
            $mathang = laySPHetHang();
        include("main.php");
        break;
    default:
        break;
}
?>
