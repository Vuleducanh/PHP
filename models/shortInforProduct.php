<?php
class shortInforProduct {
    private $idProduct;
    private $nameProduct;
    private $image;
    private $price;
    private $oldPrice;
    private $idCategory;
    private $idStyle;

    public function __construct($idProduct, $nameProduct, $image, $price, $oldPrice, $idCategory, $idStyle) {
        $this->idProduct = $idProduct;
        $this->nameProduct = $nameProduct;
        $this->image = $image;
        $this->price = $price;
        $this->oldPrice = $oldPrice;
        $this->idCategory = $idCategory;
        $this->idStyle = $idStyle;
    }

    public function getIdProduct() {
        return $this->idProduct;
    }

    public function setIdProduct($idProduct) {
        $this->idProduct = $idProduct;
    }

    public function getNameProduct() {
        return $this->nameProduct;
    }

    public function setNameProduct($nameProduct) {
        $this->nameProduct = $nameProduct;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getOldPrice() {
        return $this->oldPrice;
    }

    public function setOldPrice($oldPrice) {
        $this->oldPrice = $oldPrice;
    }

    public function getCategory() {
        return $this->idCategory;
    }

    public function setCategory($idCategory) {
        $this->idCategory = $idCategory;
    }

    public function getIdStyle() {
        return $this->idStyle;
    }

    public function setIdStyle($idStyle) {
        $this->idStyle = $idStyle;
    }

    public static function getBestSaleProduct($limit, $offset)
    {
        $list = [];
        $db = DB::getInstance();
        $sql = "SELECT idProduct, nameProduct, price, oldPrice, idStyle, idCategory, image
                FROM Product
                ORDER BY purchases DESC  LIMIT $limit OFFSET $offset" ;
        $req = $db->query($sql);
    
        foreach ($req->fetchAll() as $item) {
            $list[] = new shortInforProduct(
                $item['idProduct'],
                $item['nameProduct'],
                $item['image'],
                $item['price'],
                $item['oldPrice'],
                $item['idCategory'], // Tên cột của Category cần phải trùng với tên cột trong cơ sở dữ liệu
                $item['idStyle']
            );
        }
        return $list;
    }

    public static function getNewProduct($limit, $offset)
    {
        $list = [];
        $db = DB::getInstance();
        $sql = "SELECT idProduct, nameProduct, price, oldPrice, idStyle, idCategory, image, `CreatedDate`
        FROM Product
        ORDER BY `CreatedDate` DESC  LIMIT $limit OFFSET $offset";
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
    public static function countAll()
    {
        $db = DB::getInstance();
        $sql = "SELECT COUNT(*) FROM product";
        $req = $db->query($sql);
        $count = $req->fetchColumn();
        return $count;
    }
    
    
}
?>
