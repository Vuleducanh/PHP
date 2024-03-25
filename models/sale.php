<?php
require_once('models/shortInforProduct.php');

class sale{

    public static function getPaginatedSale($limit, $offset)
    {
        // Lấy danh sách bài viết từ cơ sở dữ liệu dựa trên giới hạn và vị trí
        // Sử dụng câu truy vấn SQL để truy vấn cơ sở dữ liệu
        // Ví dụ: SELECT * FROM posts LIMIT $limit OFFSET $offset
        $list = [];
        $db = DB::getInstance();
        $sql = "SELECT idProduct, nameProduct, price, oldPrice, idStyle, idCategory, image
                FROM Product
                LIMIT $limit OFFSET $offset";
        $req = $db->query($sql);
    
        foreach ($req->fetchAll() as $item) {
            $list[] = new shortInforProduct(
                $item['idProduct'],
                $item['nameProduct'],
                $item['image'],
                $item['price'],
                $item['oldPrice'],
                $item['idCategory'],
                $item['idStyle']
            );
        }
        return $list;
    }

    // Hàm đếm tổng số bài viết
public static function countAllSale()
{
    $db = DB::getInstance();
    $sql = "SELECT COUNT(*) FROM product";
    $req = $db->query($sql);
    $count = $req->fetchColumn();
    return $count;
}
    
}
?>