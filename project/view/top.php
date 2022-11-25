<!DOCTYPE html>
<html lang="en">

<head>
  <title>ABC Shop - Cửa hàng giày thể thao</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../styles.css">

</head>

<body id="abc" data-spy="scroll" data-target=".navbar" data-offset="50">

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span> ABC Shop</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">

          <li class="nav-item dropdown">
            <a class="nav-link" href="#" data-toggle="dropdown">
              Danh mục sản phẩm<span class="caret"></span>
            </a>

            <ul class="dropdown-menu">
              <?php
              foreach ($danhmuc as $dm) :
              ?>
                <li><a href="?action=xemnhom&madm=<?php echo $dm["id"]; ?>"><?php echo $dm["title"]; ?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>

          <li><a href="#">Liên hệ</a></li>

          <li><a href="#" data-toggle="modal" data-target="#modalTimKiem">
              <span class="glyphicon glyphicon-search"></span> Tìm kiếm sản phẩm</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          
          <li>
          <div class="container-fluid">  
              <!-- Thông tin người dùng - sẽ bổ sung ở bài thực hành sau -->          
              <div class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  
                <span class="glyphicon glyphicon-user"></span> 
                  <?php if(isset($_SESSION["nguoidung"])) echo $_SESSION["nguoidung"]["username"]; ?>
                  <span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="#" class="subtitle"><span class="glyphicon glyphicon-envelope"></span> Thông báo</a></li>
                  <li><a href="#" class="subtitle" data-toggle="modal" data-target="#fcapnhatthongtin"><span class="glyphicon glyphicon-edit"></span> Hồ sơ cá nhân</a></li>
                  <li><a href="#" class="subtitle" data-toggle="modal" data-target="#fdoimatkhau"><span class="glyphicon glyphicon-wrench"></span> Đổi mật khẩu</a></li>
                  <li class="divider"></li>
                  <li><a  class="subtitle" href="?action=dangxuat"><span class="glyphicon glyphicon-log-out"></span> Thoát</a></li>
                </ul>  
                
              </div>
          </li>
          <li><a href="#" class="text-warning">
              <span class="glyphicon glyphicon-shopping-cart"></span> Giỏ hàng
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hộp tìm kiếm -->
  <div class="modal fade" id="modalTimKiem" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4><span class="glyphicon glyphicon-search"></span> Bạn cần tìm gì?</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post">
            <div class="form-group">
              <label for="txttukhoa"><span class="glyphicon glyphicon-question"></span> Từ khóa: </label>
              <input type="text" class="form-control" id="txttukhoa" name="txtTuKhoa" placeholder="Nhập từ khóa">
            </div>
            <div class="form-group">
              <label for="optbang"> Loại tìm kiếm: </label>
              <select name="optbang" class="form-control">
                <option value="">--- chọn loại tìm kiếm ---</option>
                <option selected value="tenSP">Sản phẩm theo tên</option>
                <option value="giaMin">Sản phẩm theo giá tối thiểu</option>
                <option value="giaMax">Sản phẩm theo giá tối đa</option>
              </select>
            </div>
            <button type="submit" class="btn btn-info">Tìm kiếm
              <span class="glyphicon glyphicon-ok"></span>
            </button>
            <input type="hidden" name="action" value="timKiem">
          </form>
        </div>

      </div>
    </div>
  </div>
  <br>