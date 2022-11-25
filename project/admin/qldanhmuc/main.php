<?php include("../view/top.php"); ?>

<h3>Quản lý danh mục <i>(Các loại mắt kính)</i> </h3>
<a href="" data-toggle="modal" data-target="#modalTimKiem" class="btn btn-success">Tìm kiếm danh mục</a>
<br>
<table class="table table-hover">
	<tr>
		<th>Tên danh mục</th>
		<th>Không biết dịch</th>
		<th>Mô Tả</th>
		<th>Trạng Thái</th>
		<th>Trạng Thái</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php
	foreach ($danhmuc as $d) :
		if ($d["id"] == $idsua) {
	?>
			<form method="post">
				<input type="hidden" name="txtid" value="<?php echo $d["id"]; ?>">
				<input type="hidden" name="action" value="capnhat">
				<tr>
					<td><input type="text" class="form-control" name="txtten" value="<?php echo $d["tile"]; ?>"></td>
					<td><input type="text" class="form-control" name="txtslug" value="<?php echo $d["slug"]; ?>"></td>
					<td><input type="text" class="form-control" name="txtmota" value="<?php echo $d["description"]; ?>"></td>
					<td><input type="text" class="form-control" name="txttrangthai" value="<?php echo $d["active"]; ?>"></td>

					<td><input type="submit" class="btn btn-warning" value="Sửa"></td>
					<td><a href="index.php?action=xoa&id=<?php echo $d["id"]; ?>">Xóa</a></td>
				</tr>
			</form>
		<?php
		} else {
		?>
			<tr>
				<td><?php echo $d["title"]; ?></td>
				<td><?php echo $d["slug"]; ?></td>
				<td><?php echo $d["description"]; ?></td>
				<td><?php echo $d["active"]; ?></td>
				<td><?php if ($d["active"] != 1) {
						if ($d["active"] == 1) echo "Kích hoạt";
						else echo "Khóa";
					} ?></td>




	<td><a href="index.php?action=sua&id=<?php echo $d["id"]; ?>">Sửa</a></td>
	<td><a href="index.php?action=xoa&id=<?php echo $d["id"]; ?>">Xóa</a></td>
	</tr>
<?php
		}
	endforeach;
?>
</table>
<div id="buttonthem">
	<a class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Thêm danh mục</a>
</div>
<br>
<div id="formthem">
	<form class="form-inline" method="post">
		<input type="text" class="form-control" name="txtten" placeholder="Nhập tên danh mục">
		<input type="text" class="form-control" name="txtslug" placeholder="">
		<input type="text" class="form-control" name="txtmota" placeholder="Mô Tả">
		<input type="text" class="form-control" name="txttrangthai" placeholder="Trạng Thái">

		<input type="hidden" name="action" value="them">
		<input type="submit" class="btn btn-warning" value="Thêm">
	</form>
</div>

<script>
	$(document).ready(function() {
		$("#formthem").hide();
		$("#buttonthem").click(function() {
			$("#formthem").toggle(1000);
		});
	});
</script>

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
                <option selected value="selectTenHoacTenVietTat">Danh mục theo tên hoặc tên viết tắt</option>
                <option value="selectConHang">Danh mục còn hàng</option>
                <option value="selectHetHang">Danh mục hết hàng</option>
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