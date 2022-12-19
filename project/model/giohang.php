<?php
class GIOHANG{
    private $id;
    private $cart;
    private $item;
    private $is_paid;

    public function getID(){
        return $this->id;
    }

    public function setID($value){
        $this->id = $value;
    }

    public function getCart(){
        return $this->cart;
    }

    public function setCart($value){
        $this->cart = $value;
    }
    public function getItem(){
        return $this->item;
    }

    public function setItem($value){
        $this->item = $value;
    }

    public function getIs_paid(){
        return $this->is_paid;
    }

    public function setIs_paid($value){
        $this->is_paid = $value;
    }

    function __construct(){

    }



    // Hàm thêm sản phẩm vào giỏ
    function themhangvaogio($card_id, $mahang, $soluong){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO `cart_item`( `cart_id`, `item_id`, `quantity`, `is_paid`) 
                    VALUES (:card_id, :item_id, :quantity, 0)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":card_id", $card_id);
            $cmd->bindValue(":item_id", $mahang);
            $cmd->bindValue(":quantity", $soluong);
          

            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    
    // Đếm số sản phẩm trong giỏ hàng
    function layidgiohang($user_id) {
        $dbcon = DATABASE::connect();

        try {
            $sql = "SELECT id FROM `cart` WHERE user_id =:id_user";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id_user", $user_id);
            $cmd->execute();
            $count = $cmd->fetchColumn();
            return $count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Cập nhật số lượng của giỏ hàng
    function capnhatsoluong($mahang, $soluong) {
    
    }
    // Xóa một sản phẩm trong giỏ hàng
    function xoamotmathang($mahang) {
    
    }
    function giohang() {
        $dbcon = DATABASE::connect();
        try{
            if(!isset($_SESSION['nguoidung']))
                return;
            $sql = "select * from cart where user_id = " . $_SESSION['nguoidung']['id'];
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
    // Hàm lấy mảng các sản phẩm trong giohang
    function laygiohang() {
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT p.id, p.title, p.description, v.price, v.sale_price, ci.quantity, v.sale_price*ci.quantity as `thanhtien`
            FROM cart_item as ci, cart as c, user as u, product as p, variation as v 
            where p.id = v.product_id and v.id = ci.item_id and ci.cart_id = c.id and c.user_id = u.id 
            and ci.is_paid = 0 and u.id =". $_SESSION["nguoidung"]["id"];
            
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
    // Đếm số sản phẩm trong giỏ hàng
    function demhangtronggio() {
        $dbcon = DATABASE::connect();

        try {
            $sql = "SELECT count(ci.id)
            FROM cart_item as ci, cart as c, user as u 
            where ci.cart_id = c.id and c.user_id = u.id and u.id = ". $_SESSION["nguoidung"]["id"];
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $count = $cmd->fetchColumn();
            return $count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Tính tổng thành tiền trong giỏ hàng
    function tinhtiengiohang () {
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT sum(v.sale_price*ci.quantity) 
            FROM cart_item as ci, cart as c, user as u, product as p, variation as v 
            where p.id = v.product_id and v.id = ci.item_id and ci.cart_id = c.id and c.user_id = u.id 
            and ci.is_paid = 0 and u.id =". $_SESSION["nguoidung"]["id"];
            print($sql);
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $sum = $cmd->fetchColumn();
            return $sum;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa tất cả giỏ hàng
    function xoagiohang() {
        
    }
}
?>