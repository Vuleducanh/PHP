<?php
require_once('models/shortInforProduct.php');
class style {
    private $idStyle;
    private $nameStyle;
    
    public function __construct($idStyle, $nameStyle) {
        $this->idStyle = $idStyle;
        $this->nameStyle = $nameStyle;
    }
    
    public function getIdStyle() {
        return $this->idStyle;
    }
    
    public function setIdStyle($idStyle) {
        $this->idStyle = $idStyle;
    }
    
    public function getNameStyle() {
        return $this->nameStyle;
    }
    
    public function setNameStyle($nameStyle) {
        $this->nameStyle = $nameStyle;
    }

    public static function getStyleProduct() {
        $list = [];
        $db = DB::getInstance();
        $sql = "SELECT idStyle, nameStyle FROM style";
        $req = $db->query($sql);
    
        foreach ($req->fetchAll() as $item) {
            $list[] = new style($item['idStyle'], $item['nameStyle']);
        }
    
        return $list;
    } 

    public static function getProductStyleAndPaginated($idStyle,$limit, $offset){
        $list = [];
        $db = DB::getInstance();
        $sql = "SELECT idProduct, nameProduct, image, price, oldPrice, idStyle, idCategory, `describe` FROM Product WHERE idStyle = $idStyle
        limit $limit OFFSET $offset";
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

    public static function countProductStyle($idStyle)
{
    $db = DB::getInstance();
    $sql = "SELECT COUNT(*) FROM product WHERE idStyle =$idStyle ";
    $req = $db->query($sql);
    $count = $req->fetchColumn();
    return $count;
}
}
?>
