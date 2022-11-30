<?php
class DANHMUC{
    private $id;
    private $tendanhmuc;

    public function getID(){
        return $this->id;
    }

    public function setID($value){
        $this->id = $value;
    }

    public function getTendanhmuc(){
        return $this->tendanhmuc;
    }

    public function setTendanhmuc($value){
        $this->tendanhmuc = $value;
    }

    // Lấy danh sách
    public function laydanhmuc(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM category where active=1";
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

    // Thêm mới
    public function themdanhmuc($tile, $description)
    {
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO `category`( `title`, `description`, `active`) 
                	VALUES(:tile,  :descript, 1) ";
            
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tile", $tile);
            $cmd->bindValue(":descript", $description);
          

            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Xóa 
    public function xoadanhmuc($id){
        $dbcon = DATABASE::connect();
        try{
           
            $sql = " update category set active = 0 where id =:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Cập nhật 
    public function suadanhmuc($id, $tendm, $mota){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE category SET title=:tendanhmuc, description=:mota WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tendanhmuc", $tendm);
            $cmd->bindValue(":mota", $mota);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();              
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy danh mục theo id
    public function laydanhmuctheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM danhmuc WHERE id=:id";
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

}

?>