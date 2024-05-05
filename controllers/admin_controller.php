<?php
session_start();
require_once('controllers/base_controller.php');
require_once('models/product.php');
require_once('models/style.php');
require_once('models/category.php');
require_once('models/bill.php');
require_once('models/role.php');
require_once('models/billDetail.php');
require_once('models/login.php');

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
          './assets/css/edit.css',
          './assets/css/bill.css',
          './assets/css/billDetail.css',
          './assets/css/sweetalert2.min.css',
          './assets/icon/themify-icons/themify-icons.css',
          'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css',
          'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css'
      ),
      'js_files' => array(
          './assets/JavaScript/sweetalert2.min.js',
          'https://code.jquery.com/jquery-3.6.0.min.js',   
      ));
  }
  
  public function admin()
  {   
    if (!isset($_SESSION['user_id']) && $_SESSION['role']->getIdRole() == 2) {
        header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
      exit; 
    }

    $product = product::getAllProduct();
    $dataAllProduct = array('product' => $product);
    
    $layout = 'admin'; // Đặt layout là 'admin'
    $this->data = array_merge($this->data, array('dataAllProduct'=>$dataAllProduct));
    $this->render('admin', $this->data,$layout); 
  }

  public function update()
  {   
    if (!isset($_SESSION['user_id']) && $_SESSION['role']->getIdRole() == 2) {
        header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
      exit; 
    }

    $idProduct = isset($_GET['idProduct']) ? $_GET['idProduct'] : null;
    $idCategory = isset($_GET['idCategory']) ? $_GET['idCategory'] : null;

    $category = category::getCategory();
    $dataCategory = array('category' => $category);

    $style = style::getStyleProduct(); 
    $dataStyle = array('style' => $style);

    $product = product::findByIdProduct($idProduct);

    $this->data = array_merge($this->data, array('dataCategory' => $dataCategory,'dataStyle' => $dataStyle,'product'=>$product,'idProduct' => $idProduct));
    $layout = 'admin';
    $this->render('edit', $this->data , $layout); 
  }

public function add()
{   
    if (!isset($_SESSION['user_id']) && $_SESSION['role']->getIdRole() == 2) {
        header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
      exit; 
    }

    $category = category::getCategory();
    $dataCategory = array('category' => $category);

    $style = style::getStyleProduct(); 
    $dataStyle = array('style' => $style);

    $this->data = array_merge($this->data, array('dataCategory' => $dataCategory,'dataStyle' => $dataStyle));
    $layout = 'admin';
    $this->render('edit', $this->data , $layout); 
  } 

  public function addProduct()
  {  

    if(isset($_POST["post"])){

      $nameProduct = $_POST["nameProduct"];  
      $quantity = $_POST["quantity"];  
      $price = $_POST["price"];  
      $describe = $_POST["describe"];  
      $idStyle = $_POST["idStyle"];  
      $image = $_POST["image"];  
      $idCategory = $_POST["idCategory"];  

      $db = DB::getInstance();
      $sql = "INSERT INTO product (nameProduct, quantity, price, `describe`, idStyle, image, idCategory)
              VALUES ('$nameProduct','$quantity','$price','$describe','$idStyle','$image','$idCategory')";
      $db->query($sql);

      $response = true;
      exit(json_encode($response));
    }

  }

public function updateProduct()
{   
  if(isset($_POST["post"])){

    $nameProduct = $_POST["nameProduct"];  
    $quantity = $_POST["quantity"];  
    $price = $_POST["price"];  
    $describe = $_POST["describe"];  
    $idStyle = $_POST["idStyle"];  
    $image = $_POST["image"];  
    $idCategory = $_POST["idCategory"];  
    $idProduct = $_POST["idProduct"];
    
    $db = DB::getInstance();
    $sql = "UPDATE product SET 
                  nameProduct = '$nameProduct', 
                  quantity = '$quantity', 
                  price = '$price', 
                  `describe` = '$describe', 
                  idStyle = '$idStyle', 
                  image = '$image', 
                  idCategory = '$idCategory'
                  WHERE idProduct = $idProduct";
    $db->query($sql);
    
    $response = true;
    exit(json_encode($response));
  }
} 

