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
    $idProduct = isset($_GET['idProduct']) ? $_GET['idProduct'] : null;
    $idStyle = isset($_GET['idStyle']) ? $_GET['idStyle'] : null;

    $detailProduct = product::getDetailProduct($idProduct); 

    $relatedProduct = product::getRelatedProduct($idStyle);
    $dataRelatedProduct = array('relatedProduct' => $relatedProduct);

    $style = style::getStyleProduct(); // Lấy danh sách các style  
    $dataStyle = array('style' => $style);
    
    // Truyền dữ liệu cho view
    $data = array(
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
