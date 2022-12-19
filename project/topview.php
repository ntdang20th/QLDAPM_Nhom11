<div class="row"> 
    <!-- Hàng nổi bật -->    
    <h3>Mua nhiều trong tháng</h3>
    <?php
    foreach($mathangnoibat as $m):
    ?>
    <div class="col-lg-3 col-sm-4 col-6">
        <div class="panel panel-primary text-center">
          <div class="panel-heading cattitle">
            <a href="?action=detail&product_id=<?php echo $m["id"]; ?>" style="color:Yellow;font-weight:bold;"><?php echo $m["catitle"]; ?></a>
          </div>
          <div class="panel-body"><a href="?action=detail&product_id=<?php echo $m["id"]; ?>"><img src="images/<?php echo $m["hinhanh"]; ?> " class="img-responsive" style="width:100%" alt="<?php echo $m["title"]; ?>"></a>
            <p><strong>Giá bán: <span class="text-danger">
                  <?php echo number_format($m["vprice"]); ?>đ</span> </strong></p>
          </div>
          <div class="panel-heading">
            <a href="?action=detail&product_id=<?php echo $m["id"]; ?>" style="color:white;font-weight:bold;"><?php echo $m["title"]; ?></a>
          </div>

          <div class="panel-footer">
            <a class="btn btn-success" href="?action=detail&product_id=<?php echo $m["id"]; ?>">Chi tiết</a>
            <a class="btn btn-danger" href="">Chọn mua</a>
          </div>
        </div>
      </div> 
    <?php endforeach; ?>
</div>