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
        // Lấy ID sản phẩm và ID style từ biến $_GET, nếu không tồn tại thì gán giá trị mặc định là null
        $idProduct = $_GET['idProduct'] ?? null;
        $idStyle = $_GET['idStyle'] ?? null;

        // Lấy chi tiết sản phẩm và các sản phẩm liên quan từ model
        $detailProduct = product::getDetailProduct($idProduct); 
        $relatedProduct = product::getRelatedProduct($idStyle);
        
        // Lấy danh sách các style từ model
        $style = style::getStyleProduct(); 

        // Truyền dữ liệu cho view
        $data = array(
            'detailProduct' => $detailProduct,
            'relatedProduct' => $relatedProduct,
            'style' => $style
        );

        // Render view
        $this->render('product', $data, null); // Thay đổi tên view nếu cần
    }

    public function error()
    {
        // Truyền dữ liệu cho view (trong trường hợp này là null)
        $data = null;

        // Render view
        $this->render('error', $data, null);
    }
}