public function deleteProduct()
{   
  if(isset($_POST["idProduct"])){

    $db = DB::getInstance();
    $listIdProduct = $_POST["idProduct"];

    foreach ($listIdProduct as $idProduct) {
      $sql = "DELETE FROM product WHERE idProduct = $idProduct" ;
      $db->query($sql);
    }

    $response = true;
    exit(json_encode($response));
    header("Location: http://localhost:8008/PHP/index.php?controller=admin&action=admin");
  }
} 

public function dashBoard()
{   
  if (!isset($_SESSION['user_id']) && $_SESSION['role']->getIdRole() == 2) {
      header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
    exit; 
  }

  $product = product::getAllProduct();
  $dataAllProduct = array('product' => $product);
  
  $layout = 'admin'; // Đặt layout là 'admin'
  $this->data = array_merge($this->data, array('dataAllProduct'=>$dataAllProduct));
  $this->render('admin', $this->data,$layout); 
}

public function billAdminPage()
{   
  if (!isset($_SESSION['user_id']) && $_SESSION['role']->getIdRole() == 2) {
      header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
    exit; 
  }

  $bill = bill::getAllBill();
  $dataBill = array('dataBill' => $bill);
  
  $layout = 'admin'; // Đặt layout là 'admin'
  $this->data = array_merge($this->data, array('dataBill'=>$dataBill));
  $this->render('bill', $this->data,$layout); 
}

public function billDetailAdminPage()
{   
  if (!isset($_SESSION['user_id']) && $_SESSION['role']->getIdRole() == 2) {
      header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
    exit; 
  }

  $idBill = isset($_GET['idBill']) ? $_GET['idBill'] : null;
  $billDetail = billDetail::getBillDetail($idBill);
  $dataBillDetail = array('dataBillDetail' => $billDetail);
  
  $layout = 'admin'; // Đặt layout là 'admin'
  $this->data = array_merge($this->data, array('dataBillDetail'=>$dataBillDetail));
  $this->render('billDetail', $this->data,$layout); 
}

public function confirmBill()
{   
  if (!isset($_SESSION['user_id']) && $_SESSION['role']->getIdRole() == 2) {
      header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
    exit; 
  }

  $idBill = isset($_GET['idBill']) ? $_GET['idBill'] : null;
  bill::confirmBill($idBill);
  header("Location: http://localhost:8008/PHP/index.php?controller=admin&action=billAdminPage");
  exit;
}

public function cancelBill()
{   
  if (!isset($_SESSION['user_id']) && $_SESSION['role']->getIdRole() == 2) {
      header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
    exit; 
  }

  $idBill = isset($_GET['idBill']) ? $_GET['idBill'] : null;
  bill::cancelBill($idBill);
  header("Location: http://localhost:8008/PHP/index.php?controller=admin&action=billAdminPage");
  exit;
}

public function user()
{   
  if (!isset($_SESSION['user_id']) && $_SESSION['role']->getIdRole() == 2) {
      header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
    exit; 
  }
  $user = login::getFullUser();
  $dataUser = array('dataUser' => $user);

  $this->data = array_merge($this->data, array('dataUser'=>$dataUser));
  $layout = 'admin';
  $this->render('user', $this->data , $layout); 
}

public function updateRoleUser()
{   
  if (!isset($_SESSION['user_id']) && $_SESSION['role']->getIdRole() == 2) {
      header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
    exit; 
  }

  $idUser = $_GET['idUser'];  
  $role = $_GET['newRole'];
  role::updateRole($idUser,$role);
  header("Location: http://localhost:8008/PHP/index.php?controller=admin&action=user");
}

  public function error()
  {
    $this->render('error', null , null);
  }
}
