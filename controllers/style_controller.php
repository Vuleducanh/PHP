<?php
session_start();
require_once('controllers/base_controller.php');
require_once('models/style.php');

class StyleController extends BaseController
{
    function __construct()
    {
      $this->folder = 'pages';
    }

    public function style() // Thay đổi tên hàm
    {
      if (!isset($_SESSION['user_id'])) {
        header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
        exit; // Kết thúc chương trình sau khi chuyển hướng
      }

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $idStyle = isset($_GET['idStyle']) ? $_GET['idStyle'] : 1;
        //$idStyle = 1 ; 
    
        
        $limit = 8; // Số bài viết hiển thị trên mỗi trang
        $offset = ($page - 1) * $limit;

        // Lấy danh sách bài viết từ model
        $allProductStyle = style::getProductStyleAndPaginated($idStyle,$limit, $offset); // Thay đổi tên phương thức
        $dataProductStyle = array('allProductStyle' => $allProductStyle);

        $style = style::getStyleProduct(); // Lấy danh sách các style  
        $dataStyle = array('style' => $style);

        // Tính toán số trang
        $totalPage = style::countProductStyle($idStyle); // Thay đổi tên phương thức
        $totalPage = ceil($totalPage / $limit);

        
        // Truyền dữ liệu cho view
        $data = array(
              'css_files' => array(
                './assets/css/header.css',
                './assets/css/style.css',
                './assets/css/footer.css',
                './assets/icon/themify-icons/themify-icons.css',
                'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css'
                // Thêm các đường dẫn đến các file CSS cần import cho trang home
            ),
            'js_files' => array(
                './assets/JavaScript/header.js'
                // Thêm các đường dẫn đến các file JS cần import cho trang home
            ),
            'dataProductStyle' => $dataProductStyle,
            'totalPage' => $totalPage,
            'currentPage' => $page,
            'dataStyle' => $dataStyle 
        );

        // Render view
        $this->render('style', $data, null); // Thay đổi tên view
    }
  
    public function error()
    {
      $this->render('error', null , null);
    }
}

?>