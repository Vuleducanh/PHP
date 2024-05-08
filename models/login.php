<?php
require_once('models/role.php');
class Login {
    private $phone;
    private $password;
    private $idUser;
    private $name;
    private $role;
    private $gender;
    private $age;
    private $address;
    private $email;

    public function __construct($phone, $password, $idUser, $name , $gender, $age, $address , $email, $role) {
        $this->phone = $phone;
        $this->password = $password;
        $this->idUser = $idUser;
        $this->role = $role;
        $this->name = $name;
        $this->gender = $gender;
        $this->age = $age;
        $this->email = $email;
        $this->address = $address;
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

     public function getGender() {
        return $this->gender;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }
    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

public static function getAccountUser($phone) {
    $db = DB::getInstance();
    $sql = "SELECT users.phone, users.password, users.idUser, users.fullName, users.gender, users.age, users.address,users.email ,role.*
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
            $item['gender'], // Thêm gender vào đây
            $item['age'], // Thêm age vào đây
            $item['address'], // Thêm address vào đây
            $item['email'], // Thêm address vào đây
            new role($item['idRole'], $item['codeRole'], $item['nameRole']) // Tạo đối tượng Role mới
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

    public static function checkExistAccount($phone){
        $db = DB::getInstance();
        $sql = "SELECT COUNT(*) AS count FROM users WHERE phone = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$phone]);
        $result = $stmt->fetch();
    
        // Nếu số lượng bằng 0, tức là số điện thoại chưa tồn tại
        if ($result['count'] == 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function getFullUser() {
        $db = DB::getInstance();
        $sql = "SELECT users.phone, users.password, users.idUser, users.fullName, users.gender, users.age, users.address,users.email ,role.*
                FROM users
                JOIN user_role ON users.idUser = user_role.idUser
                JOIN role ON user_role.idRole = role.idRole";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $items = $stmt->fetchAll(); // Sử dụng fetchAll để lấy tất cả các kết quả
    
        $users = []; // Mảng để lưu trữ các đối tượng User
    
        // Lặp qua các kết quả và tạo đối tượng User cho mỗi dòng
        foreach ($items as $item) {
            $users[] = new Login(
                $item['phone'],
                $item['password'],
                $item['idUser'],
                $item['fullName'],
                $item['gender'],
                $item['age'],
                $item['address'],
                $item['email'],
                new role($item['idRole'], $item['codeRole'], $item['nameRole'])
            );
        }
    
        return $users; // Trả về mảng chứa các đối tượng User
    }


}
?>