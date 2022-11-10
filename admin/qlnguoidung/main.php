<?php include("../view/top.php"); ?>
<div>
  <h3>Quản lý người dùng</h3>
  <!-- Thông báo lỗi nếu có -->
  <?php
  if(isset($tb)){
  ?>
  <div class="alert alert-danger alert-dismissible fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Lỗi!</strong> <?php echo $tb; ?>
  </div>
  <?php
  }
  ?>
  <!-- Nút mở hộp modal chứa form thêm mới -->
  <div><a class="btn btn-primary" data-toggle="modal" data-target="#fthemnguoidung"><span class="glyphicon glyphicon-plus"></span> Thêm người dùng</a></div>

  <br>

  <!-- Danh sách người dùng -->
  <table class="table table-hover">
        <tr><th>Email</th><th>Số điện thoại</th><th>Họ tên</th><th>Loại quyền</th><th>Trạng thái</th><th>Khóa</th></tr>
      <?php foreach ($nguoidung as $nd): ?>
        <tr><td><?php echo $nd["email"]; ?></td>
        	<td><?php echo $nd["sodienthoai"]; ?></td>
          <td><?php echo $nd["hoten"]; ?></td>
        	<td><?php if($nd["loai"]==1) echo "Quản trị";elseif($nd["loai"]==2) echo "Nhân viên"; else echo "Khách hàng" ; ?></td>
          <td><?php if($nd["loai"]!=1) {if($nd["trangthai"]==1) echo "Kích hoạt"; else echo "Khóa" ; }?></td>
          <td>
          <?php 
          if($nd["loai"]!=1) {
            if($nd["trangthai"]==1){ ?>
              <a href="?action=khoa&trangthai=0&mand=<?php echo $nd["id"]; ?>">Khóa</a></td></tr>
            <?php 
            }
            else { ?>
              <a href="?action=khoa&trangthai=1&mand=<?php echo $nd["id"]; ?>">Kích hoạt</a></td></tr>
          <?php 
            }
          }
      endforeach; ?>
  </table>


  <!-- Hộp modal chứa form thêm mới -->
  <div class="modal fade" id="fthemnguoidung" role="dialog">
    <div class="modal-dialog">    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thêm người dùng</h4>
        </div>
        <div class="modal-body">
          <form method="post">
            <div class="form-group">        
            <input class="form-control" type="email" name="txtemail" placeholder="Email" required>
            </div>
            <div class="form-group"><input class="form-control"  type="text" name="txtmatkhau" placeholder="Mật khẩu" required></div>
            <div class="form-group">        
            <input class="form-control" type="number" name="txtdienthoai" placeholder="Số điện thoại" required>
            </div>
            <div class="form-group">
            <input class="form-control"  type="text" name="txthoten" placeholder="Họ tên" required></div>
            <div class="form-group">
            <label>Chọn quyền</label>
            <select class="form-control" name="optloaind">                
                <option value="1">Quản trị</option>
                <option value="2" selected>Thành viên</option>
                <option value="3">Khách hàng</option>
            </select></div>
            <div class="form-group">
            <input type="hidden" name="action" value="them" >
            <input class="btn btn-primary"  type="submit" value="Thêm">
            <input class="btn btn-warning"  type="reset" value="Hủy"></div>
          </form>

          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
      </div>
      
    </div>
  </div>

</div>
<?php include("../view/bottom.php"); ?>
