<?php
class DANHMUC{
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
    // Hàm thêm sản phẩm vào giỏ
    function themhangvaogio($mahang, $soluong){
    }
    // Cập nhật số lượng của giỏ hàng
    function capnhatsoluong($mahang, $soluong) {
    
    }
    // Xóa một sản phẩm trong giỏ hàng
    function xoamotmathang($mahang) {
    
    }
    // Hàm lấy mảng các sản phẩm trong giohang
    function laygiohang() {
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM cart where active=1";
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
    }
    // Đếm tổng số lượng các sản phẩm trong giỏ
    function demsoluongtronggio() {
        
    }
    // Tính tổng thành tiền trong giỏ hàng
    function tinhtiengiohang () {
    
    }
    // Xóa tất cả giỏ hàng
    function xoagiohang() {
        
    }
}
?>