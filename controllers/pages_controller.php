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
        'dataBestSaleProduct' => $dataBestSaleProduct, // Thêm mảng $dataBestSaleProduct vào mảng $data
        'dataNewProduct' => $dataNewProduct,
        'dataStyle' => $dataStyle // Truyền danh sách tên style vào dữ liệu để sử dụng trong view
    );
     $this->render('home', $data,null);
  }


  public function viewAllNewProduct()
  {   

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

    $keysearch = isset($_GET['keysearch']) ? $_GET['keysearch'] : null;

    $product = product::search($keysearch);
    $viewAllProduct = array('viewAllProduct' => $product);

    $style = style::getStyleProduct(); // Lấy danh sách các style  
    $dataStyle = array('style' => $style);

    $data = array(
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
