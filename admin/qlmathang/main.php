<?php include("../view/top.php"); ?>

<h3>Quản lý mặt hàng</h3> 
<br>
<a href="index.php?action=them" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Thêm mặt hàng</a>
<br> <br> 
<table class="table table-hover">
	<tr>
		<th>Tên mặt hàng</th>
		<th>Giá bán</th>
		<th>Số lượng</th>
		<th>Hình ảnh</th>		
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php
	foreach($mathang as $m):
	?>
	<tr>
		<td><?php echo $m["tenmathang"]; ?></td>
		<td><?php echo $m["giaban"]; ?></td>
		<td><?php echo $m["soluongton"]; ?></td>
		<td><img src="../../<?php echo $m["hinhanh"]; ?>" width="80" class="img-thumbnail"></td>
		<td><a class="btn btn-warning" href="index.php?action=sua&id=<?php echo $m["id"]; ?>"><span class="glyphicon glyphicon-edit"> </span></a></td>
		<td><a class="btn btn-danger" href="index.php?action=xoa&id=<?php echo $m["id"]; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
	</tr>
	<?php
	endforeach;
	?>
</table>

<?php include("../view/bottom.php"); ?>
