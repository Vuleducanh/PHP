<?php
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
}
?>
