<?php include("../view/top.php"); ?>
<div>
<h3>Cập nhật mặt hàng</h3>
<form method="post" action="index.php" enctype="multipart/form-data">
<input type="hidden" name="action" value="xulysua">
<input type="hidden" name="txtid" value="<?php echo $m["id"]; ?>">
<div class="form-group">    
<label>Hãng sản xuất</label>    
<select class="form-control" name="optdanhmuc">
	<?php foreach ($danhmuc as $dm ) { ?>
		<option value="<?php echo $dm["id"]; ?>" <?php if($dm["id"] == $m["danhmuc_id"]) echo "selected"; ?>><?php echo $dm["tendanhmuc"]; ?></option>
	<?php } ?>
</select></div>
<div class="form-group">    
<label>Tên hàng</label>    
<input class="form-control" type="text" name="txttenhang" required value="<?php echo $m["tenmathang"]; ?>">
</div> 
<div class="form-group">    
<label>Mô tả</label>    
<textarea class="form-control" name="txtmota" required><?php echo $m["mota"]; ?></textarea>
</div> 
<div class="form-group">    
<label>Giá gốc</label>    
<input class="form-control" type="number" name="txtgiagoc" value="<?php echo $m["giagoc"]; ?>" required>
</div> 
<div class="form-group">    
<label>Giá bán</label>    
<input class="form-control" type="number" name="txtgiaban" value="<?php echo $m["giaban"]; ?>" required>
</div> 
<div class="form-group">    
<label>Số lượng tồn</label>    
<input class="form-control" type="number" name="txtsoluongton" value="<?php echo $m["soluongton"]; ?>" required>
</div> 
<div class="form-group">    
<label>Lượt xem</label>    
<input class="form-control" type="number" name="txtluotxem" value="<?php echo $m["luotxem"]; ?>" required>
</div> 
<div class="form-group">    
<label>Lượt mua</label>    
<input class="form-control" type="number" name="txtluotmua" value="<?php echo $m["luotmua"]; ?>" required>
</div> 
<div id="hinh" class="form-group">
	<label>Hình ảnh</label><br>
	<input type="hidden" name="txthinhcu" value="<?php echo $m["hinhanh"]; ?>">
	<img src="../../<?php echo $m["hinhanh"]; ?>" width="50"><br>
	<input type="checkbox" id="chkdoianh" name="chkdoianh" value="1"> Đổi ảnh<br>
</div>  
<div id="file" class="form-group">  
  <input type="file" class="form-control" name="filehinhanh">
</div>
<div class="form-group">
<input class="btn btn-primary"  type="submit" value="Lưu">
<input class="btn btn-warning"  type="reset" value="Hủy">
</div>
</form>
</div>
<!-- JQuery: hiển thị/tắt phần tử chọn file hình ảnh -->
<script>
$(document).ready(function(){
    $("#file").hide();
    $("#chkdoianh").click(function(){        
        $("#file").toggle(500);
    });
});
</script>

<?php include("../view/bottom.php"); ?>