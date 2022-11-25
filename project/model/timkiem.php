<?php
    function getCategory(){
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
    function getCategorybyID($id){
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


// Lấy danh mục theo tên và tên viết tắt
function layDanhMucTheoTenHoacTenVietTat($tenHoacTenVietTat){
    $dbcon = DATABASE::connect();
    try{
        $sql = "SELECT * FROM category WHERE title = '$tenHoacTenVietTat' or slug = '$tenHoacTenVietTat'";
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

// Lấy các danh mục còn hàng
function layDanhMucConHang()
{
    $dbcon = DATABASE::connect();
    try{
        $sql = "SELECT *
        FROM category
        WHERE active = 1";
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


// Lấy các danh mục hết hàng
function layDanhMucHetHang()
{
    $dbcon = DATABASE::connect();
    try{
        $sql = "SELECT *
        FROM category
        WHERE active = 0";
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

// lấy sản phẩm theo mã danh mục
    function getProductsbyCategory($categoryid)
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

function laymathangphantrang($m, $n)
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

// lấy sản phẩm theo tên (có phân trang)
    function getProductsbyName($productname/*, $batDau, $soLuong*/)
{
    $dbcon = DATABASE::connect();
    try{
        // $sql = "SELECT p.*, c.title
        // FROM product p, category c
        // WHERE p.category_id = c.id and p.title=:productname
        // ORDER BY id  
        // DESC LIMIT $batDau, $soLuong";
        $sql = "SELECT p.*, c.title
        FROM product p, category c
        WHERE p.category_id = c.id and p.title=:productname";
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


//lấy sản phẩm theo giá bán tối đa (có phân trang)
    function getPriceMax($pricemax/*, $batDau, $soLuong*/)
{
    $dbcon = DATABASE::connect();
    try{
        // $sql = "SELECT p.*, c.title
        // FROM product p, category c
        // WHERE p.category_id = c.id and p.price <= $pricemax
        // ORDER BY id  
        // DESC LIMIT $batDau, $soLuong";
        $sql = "SELECT p.*, c.title
        FROM product p, category c
        WHERE p.category_id = c.id and p.price <= $pricemax";
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


//lấy sản phẩm theo giá bán tối thiểu (có phân trang)
function getPriceMin($pricemin /*, $batDau, $soLuong*/)
{
    $dbcon = DATABASE::connect();
    try{
        // $sql = "SELECT p.*, c.title
        // FROM product p, category c
        // WHERE p.category_id = c.id and p.price >= $pricemin
        // ORDER BY id  
        // DESC LIMIT $batDau, $soLuong";
        $sql = "SELECT p.*, c.title
        FROM product p, category c
        WHERE p.category_id = c.id and p.price >= $pricemin";
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

//lấy tất cả sản phẩm còn hàng
function laySPConHang()
{
    $dbcon = DATABASE::connect();
    try{
        $sql = "SELECT p.*, c.title
        FROM product p, category c
        WHERE p.category_id = c.id and p.active = 1";
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

//lấy tất cả sản phẩm còn hàng
function laySPHetHang()
{
    $dbcon = DATABASE::connect();
    try{
        $sql = "SELECT p.*, c.title
        FROM product p, category c
        WHERE p.category_id = c.id and p.active = 0";
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

?>