<?php
require_once('controllers/base_controller.php');
require_once('models/sale.php');
require_once('models/style.php');

class saleController extends BaseController
{
    function __construct()
    {
      $this->folder = 'pages';
    }

    public function sale() // Thay đổi tên hàm
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 8; // Số bài viết hiển thị trên mỗi trang
        $offset = ($page - 1) * $limit;

        // Lấy danh sách bài viết từ model
        $sale = sale::getPaginatedSale($limit, $offset); // Thay đổi tên phương thức
        $dataSale = array('sale' => $sale);

        $style = style::getStyleProduct(); // Lấy danh sách các style  
        $dataStyle = array('style' => $style);

        // Tính toán số trang
        $totalSales = sale::countAllSale(); // Thay đổi tên phương thức
        $totalPageSale = ceil($totalSales / $limit);

        // Truyền dữ liệu cho view
        $data = array(
              'css_files' => array(
                './assets/css/header.css',
                './assets/css/csssale.css',
                './assets/css/footer.css',
                './assets/icon/themify-icons/themify-icons.css',
                'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css'
                // Thêm các đường dẫn đến các file CSS cần import cho trang home
            ),
            'js_files' => array(
                './assets/JavaScript/test.js'
                // Thêm các đường dẫn đến các file JS cần import cho trang home
            ),
            'dataSale' => $dataSale,
            'totalPageSale' => $totalPageSale,
            'currentPage' => $page,
            'dataStyle' => $dataStyle 
        );

        // Render view
        $this->render('sale', $data); // Thay đổi tên view
    }
  
    public function error()
    {
      $this->render('error');
    }
}

?>