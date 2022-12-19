<?php include("../view/top.php"); ?>

<h3>Thêm mặt hàng</h3>
<br>
<form method="post" enctype="multipart/form-data" action="index.php">

	<div class="form-group">
		<label>Tên mắt kính</label>
		<input class="form-control" type="text" name="txttenmathang">
	</div>
	<div class="form-group">
		<label>Mô tả</label>
		<textarea class="form-control" name="txtmota"></textarea>
	</div>

	<div class="form-group">
		<label>Giá bán</label>
		<input class="form-control" type="number" name="txtgiaban" value="0">
	</div>

	<div class="form-group">
		<label>Phân loại mắt kính</label>
		<select class="form-control" name="optdanhmuc">
			<?php
			foreach ($danhmuc as $d) :
			?>
				<option value="<?php echo $d["id"]; ?>"><?php echo $d["title"]; ?></option>
			<?php
			endforeach;
			?>
		</select>
	</div>
	<div class="form-group">
		<label>Thương hiệu</label>
		<select class="form-control" name="optthuonghieu">
			<?php
			foreach ($thuonghieu as $d) :
			?>
				<option value="<?php echo $d["id"]; ?>"><?php echo $d["title"]; ?></option>
			<?php
			endforeach;
			?>
		</select>
	</div>

	<div class="form-group">
		<label>Hình ảnh</label>
		<input class="form-control" type="file" name="filehinhanh">
	</div>
	<div class="form-group">
		<input type="hidden" name="action" value="xulythem">
		<input type="submit" value="Lưu" class="btn btn-success">
		<input type="reset" value="Hủy" class="btn btn-warning">
	</div>
</form>

<?php include("../view/bottom.php"); ?>