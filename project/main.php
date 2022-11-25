<?php include("view/top.php"); ?>

<br><br>
<div class="container">
  <div class="row">
    <!-- Tất cả mặt hàng - Xử lý phân trang -->
    <a name="sptatca"></a>
    <h3>Tất cả sản phẩm </h3>
    <?php
    foreach ($mathang as $mh) :
    ?>
      <div class="col-sm-3">
        <div class="panel panel-primary text-center">
          <div class="panel-heading">

            <a href="?action=xemchitiet&mahang=<?php echo $mh["id"]; ?>" style="color:white;font-weight:bold;"><?php echo $mh["title"]; ?></a>
          </div>
          <div class="panel-body"><a href="?action=xemchitiet&mahang=<?php echo $mh["id"]; ?>"><img src="images/<?php echo $mh["hinhanh"]; ?>" class="img-responsive" style="width:100%" alt="<?php echo $mh["title"]; ?>"></a>
            <p><strong>Giá bán: <span class="text-danger">
                  <?php echo number_format($mh["price"]); ?>đ</span> </strong></p>
          </div>
          <div class="panel-footer">
            <a class="btn btn-success" href="?action=xemchitiet&mahang=<?php echo $mh["id"]; ?>">Chi tiết</a>
            <a class="btn btn-danger" href="">Chọn mua</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="row">
    <ul class="pagination">
      <li><a href="?trang=1"><span class="glyphicon glyphicon-step-backward"></span></a></li>

      <?php
      if ($tranghh > 1 && $tongsotrang > 1)
      ?>
      <li><a href="?trang=<?php echo $tranghh - 1; ?>"><span class="glyphicon glyphicon-chevron-left"></span></a></li>

      <?php
      for ($i = 1; $i <= $tongsotrang; $i++) {
        if ($i == $tranghh) {
      ?>
          <li class="active"><span><?php echo $i; ?></span></li>
        <?php
        } else {
        ?>
          <li><a href="?trang=<?php echo $i ?>"><?php echo $i; ?></a></li>

      <?php }
      }
      if ($tranghh < $tongsotrang && $tongsotrang > 1) ?>
      <li><a href="?trang=<?php echo $tranghh + 1; ?>"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
      <li><a href="?trang=<?php echo $tongsotrang; ?>"><span class="glyphicon glyphicon-step-forward"></span></a></li>
    </ul>

  </div>


  <?php include("topview.php"); ?>


</div>

<?php include("view/carousel.php"); ?>
<?php include("view/bottom.php"); ?>