<?php
session_start();
require_once('controllers/base_controller.php');
require_once('models/login.php');

class RegisterController extends BaseController
{
  private $data;

function __construct() {

    $this->folder = 'pages';
    
    // Khởi tạo biến $data
    $this->data = array(
        'css_files' => array(
            './assets/css/header.css',
            './assets/css/footer.css',
            './assets/css/register.css',
            './assets/icon/themify-icons/themify-icons.css',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css'
        ),
        'js_files' => array(
            './assets/JavaScript/header.js',
        )
    );
}

public function register() {

    // Load view
    $this->render('register', $this->data, null);
}

public function registerAccountUser()
{   
    // Xử lý khi người dùng nhấn nút Đăng ký
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = $_POST['phone_number'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['re_passwd'];

    // echo "Password: " . $password . "<br>";
   
    //Kiểm tra xác nhận mật khẩu
    if ($password != $confirm_password) { 
        // Nếu xác nhận mật khẩu không trùng khớp, hiển thị thông báo lỗi và dừng lại
        header("Location: http://localhost:8008/PHP/index.php?controller=register&action=register&passwordMismatch=true");
        return;
    }
        
      //Tiến hành đăng ký người dùng
      $result = login::registerUser($phone, $name, $password);
        
      if ($result) {
          // Nếu đăng ký thành công, chuyển hướng đến trang đăng nhập
          header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
          exit;
      } else {
          // Nếu có lỗi xảy ra trong quá trình đăng ký, hiển thị thông báo lỗi
          header("Location: http://localhost:8008/PHP/index.php?controller=register&action=error");
          return;
      }
    }
}
    
public function error()
{
    $this->render('error', null , null);
}

}

