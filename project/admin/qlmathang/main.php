<?php include("../view/top.php"); ?>

<h3>Quản lý mặt hàng</h3>
<a href="" data-toggle="modal" data-target="#modalTimKiem" class="btn btn-success">Tìm kiếm mặt hàng</a>
<a href="index.php?action=them" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Thêm mặt hàng</a>
<br> <br>
<table class="table table-hover">
	<tr>
		<th>Tên mặt hàng</th>
		<th>Mô tả</th>
		<th>Giá Bán</th>		
		<th>Trang thái</th>
		<th>Hình Ảnh</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php
	foreach ($mathang as $m) :
	?>
		<tr>
			<td><?php echo $m["title"]; ?></td>
			<td><?php echo $m["description"]; ?></td>
			<td><?php echo $m["price"]; ?></td>
			

			
			<td><?php if($m["active"]) 
			{if($m["active"]==1) echo "Kích hoạt"; else echo "Khóa" ; }?></td>

			<td><img src="../../<?php echo $m["hinhanh"]; ?>" width="100" class="img-thumbnail"></td>
			<td><a class="btn btn-warning" href="index.php?action=sua&id=<?php echo $m["id"]; ?>"><span class="glyphicon glyphicon-edit"> </span></a></td>
			<td><a class="btn btn-danger" href="index.php?action=xoa&id=<?php echo $m["id"]; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
		</tr>
	<?php
	endforeach;
	?>
</table>
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
                <option value="conHang">Sản phẩm còn hàng</option>
                <option value="hetHang">Sản phẩm hết hàng</option>
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
<?php include("../view/bottom.php"); ?>