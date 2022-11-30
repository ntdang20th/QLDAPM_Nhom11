<?php
class THUONGHIEU{
    private $id;
    private $tenthuonghieu;

    public function getID(){
        return $this->id;
    }

    public function setID($value){
        $this->id = $value;
    }

    public function getTenthuonghieu(){
        return $this->tenthuonghieu;
    }

    public function setTenthuonghieu($value){
        $this->tenthuonghieu = $value;
    }

    // Lấy danh sách
    public function laythuonghieu(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM brand where active=1";
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
    public function themthuonghieu($tile, $slug, $description)
    {
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO `brand`( `title`, `slug`, `description`, `active`) 
                	VALUES(:tile, :slug,  :descript, 1) ";
            
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tile", $tile);
            $cmd->bindValue(":slug", $slug);
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
    public function xoathuonghieu($id){
        $dbcon = DATABASE::connect();
        try{
           
            $sql = " update brand set active = 0 where id =:id";
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
    public function suathuonghieu($id,$tenthuonghieu,$slug, $mota){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE brand SET title=:tenthuonghieu, slug=:slug, description=:mota WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenthuonghieu", $tenthuonghieu);
            $cmd->bindValue(":slug", $slug);
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
    public function laythuonghieutheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM brand WHERE id=:id";
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
