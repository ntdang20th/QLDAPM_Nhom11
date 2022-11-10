<?php include("view/top.php"); ?>
<br><br><br>
<div class="container">    
  <div class="row"> 
    <h3>Giỏ hàng của bạn</h3>

    <?php
    if(demhangtronggio() == 0)
      echo "<p>Không có sản phẩm nào trong giỏ.</p>";
    else
    ?>
    <form action="" method="post">
      <input type="hidden" name="action" value="capnhatgiohang">
      <table class="table table-hover">
        <tr class="info">
          <th>Sản phẩm</th><th>Đơn giá</th><th>Số lượng</th><th>Thành tiền</th>
        </tr>
          <?php
            foreach($giohang as $mahang => $mh){?>
              <tr>
                <td><?php echo $mh["tenmathang"]; ?></td>
                <td><?php echo number_format($mh["giaban"]) . "đ"; ?></td>
                <td><input type="hidden" name="mh[<?php echo $mahang; ?>]" size="3" value="<?php echo $mh["soluong"] ;?>"></td>
                <td><?php echo number_format($mh["sotien"]) . "đ"; ?>"></td>
              </tr>
          <?php
          }
          ?>
          <tr>
            <td colspan="2" align="right"><b>Total</b></td>
            <td><b><?php echo number_format(tinhtiengiohang()); ?> đ</b></td>
          </tr>
          <tr>
            <td colspan="2" align="left"><i>Để xóa đi sản phẩm đã thêm vui lòng nhập số lượng = 0</i>|
                                          <a href="?action=xoagiohang">Xóa tất cả</a></td>
            <td colspan="2" align="right"><input type="submit" class="btn btn-info" value="Update"><a href="#" class="btn btn-danger">Thanh toán</a></td>
          </tr>
      </table>
    </form>
  </div>
</div>
<?php include("view/carousel.php"); ?>
<?php include("view/bottom.php"); ?>