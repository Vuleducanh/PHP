<?php
require_once('models/role.php');
class Login {
    private $phone;
    private $password;
    private $idUser;
    private $name;
    private $role;

    public function __construct($phone, $password, $idUser, $name ,  $role) {
        $this->phone = $phone;
        $this->password = $password;
        $this->idUser = $idUser;
        $this->role = $role;
        $this->name = $name;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public static function getAccountUser($phone)
    {
        $db = DB::getInstance();
        $sql = "SELECT users.phone, users.password, users.idUser, users.fullName, role.*
                FROM users
                JOIN user_role ON users.idUser = user_role.idUser
                JOIN role ON user_role.idRole = role.idRole
                WHERE users.phone = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$phone]);
        $item = $stmt->fetch();
    
        if ($item) {
            return new Login(
                $item['phone'],
                $item['password'],
                $item['idUser'],
                $item['fullName'],
                new Role($item['idRole'], $item['codeRole'], $item['nameRole']) // Tạo đối tượng Role mới
            );
        } else {
            return null;
        }
    }

    public static function registerUser( $phone, $name, $password ){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash mật khẩu
        
        $db = DB::getInstance();
        
        // Thực hiện câu truy vấn để thêm người dùng vào CSDL
        $sql = "INSERT INTO users (phone, fullName, password) VALUES (?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$phone, $name, $hashed_password]);
        
        // Lấy idUser mới được tạo
        $idUser = $db->lastInsertId();
        
        // Gán vai trò cho người dùng
        $result =  role::addRoleForUser($idUser);
        if($result) return true;
        else return false;
    }

}
?>