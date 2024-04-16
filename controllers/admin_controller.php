<?php
session_start();
require_once('controllers/base_controller.php');

class AdminController extends BaseController
{
  private $data;

  function __construct()
  {
    $this->folder = 'pages';

    // Khởi tạo biến $data
    $this->data = array(
    'css_files' => array(
        './assets/css/admin.css',
        './assets/css/sweetalert2.min.css',
        './assets/icon/themify-icons/themify-icons.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css'
    ),
    'js_files' => array(
        './assets/JavaScript/admin.js',
        './assets/JavaScript/sweetalert2.min.js',
        'https://code.jquery.com/jquery-3.6.0.min.js'
    ));
  }
  
  public function admin()
  {   
    // if (!isset($_SESSION['user_id']) && $_SESSION['role']->getIdRole() != 1) {
    //     header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
    //   exit; // Kết thúc chương trình sau khi chuyển hướng
    // }

    $layout = 'admin'; // Đặt layout là 'admin'
    $this->render('admin', $this->data , $layout);
  }

  public function error()
  {
    $this->render('error', null , null);
  }

}
