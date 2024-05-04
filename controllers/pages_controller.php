<?php
session_start();
require_once('controllers/base_controller.php');
require_once('models/shortInforProduct.php');
require_once('models/style.php');
require_once('models/product.php');
require_once('models/cart.php');

class PagesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }
  
  public function home()
  {   
    if (!isset($_SESSION['user_id'])) {
      header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
      exit; // Kết thúc chương trình sau khi chuyển hướng
  }

  if (!isset($_SESSION['cart'])) {
    $createTotalCart = new cart();
    $createTotalCart->setTotalPrice(0);
    $createTotalCart->setQuantity(0);
    $createItemCart = array();

    $createCart = array(
        'totalCart' => $createTotalCart,
        'itemCart' =>  $createItemCart
    );

    $_SESSION['cart'] = serialize($createCart);
  }  

    $bestSaleProduct = shortInforProduct::getBestSaleProduct(4,0);
    $dataBestSaleProduct = array('bestSaleProduct' => $bestSaleProduct);

    $newProduct = shortInforProduct::getNewProduct(8,0);
    $dataNewProduct = array('newProduct' => $newProduct);

    $style = style::getStyleProduct(); // Lấy danh sách các style  
    $dataStyle = array('style' => $style);

    $data = array(
        'css_files' => array(
            './assets/css/header.css',
            './assets/css/footer.css',
            './assets/css/content50.css',
            './assets/css/content100.css',
            './assets/icon/themify-icons/themify-icons.css',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css'
            // Thêm các đường dẫn đến các file CSS cần import cho trang home
        ),
        'js_files' => array(
            './assets/JavaScript/header.js',
            // Thêm các đường dẫn đến các file JS cần import cho trang home
        ),
        'dataBestSaleProduct' => $dataBestSaleProduct, // Thêm mảng $dataBestSaleProduct vào mảng $data
        'dataNewProduct' => $dataNewProduct,
        'dataStyle' => $dataStyle // Truyền danh sách tên style vào dữ liệu để sử dụng trong view
    );
     $this->render('home', $data,null);
  }


  public function viewAllNewProduct()
  {   
    if (!isset($_SESSION['user_id'])) {
      header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
      exit; // Kết thúc chương trình sau khi chuyển hướng
  }

    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 8; // Số bài viết hiển thị trên mỗi trang
    $offset = ($page - 1) * $limit;

    $newProduct = shortInforProduct::getNewProduct($limit,$offset);
    $viewAllProduct = array('viewAllProduct' => $newProduct);

    $totalPage = shortInforProduct::countAll(); // Thay đổi tên phương thức
    $totalPage = ceil($totalPage / $limit);

    $style = style::getStyleProduct(); // Lấy danh sách các style  
    $dataStyle = array('style' => $style);

    $data = array(
        'css_files' => array(
            './assets/css/header.css',
            './assets/css/sale.css',
            './assets/css/viewAll.css',
            './assets/css/footer.css',
            './assets/icon/themify-icons/themify-icons.css',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css'
            // Thêm các đường dẫn đến các file CSS cần import cho trang home
        ),
        'js_files' => array(
            './assets/JavaScript/header.js',
            // Thêm các đường dẫn đến các file JS cần import cho trang home
        ),
        'viewAllProduct' => $viewAllProduct,
        'totalPage' => $totalPage,
        'action' => 'viewAllNewProduct',
        'currentPage' => $page,
        'dataStyle' => $dataStyle // Truyền danh sách tên style vào dữ liệu để sử dụng trong view
    );
     $this->render('viewAllPage', $data,null);
  }

  public function viewAllBestSaleProduct()
  {   
    if (!isset($_SESSION['user_id'])) {
      header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
      exit; // Kết thúc chương trình sau khi chuyển hướng
  }

    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 8; // Số bài viết hiển thị trên mỗi trang
    $offset = ($page - 1) * $limit;

    $bestSaleProduct = shortInforProduct::getBestSaleProduct($limit,$offset);
    $viewAllProduct = array('viewAllProduct' => $bestSaleProduct);

    $totalPage = shortInforProduct::countAll(); // Thay đổi tên phương thức
    $totalPage = ceil($totalPage / $limit);

    $style = style::getStyleProduct(); // Lấy danh sách các style  
    $dataStyle = array('style' => $style);

    $data = array(
        'css_files' => array(
            './assets/css/header.css',
            './assets/css/sale.css',
            './assets/css/viewAll.css',
            './assets/css/footer.css',
            './assets/icon/themify-icons/themify-icons.css',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css'
            // Thêm các đường dẫn đến các file CSS cần import cho trang home
        ),
        'js_files' => array(
            './assets/JavaScript/header.js',
            // Thêm các đường dẫn đến các file JS cần import cho trang home
        ),
        'viewAllProduct' => $viewAllProduct,
        'totalPage' => $totalPage,
        'currentPage' => $page,
        'action' => 'viewAllBestSaleProduct',
        'dataStyle' => $dataStyle // Truyền danh sách tên style vào dữ liệu để sử dụng trong view
    );
     $this->render('viewAllPage', $data,null);
  }

  public function search()
  {   
    if (!isset($_SESSION['user_id'])) {
      header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
      exit; // Kết thúc chương trình sau khi chuyển hướng
  }

    $keysearch = isset($_GET['keysearch']) ? $_GET['keysearch'] : null;

    $product = product::search($keysearch);
    $viewAllProduct = array('viewAllProduct' => $product);

    $style = style::getStyleProduct(); // Lấy danh sách các style  
    $dataStyle = array('style' => $style);

    $data = array(
        'css_files' => array(
            './assets/css/header.css',
            './assets/css/sale.css',
            './assets/css/viewAll.css',
            './assets/css/footer.css',
            './assets/icon/themify-icons/themify-icons.css',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css'
            // Thêm các đường dẫn đến các file CSS cần import cho trang home
        ),
        'js_files' => array(
            './assets/JavaScript/header.js',
            // Thêm các đường dẫn đến các file JS cần import cho trang home
        ),
        'viewAllProduct' => $viewAllProduct,
        'dataStyle' => $dataStyle // Truyền danh sách tên style vào dữ liệu để sử dụng trong view
    );
     $this->render('viewAllPage', $data,null);
  }

  public function error()
  {
    $this->render('error', null , null);
  }

}
