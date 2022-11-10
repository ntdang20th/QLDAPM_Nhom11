<div class="row"> 
    <!-- Hàng nổi bật -->    
    <h3>Sản phẩm nổi bật</h3>
    <?php
    foreach($mathangnoibat as $m):
    ?>
    <div class="col-sm-3">
      <div class="panel panel-danger text-center">
        <div class="panel-heading">
          <strong>
          <a class="panel-title"  href="?action=xemnhom&madm=<?php echo $m["danhmuc_id"]; ?>">
          <?php echo $m["tendanhmuc"]; ?>
          </strong>
          </a>  
        </div>
        <div class="panel-body">
          <a href="?action=xemchitiet&mahang=<?php echo $m["id"]; ?>"><img src="<?php echo $m["hinhanh"]; ?>" class="img-responsive" style="width:100%" alt="<?php echo $m["tenmathang"]; ?>"></a>
          <a href="?action=xemchitiet&mahang=<?php echo $m["id"]; ?>"><?php echo $m["tenmathang"]; ?></a>
        </div>
        <div class="panel-footer">
          <a class="btn btn-success" href="?action=xemchitiet&mahang=<?php echo $m["id"]; ?>">Chi tiết</a>
          <a class="btn btn-danger" href="">Chọn mua</a>
        </div>
      </div>
    </div> 
    <?php endforeach; ?>
</div>