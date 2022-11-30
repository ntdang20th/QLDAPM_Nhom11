<?php include("../view/top.php"); ?>

<h3>Quản lý các thương hiệu </i> </h3>
<a href="" data-toggle="modal" data-target="#modalTimKiem" class="btn btn-success">Tìm kiếm danh mục</a>
<br>
<table class="table table-hover">
	<tr>
		<th>Tên nhãn hiệu</th>
		<th>Tên Viết Tắt</th>
		<th>Mô Tả</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php
	foreach ($thuonghieu as $th) :
		if ($th["id"] == $idsua) {
	?>
			<form method="post">
				<input type="hidden" name="txtid" value="<?php echo $th["id"]; ?>">
				<input type="hidden" name="action" value="capnhat">
				<tr>
					<td><input type="text" class="form-control" name="txtten" value="<?php echo $th["title"]; ?>"></td>
					<td><input type="text" class="form-control" name="txtslug" value="<?php echo $th["slug"]; ?>"></td>
					<td><input type="text" class="form-control" name="txtmota" value="<?php echo $th["description"]; ?>"></td>				
					<td><input type="submit" class="btn btn-warning" value="Sửa"></td>
					<td><a href="index.php?action=xoa&id=<?php echo $th["id"]; ?>">Xóa</a></td>
				</tr>
			</form>
		<?php
		} else {
		?>
			<tr>
				<td><?php echo $th["title"]; ?></td>
				<td><?php echo $th["slug"]; ?></td>		
			
				<td><?php echo $th["description"]; ?></td>
				




	<td><a href="index.php?action=sua&id=<?php echo $th["id"]; ?>"><span class="glyphicon glyphicon-edit"></a></td>
	<td><a href="index.php?action=xoa&id=<?php echo $th["id"]; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
	</tr>
<?php
		}
	endforeach;
?>
</table>
<div id="buttonthem">
	<a class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Thêm thương hiệu mới </a>
</div>
<br>
<div id="formthem">
	<form class="form-inline" method="post">
		<input type="text" class="form-control" name="txtten" placeholder="Nhập tên thương hiệu">
		<input type="text" class="form-control" name="txtslug" placeholder="Nhập Tên Viết Tắt">
		<input type="text" class="form-control" name="txtmota" placeholder="Mô Tả">
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