<?php
require_once('controllers/base_controller.php');

class PagesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }

  public function home()
  {
    $data = array(
      'css_files' => array(
          './assets/css/header.css',
          './assets/css/header.css',
          './assets/css/footer.css',
          './assets/css/content50.css',
          './assets/css/content100.css',
          './assets/icon/themify-icons/themify-icons.css',
          'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css'
          // Thêm các đường dẫn đến các file CSS cần import cho trang home
      ),
      'js_files' => array(
          './assets/JavaScript/home.js',
          // Thêm các đường dẫn đến các file JS cần import cho trang home
      )
  );
  $this->render('home', $data);
  }

  public function error()
  {
    $this->render('error');
  }
}
