<?php

class category {
    private $idCategory;
    private $nameCategory;
    
    public function __construct($idCategory , $nameCategory) {
        $this->idCategory = $idCategory;
        $this->nameCategory = $nameCategory;
    }
    
    public function getIdCategory() {
        return $this->idCategory;
    }
    
    public function setIdCategory($idCategory) {
        $this->idCategory = $idCategory;
    }
    
    public function getNameCategory() {
        return $this->nameCategory;
    }
    
    public function setNameCategory($nameCategory) {
        $this->nameCategory = $nameCategory;
    }

    
    public static function getCategory() {
        $list = [];
        $db = DB::getInstance();
        $sql = "SELECT * FROM category";
        $req = $db->query($sql);
    
        foreach ($req->fetchAll() as $item) {
            $list[] = new category($item['idCategory'], $item['nameCategory']);
        }
        return $list;
    } 
}

?>
