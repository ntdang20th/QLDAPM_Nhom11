<?php
class TimKiem
{
    public function getCategory(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM category";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
        
    }
    // Lấy danh mục theo id
    public function getCategorybyID($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM category WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetch();             
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // lấy sản phẩm theo mã danh mục
    public function getProductsbyCategory($categoryid)
    {
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM category c, product p WHERE c.id=p.id AND c.id=:categoryid";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":categoryid", $categoryid);
            $cmd->execute();
            $result = $cmd->fetchAll();             
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // lấy sản phẩm theo tên
    public function getProductsbyName($productname)
    {
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM product WHERE title=:productname";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":productname", $productname);
            $cmd->execute();
            $result = $cmd->fetchAll();             
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    //lấy sản phẩm theo giá bán tối đa
    public function getPriceMax($pricemax)
    {
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM product WHERE price < :pricemax";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":pricemax", $pricemax);
            $cmd->execute();
            $result = $cmd->fetchAll();             
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    //lấy sản phẩm theo giá bán tối thiểu
    public function getPriceMin($pricemin)
    {
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM product WHERE price < :pricemin";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":pricemin", $pricemin);
            $cmd->execute();
            $result = $cmd->fetchAll();             
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
?>