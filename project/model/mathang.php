<?php
class MATHANG
{
    ///Tong so mat hang
    public function demtongsomathang($brand_id, $category_id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT COUNT(*) 
            FROM variation as v, product as p
            where v.product_id=p.id and v.active = 1 ";

            if ($brand_id != null) {
                $sql = $sql . " and p.brand_id=:brand_id";
            }

            if ($category_id != null) {
                $sql .= " and p.category_id=:cat_id";
            }

            $cmd = $dbcon->prepare($sql);

            if ($brand_id != null) {
                $cmd->bindValue(":brand_id", $brand_id);
            }

            if ($category_id != null) {
                $cmd->bindValue(":cat_id", $category_id);
            }
            
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

    //Lấy mặt hàng nổi bật top 4 lượt mua
    public function laymathangnoibat()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT DISTINCT p.*, v.price as vprice, cat.id as catid, cat.title as catitle
            FROM `cart_item` as c, variation as v, product as p, category as cat
            where c.item_id = v.id and v.product_id = p.id and p.category_id = cat.id
            limit 0,4";
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
    // lấy mặt hàng phân trang
    public function laymathangphantrang($m, $n, $brand_id, $category_id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT p.*, v.price as vprice, c.title as catitle
            FROM product p, variation v, category c, brand as b
            WHERE p.id = v.product_id and p.category_id=c.id and p.brand_id = b.id ";

            if ($brand_id != null) {
                $sql = $sql . " and p.brand_id=:brand_id";
            }

            if ($category_id != null) {
                $sql .= " and p.category_id=:cat_id";
            }
            $sql .= " ORDER BY id  
                        DESC LIMIT $m, $n ";
            $cmd = $dbcon->prepare($sql);

            if ($brand_id != null) {
                $cmd->bindValue(":brand_id", $brand_id);
            }

            if ($category_id != null) {
                $cmd->bindValue(":cat_id", $category_id);
            }

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

    // Lấy danh sách
    public function laymathang($brand_id, $category_id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT p.*, v.price AS vprice, c.title AS catitle 
            FROM product p, variation v, category c , brand as b
            where p.id = v.product_id AND p.category_id = c.id AND v.active = 1 and p.brand_id = b.id ";

            if ($brand_id != null) {
                $sql = $sql . " and p.brand_id=:brand_id";
            }

            if ($category_id != null) {
                $sql .= " and p.category_id= :cat_id";
            }

            $cmd = $dbcon->prepare($sql);

            if ($brand_id != null) {
                $cmd->bindValue(":brand_id", $brand_id);
            }

            if ($category_id != null) {
                $cmd->bindValue(":cat_id", $category_id);
            }
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
            $sql = "SELECT p.*, v.price AS price
            FROM product p, variation v
            where p.id = v.product_id AND p.id=:id";
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

    public function themmathang( $title, $description, $category_id, $brand_id, $hinhanh)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO `product`( `title`, `description`, `category_id`, `brand_id`, `active`, `hinhanh`) 
				VALUES(:title, :description, :category_id, :brand_id, 1, :hinhanh)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":title", $title);
            $cmd->bindValue(":description", $description);
            $cmd->bindValue(":category_id", $category_id);
            $cmd->bindValue(":brand_id", $brand_id);
           // $cmd->bindValue(":active", $active);
            $cmd->bindValue(":hinhanh", $hinhanh);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function themVariation( $product_id, $price, $sale_price, $inventory)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO `variation`( `product_id`, `price`, `sale_price`, `inventory`, `active`) 
				VALUES(:product_id, :price, :sale_price, :inventory, 1)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":product_id", $product_id);
            $cmd->bindValue(":price", $price);
            $cmd->bindValue(":sale_price", $sale_price);
            $cmd->bindValue(":inventory", $inventory);
           // $cmd->bindValue(":active", $active);
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
            $sql = "update product set active = 0 where id =:id";
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
    public function suamathang($id, $title, $category_id, $description, $hinhanh)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE product SET title=:title,
                                        category_id=:category_id,
										description=:description,
                                        hinhanh=:hinhanh									
										WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":title", $title);
            $cmd->bindValue(":category_id", $category_id);
            $cmd->bindValue(":description", $description);
            $cmd->bindValue(":hinhanh", $hinhanh);
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
    public function getLastProductID()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT id FROM variation ORDER BY id DESC LIMIT 1";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
