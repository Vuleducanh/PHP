<?php
session_start();
require_once('controllers/base_controller.php');
require_once('models/style.php');
require_once('models/cart.php');
require_once('models/bill.php');
require_once('models/billDetail.php');

class PayController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }
  
  public function pay(){   
    if (!isset($_SESSION['user_id'])) {
      header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
      exit; // Kết thúc chương trình sau khi chuyển hướng
  }

    $style = style::getStyleProduct(); // Lấy danh sách các style  
    $dataStyle = array('style' => $style);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $email = $_POST['email'];
      $timeOrder = date("Y-m-d");
      $status = "Pending confirmation";
      $cart = unserialize($_SESSION['cart']);

      $bill = new bill(0,$phone,$email,$cart['totalCart']->getQuantity(),$address,$timeOrder,$status,$cart['totalCart']->getTotalPrice(),$cart['itemCart']);
      bill::addBill($bill);

      $idNewBill = bill::getIdNewBill();
      foreach ($cart['itemCart'] as $item){
          $billDetail = new billDetail(0,$item->getQuantity(), $item->getTotalPrice(), $item->getProduct()->getIdProduct(), $item->getProduct()->getNameProduct(), $item->getProduct()->getIdCategory(), $idNewBill, $item->getProduct()->getImage());
          billDetail::addBillDetail($billDetail);
      }

      header("Location: http://localhost:8008/PHP/index.php?controller=cart&action=deleteAllCart&pay=true");
      exit();
    }

    $data = array(
        'dataStyle' => $dataStyle // Truyền danh sách tên style vào dữ liệu để sử dụng trong view
    );
     $this->render('pay', $data,null);
  }

  public function error()
  {
    $this->render('error', null , null);
  }

}
