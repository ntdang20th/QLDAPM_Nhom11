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
  <style>
    .img-responsive{
    height: 200px;
    width: 100px;
    display: flex;
}

.subtitle{
    color: red;
}

h3 {
    text-shadow: 2px 2px 2px silver;
  }

  .carousel-inner img {
    width: 100%;
    /* Set width to 100% */
    margin: auto;
  }

  .carousel-caption h3 {
    color: #fff !important;
  }

  @media (max-width: 600px) {
    .carousel-caption {
      display: none;
      /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }

  .navbar-nav li div a{
    padding-top: 15px;
    padding-bottom: 15px;
    display: block;
    color: #9d9d9d;
    background-color: black;
  }

  .nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
  background-color: black;
  border-color: #337ab7;
  text-decoration: none;
}
.navbar-nav .open .dropdown-menu {
  
  background-color: black;
}

  .navbar-nav li div a:hover{
    background-color: transparent;
    text-decoration: none;
    color: #fff;
  }
  
  footer {
    background-color: #000000;
    color: #f5f5f5;
    padding: 32px;
  }

  footer a:hover {
    color: #777;
    text-decoration: none;
  }
  </style>

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
                  <li><a href="#" class="subtitle" data-toggle="modal" data-target="#fCapNhatThongTin"><span class="glyphicon glyphicon-edit"></span> Hồ sơ cá nhân</a></li>
                  <li><a href="#" class="subtitle" data-toggle="modal" data-target="#fDoiMatKhau"><span class="glyphicon glyphicon-wrench"></span> Đổi mật khẩu</a></li>
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

  <!-- Form cậP nhật hồ sơ người dùng -->
  <div class="modal fade" id="fCapNhatThongTin" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" datadismiss="modal">&times;</button>
              <h3 class="modal-title">Hồ sơ cá nhân</h3>
            </div>
            <div class="modal-body">
              <form method="post" enctype="multipart/form-data">
                
                <div class="text-center">
                  <img class="img-circle" src="../../images/<?php echo $_SESSION["nguoidung"]["hinhanh"]; ?>" alt="<?php echo
                  $_SESSION["nguoidung"]["username"]; ?>" width="100px">
                </div>

                <div class="form-group">
                  <label>Username</label>
                  <input class="form-control" type="email" name="txtUsername"
                  placeholder="nhập tên tài khoản" value="<?php echo $_SESSION["nguoidung"]["username"]; ?>"
                  disabled>
                </div>

                <div class="form-group">
                  <label>Số điện thoại</label>
                  <input class="form-control" type="number" name="txtDienThoai"
                  placeholder="Số điện thoại" value="<?php echo $_SESSION["nguoidung"]["phone_number"]; ?>">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" type="text" name="txtEmail"
                  placeholder="Email" value="<?php echo $_SESSION["nguoidung"]["email"]; ?>"
                  required>
                </div>

                <div class="form-group">
                  <label>Địa Chỉ</label>
                  <input class="form-control" type="text" name="txtDiaChi"
                  placeholder="Nhập địa chỉ" value="<?php echo $_SESSION["nguoidung"]["address"]; ?>"
                  required>
                </div>

                <div class="form-group">
                  <input type="hidden" name="txtUserName" value="<?php echo
                  $_SESSION['nguoidung']['username']; ?>" >
                  
                  <input type="hidden" name="action" value="capNhatHoSoCaNhan" >
                  <input class="btn btn-primary" type="submit" value="Lưu">
                  <input class="btn btn-warning" type="reset" value="Hủy">
                </div>
              </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" datadismiss="modal">Đóng</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Form cậP nhật mật khẩu -->
      <div class="modal fade" id="fDoiMatKhau" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" datadismiss="modal">&times;</button>
              <h3 class="modal-title">Hồ sơ cá nhân</h3>
            </div>
            <div class="modal-body">
              <form method="post">
                <div class="form-group">
                  <label>Tài khoản</label>
                  <input class="form-control" type="text" name="txtTaiKhoan"
                  value="<?php echo $_SESSION["nguoidung"]["username"]; ?>"
                  disabled>
                </div>

                <div class="form-group">
                  <label>Mật khẩu mới</label>
                  <input class="form-control" type="text" name="txtMatKhauMoi"
                  placeholder="Nhập mật khẩu mới"
                  required>
                </div>

                <div class="form-group">
                  <input type="hidden" name="action" value="doiMatKhau" >
                  <input class="btn btn-primary" type="submit" value="Lưu">
                  <input class="btn btn-warning" type="reset" value="Hủy">
                </div>
              </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" datadismiss="modal">Đóng</button>
            </div>
          </div>
        </div>
      </div>
  <br>