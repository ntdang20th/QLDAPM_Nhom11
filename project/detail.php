<?php include("view/top.php"); ?>
<br><br>
<div class="container">    
  <div class="row">
    <div class="col-sm-9">      

      <h3 class="text-primary"><?php echo $mhct["title"]; ?></h3>
      
      <div><img src="<?php echo $mhct["hinhanh"]; ?>"></div>

      <h4 class="text-primary">Giá bán: 
        <span class="text-danger"><?php echo number_format($mhct["price"]); ?> đ</span>
      </h4>

      <p><?php echo $mhct["description"]; ?></p>

      <form metohd="POST" class="form-inline">
        <input type="hidden" name="action" value="chovaogio">
        <input type="hidden" name="txtmahang" value="<?php echo $mhct["id"]; ?>">
        <input type="number" name="txtsoluong" value="1" class="form-control"require>
        <input type="submit" name="sub"  class="btn btn-info"     value="Chọn mua">
      </form>
     
      <br>
    </div>
    <div class="col-sm-3"> 
      <h3>Sản phẩm cùng loại:</h3>
      <div style="height: 300px">
      <marquee direction="up" onmouseover="stop()" onmouseout="start()">
      <?php
      foreach($mathang as $m):  
        if($m["id"] != $mhct["id"]){
      ?>
      <div>
        <div class="panel panel-info text-center">
          <div class="panel-heading">
          <a href="?action=xemchitiet&mahang=<?php echo $m["id"]; ?>">
            <?php echo $m["title"]; ?>
          </a>
          </div>
          <div class="panel-body">      
            <a href="?action=xemchitiet&mahang=<?php echo $m["id"]; ?>">
            <img src="<?php echo $m["hinhanh"]; ?>" class="img-responsive" style="width:100%"></a>
            <div>Giá bán: <span  class="text-danger">
            <?php echo number_format($m["price"]); ?>đ</span>  
            </div>
            
          <div class="panel-footer"><a class="btn btn-info" href="?action=xemchitiet&mahang=<?php echo $m["id"]; ?>">
            Chi tiết</a> 
            <a class="btn btn-danger" href="?action=chovaogio&txtmahang=<?php echo $m["id"]; ?>&txtsoluong=1">Chọn mua</a>  
          </div>  
           
        </div>
      </div>
      <?php 
        }
      endforeach; 
      ?>
      </marquee>
      </div>
    </div>    
  </div>
  
</div>

<?php include("view/carousel.php"); ?>
<?php include("view/bottom.php"); ?>