<?php include("../view/top.php"); ?>

<h3>Quản lý danh mục <i>(Các loại mắt kính)</i> </h3>
<br>
<table class="table table-hover">
	<tr>
		<th>Tên danh mục</th>
		<th>Không biết dịch</th>
		<th>Trạng Thái</th>
		<th>Mô Tả</th>
		<th>Trạng Thái(test thôi)</th>
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
					<td><input type="text" class="form-control" name="txttrangthai" value="<?php echo $d["active"]; ?>"></td>
					<td><input type="text" class="form-control" name="txtmota" value="<?php echo $d["description"]; ?>"></td>

					<td><?php if ($d["active"] != 1) {
						if ($d["active"] == 1) echo "Kích hoạt";
						else echo "Khóa";
					} ?></td>
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
				<td><?php echo $d["active"]; ?></td>
				<td><?php echo $d["description"]; ?></td>
				<td><?php if ($d["active"] ) {
						if ($d["active"] == 1) echo "Hoạt động";
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
		<input type="text" class="form-control" name="txttrangthai" placeholder="Trạng Thái">
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

<?php include("../view/bottom.php"); ?>