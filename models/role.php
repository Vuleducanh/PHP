<?php

class role {
    private $idRole;
    private $codeRole;
    private $nameRole;

    public function __construct($idRole, $codeRole, $nameRole) {
        $this->idRole = $idRole;
        $this->codeRole = $codeRole;
        $this->nameRole = $nameRole;
    }

    public function getIdRole() {
        return $this->idRole;
    }

    public function setIdRole($idRole) {
        $this->idRole = $idRole;
    }

    public function getCodeRole() {
        return $this->codeRole;
    }

    public function setCodeRole($codeRole) {
        $this->codeRole = $codeRole;
    }

    public function getNameRole() {
        return $this->nameRole;
    }

    public function setNameRole($nameRole) {
        $this->nameRole = $nameRole;
    }

    public static function addRoleForUser($idUser)
    {
        $db = DB::getInstance();
        
        // Thực hiện câu truy vấn để thêm vai trò cho người dùng
        $sql = "INSERT INTO user_role (idUser, idRole) VALUES (?, ?)";
        $stmt = $db->prepare($sql);
        
        // Gán idRole = 1 cho người dùng mới đăng ký
        $idRole = 2;
        
        $stmt->execute([$idUser, $idRole]);
        return true;
    }
}

?>
