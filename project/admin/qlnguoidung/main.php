<?php include("../view/top.php"); ?>
<div>
  <h3>Quản lý người dùng</h3>
  <!-- Thông báo lỗi nếu có -->
  <?php if (isset($message)) { ?>
    <div class="alert alert-danger alert-dismissible fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <?php echo $message; ?>
    </div>
  <?php } ?>
  <!-- Nút mở hộp modal chứa form thêm mới -->
  <div><a class="btn btn-primary" data-toggle="modal" data-target="#fthemnguoidung"><span class="glyphicon glyphicon-plus"></span> Thêm người dùng</a></div>

  <br>

  <!-- Danh sách người dùng -->
  <table class="table table-hover">
    <tr>
      <th>Tên Người Dùng</th>
      <th>Email </th>
      <th>Số Điện Thoại</th>
      <th>Địa Chỉ</th>
      <th>Chức năng</th>
    </tr>
    <?php foreach ($nguoidung as $nd) : ?>
      <tr>
        <td><?php echo $nd["username"]; ?></td>
        <td><?php echo $nd["email"]; ?></td>
        <td><?php echo $nd["phone_number"]; ?></td>
        <td><?php echo $nd["address"]; ?></td>
        <td>
          <a class="btn btn-danger" href="index.php?action=xoa&id=<?php echo $nd["id"]; ?>"><span class="glyphicon glyphicon-trash"></span></a>
          <a href="#" data-toggle="modal" data-target="#fsuanguoidung<?php echo $nd["id"]; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
          <div class="modal fade" id="fsuanguoidung<?php echo $nd["id"]; ?>" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h3 class="modal-title">Cập nhật thông tin người dùng</h3>
                </div>
                <div class="modal-body">
                  <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="hidden" name="txtId" value="<?php echo $nd["id"] ?>">
                      <input class="form-control" type="email" name="txtUsername" placeholder="nhập tên tài khoản" value="<?php echo $nd["username"]; ?>" disabled>
                    </div>

                    <div class="form-group">
                      <label>Số điện thoại</label>
                      <input class="form-control" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="txtDienThoai" placeholder="Số điện thoại" value="<?php echo $nd["phone_number"]; ?>">
                    </div>

                    <div class="form-group">
                      <label>Email</label>
                      <input class="form-control" type="email" name="txtEmail" placeholder="Email" value="<?php echo $nd["email"]; ?>" required>
                    </div>

                    <div class="form-group">
                      <label>Địa Chỉ</label>
                      <input class="form-control" type="text" name="txtDiaChi" placeholder="Nhập địa chỉ" value="<?php echo $nd["address"]; ?>" required>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="action" value="updateUser">
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
          <a class="btn btn-success" href="index.php?action=resetpass&id=<?php echo $nd["id"]; ?>"><span>Reset mật khẩu</span></a>
        </td>
      </tr>
    <?php endforeach; ?>
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
            <form method="post">
              <div class="form-group">
                <label for="txttukhoa"><span class="glyphicon glyphicon-question"></span>Tài khoản:</label>
                <input type="text" class="form-control" id="txtusername" name="txtusername" placeholder="Nhập tên tài khoản..." required>
              </div>
              <div class="form-group">
                <label for="txttukhoa"><span class="glyphicon glyphicon-question"></span>Mật khẩu:</label>
                <input type="password" class="form-control" name="txtpassword" placeholder="Nhập mật khẩu..." required>
              </div>
              <div class="form-group">
                <label for="txttukhoa"><span class="glyphicon glyphicon-question"></span>Email:</label>
                <input type="text" class="form-control" id="txtemail" name="txtemail" placeholder="Nhập email..." required>
              </div>
              <div class="form-group">
                <label for="txttukhoa"><span class="glyphicon glyphicon-question"></span>Số điện thoại:</label>
                <input type="text" class="form-control" id="txtphone" name="txtphone" placeholder="Nhập số điên thoại..." required>
              </div>
              <div class="form-group">
                <label for="txttukhoa"><span class="glyphicon glyphicon-question"></span>Địa chỉ:</label>
                <input type="text" class="form-control" id="txtaddress" name="txtaddress" placeholder="Nhập địa chỉ..." required>
              </div>
              <div class="form-group">
                <input type="hidden" name="action" value="them">
                <input class="btn btn-primary" type="submit" value="Thêm">
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
  <?php include("../view/bottom.php"); ?>