<!DOCTYPE html>
<html lang="en">
<head>
  <title>ABC Shop - Trang quản trị</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    .row.content {height: 1000px}
    .sidenav {background-color: #f1f1f1; height: 100%;}
    @media screen and (max-width: 767px) { .row.content {height: auto;} }
  </style>
</head>
<body>
<!-- Menu mh nhỏ -->
<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">ABC Shop</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Bảng điều khiển</a></li>
        <li><a href="../qldanhmuc/index.php">Quản lý danh mục</a></li>
        <li><a href="../qlmathang/index.php">Quản lý mặt hàng</a></li>
        <?php
        if(isset($_SESSION["nguoidung"]) && $_SESSION["nguoidung"]["loai"]==1){
        ?>
        <li class="active"><a href="#">Quản trị</a></li>
        <li><a href="../qlnguoidung/">Quản lý người dùng</a></li>
        <?php } ?>          
      </ul>
    </div>
  </div>
</nav>
<!-- Menu mh nhỏ - kết thúc -->
<div class="container-fluid">
  <div class="row content">
    <!-- Menu mh lớn -->     
    <div class="col-sm-3 sidenav hidden-xs">
      <h3>          
        <span class="label label-info">A</span>
        <span class="label label-warning">B</span>
        <span class="label label-danger">C</span>
        Shop
      </h3><br>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#"><span class="glyphicon glyphicon-cog"></span> Bảng điều khiển</a></li>
        <li><a href="../qldanhmuc/index.php"><span class="glyphicon glyphicon-list-alt"></span> Quản lý danh mục</a></li>
        <li><a href="../qlmathang/index.php"><span class="glyphicon glyphicon-gift"></span> Quản lý mặt hàng</a></li>
        <li><a href=""><span class="glyphicon glyphicon-list-alt"></span> Quản lý... (bổ sung)</a></li>
        
        <li class="active"><a href="#"><span class="glyphicon glyphicon-cog"></span> Quản trị</a></li>
        <li><a href="../qlnguoidung"><span class="glyphicon glyphicon-list-alt"></span> Quản lý người dùng</a></li>
      </ul><br>
    </div>
    <!-- Menu mh lớn - kết thúc -->
    <br>
    
    <div class="col-sm-9">
      <div class="container-fluid">  
        <!-- Thông tin người dùng - sẽ bổ sung ở bài thực hành sau -->          
        <div class="dropdown" style="text-align: right;">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <span class="glyphicon glyphicon-user"></span> 
            Chào <?php if(isset($_SESSION["nguoidung"])) echo $_SESSION["nguoidung"]["username"]; ?>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Thông báo</a></li>
            <li><a href="#" data-toggle="modal" data-target="#fcapnhatthongtin"><span class="glyphicon glyphicon-edit"></span> Hồ sơ cá nhân</a></li>
            <li><a href="#" data-toggle="modal" data-target="#fdoimatkhau"><span class="glyphicon glyphicon-wrench"></span> Đổi mật khẩu</a></li>
            <li class="divider"></li>
            <li><a href="../ktnguoidung/index.php?action=dangxuat"><span class="glyphicon glyphicon-log-out"></span> Thoát</a></li>
          </ul>  
          
        </div>
      </div>
      
<!-- Form cập nhật thông tin ng dùng-->
  <div class="modal fade" id="fcapnhatthongtin" role="dialog" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Hồ sơ cá nhân</h3>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data" action="../ktnguoidung/index.php">
          
          <div class="form-group">
                <label>Username</label>
                <input class="form-control" type="email" name="txtUsername" placeholder="nhập tên tài khoản" value="<?php echo $_SESSION["nguoidung"]["username"]; ?>" disabled>
              </div>

              <div class="form-group">
                <label>Số điện thoại</label>
                <input class="form-control" type="number" name="txtDienThoai" placeholder="Số điện thoại" value="<?php echo $_SESSION["nguoidung"]["phone_number"]; ?>">
              </div>

              <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="text" name="txtEmail" placeholder="Email" value="<?php echo $_SESSION["nguoidung"]["email"]; ?>" required>
              </div>

              <div class="form-group">
                <label>Địa Chỉ</label>
                <input class="form-control" type="text" name="txtDiaChi" placeholder="Nhập địa chỉ" value="<?php echo $_SESSION["nguoidung"]["address"]; ?>" required>
              </div>

              <div class="form-group">
                <input type="hidden" name="txtUserName" value="<?php echo $_SESSION['nguoidung']['username']; ?>">

                <input type="hidden" name="action" value="capNhatHoSoCaNhan">
                <input class="btn btn-primary" type="submit" value="Lưu">
                <input class="btn btn-warning" type="reset" value="Hủy">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
          </div>
        </div>
      </div>
    </div>
<!-- Form đổi mật khẩu -->
  <div class="modal fade" id="fdoimatkhau" role="dialog">
    <div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Đổi mật khẩu</h3>
          <?php if (isset($message)) { ?>
            <div class="alert alert-danger alert-dismissible fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $message; ?>
        </div>
        <?php } ?>
        <div class="modal-body">

          <form method="post" name="f" action="../ktnguoidung/index.php">
          <div class="form-group">
                <label>Tài khoản</label>
                <input class="form-control" type="hidden" name="txtid" value="<?php echo $_SESSION["nguoidung"]["id"]; ?>">
                <input class="form-control" type="text" name="txtTaiKhoan" value="<?php echo $_SESSION["nguoidung"]["username"]; ?>" disabled>
              </div>

              <div class="form-group">
                <label>Mật khẩu cũ</label>
                <input class="form-control" type="password" name="txtoldpass">
              </div>
              <div class="form-group">
                <label>Mật khẩu mới</label>
                <input class="form-control" type="password" name="txtnewpass">
              </div>
              <div class="form-group">
                <label>Xác nhận mật khẩu</label>
                <input class="form-control" type="password" name="txtconfirmpass">
              </div>


              <div class="form-group">
                <input type="hidden" name="action" value="doiMatKhau">
                <input class="btn btn-primary" type="submit" value="Lưu">
                <input class="btn btn-warning" type="reset" value="Hủy">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
 
    
