<?php
session_start();
require_once('controllers/base_controller.php');
require_once('models/login.php');

class RegisterController extends BaseController
{
  private $data;

function __construct() {

    $this->folder = 'pages';
}

public function register() {

    // Load view
    $this->render('register', $this->data, null);
}

public function registerAccountUser()
{   
// Xử lý khi người dùng nhấn nút Đăng ký
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = $_POST['phoneNumber'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    if(login::checkExistAccount($phone)){
    $status = "existAccount";
    exit(json_encode($status));
    }
    
    //Tiến hành đăng ký người dùng
    $result = login::registerUser($phone, $name, $password);
    
    if ($result) {
        // Nếu đăng ký thành công, chuyển hướng đến trang đăng nhập
        $status = "success";
        exit(json_encode($status));
    } else {
    $status = "failed";
    exit(json_encode($status));
    }
}
}
    
public function error()
{
    $this->render('error', null , null);
}

}

