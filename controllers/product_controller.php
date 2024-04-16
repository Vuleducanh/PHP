<?php
session_start();
require_once('controllers/base_controller.php');
require_once('models/product.php');
require_once('models/style.php');

class ProductController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }
  
  public function product()
  {
    if (!isset($_SESSION['user_id'])) {
      header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
      exit; // Kết thúc chương trình sau khi chuyển hướng
    }
  
    $idProduct = isset($_GET['idProduct']) ? $_GET['idProduct'] : null;
    $idStyle = isset($_GET['idStyle']) ? $_GET['idStyle'] : null;

    $detailProduct = product::getDetailProduct($idProduct); 

    $relatedProduct = product::getRelatedProduct($idStyle);
    $dataRelatedProduct = array('relatedProduct' => $relatedProduct);

    $style = style::getStyleProduct(); // Lấy danh sách các style  
    $dataStyle = array('style' => $style);
    
    // Truyền dữ liệu cho view
    $data = array(
          'css_files' => array(
            './assets/css/header.css',
            './assets/css/product.css',
            './assets/css/footer.css',
            './assets/icon/themify-icons/themify-icons.css',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css'
            // Thêm các đường dẫn đến các file CSS cần import cho trang home
        ),
        'js_files' => array(
            './assets/JavaScript/header.js',
            './assets/JavaScript/slideProduct.js'
            // Thêm các đường dẫn đến các file JS cần import cho trang home
        ),
        'detailProduct' => $detailProduct,
        'dataStyle' => $dataStyle ,
        'dataRelatedProduct' => $dataRelatedProduct
    );

    // Render view
    $this->render('product', $data, null); // Thay đổi tên view
  }

  public function error()
  {
    $this->render('error', null , null);
  }

}
