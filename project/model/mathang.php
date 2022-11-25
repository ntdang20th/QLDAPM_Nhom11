<?php
class MATHANG
{
    ///Tong so mat hang
    public function demtongsomathang()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT COUNT(*) FROM product";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $count = $cmd->fetchColumn();
            //rsort($result);
            return $count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy mặt hàng nổi bật top 4 có lượt xem cao nhất
    // public function laymathangnoibat(){
    //     $dbcon = DATABASE::connect();
    //     try{
    //         $sql = "SELECT m.*, d.tendanhmuc 
    //         FROM mathang m, danhmuc d 
    //         WHERE d.id=m.danhmuc_id 
    //         ORDER BY luotxem 
    //         DESC LIMIT 0, 4";
    //         $cmd = $dbcon->prepare($sql);
    //         $cmd->execute();
    //         $ketqua = $cmd->fetchAll();
    //         return $ketqua;
    //     }
    //     catch(PDOException $e){
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }
    // lấy mặt hàng phân trang
    public function laymathangphantrang($m, $n)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT m.*, d.title 
            FROM product m, category d 
            WHERE d.id=m.category_id 
            ORDER BY id  
            DESC LIMIT $m, $n";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $ketqua = $cmd->fetchAll();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy danh sách
    public function laymathang()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM product";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            rsort($result); // sắp xếp giảm thay cho order by desc
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Lấy danh sách mặt hàng thuộc 1 danh mục
    public function laymathangtheodanhmuc($category_id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM product WHERE category_id=:madm";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":madm", $category_id);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy mặt hàng theo id
    public function laymathangtheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM product WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật lượt xem
    public function tangluotxem($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE product SET luotxem=luotxem+1 WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Thêm mới
    public function themmathang($hinhanh,$title,$description,$price,$category_id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO  product git(title,description,price,category_id,hinhanh) 
				VALUES(:title,:description,:price,:category_id,:hinhanh)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":title", $title);
            $cmd->bindValue(":description", $description);
            $cmd->bindValue(":price", $price);
            $cmd->bindValue(":category_id", $category_id);
        
            $cmd->bindValue(":hinhanh", $hinhanh);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Xóa 
    public function xoamathang($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM mathang WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Cập nhật 
    public function suamathang($id, $tenmathang, $mota, $giagoc, $giaban, $soluongton, $danhmuc_id, $hinhanh, $luotxem, $luotmua)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE mathang SET tenmathang=:tenmathang,
										mota=:mota,
										giagoc=:giagoc,
										giaban=:giaban,
										soluongton=:soluongton,
										danhmuc_id=:danhmuc_id,
										hinhanh=:hinhanh,
										luotxem=:luotxem,
										luotmua=:luotmua
										WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenmathang", $tenmathang);
            $cmd->bindValue(":mota", $mota);
            $cmd->bindValue(":giagoc", $giagoc);
            $cmd->bindValue(":giaban", $giaban);
            $cmd->bindValue(":soluongton", $soluongton);
            $cmd->bindValue(":danhmuc_id", $danhmuc_id);
            $cmd->bindValue(":hinhanh", $hinhanh);
            $cmd->bindValue(":luotxem", $luotxem);
            $cmd->bindValue(":luotmua", $luotmua);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
