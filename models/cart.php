<?php
require_once('models/product.php');
class cart {

    private $quantity;
    private $totalPrice;
    private $product;

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function getTotalPrice() {
        return $this->totalPrice;
    }

    public function setTotalPrice($totalPrice) {
        $this->totalPrice = $totalPrice;
    }

    public function getProduct() {
        return $this->product;
    }

    public function setProduct($product) {
        $this->product = $product;
    }

    public static function AddCart($id, $cart, $quantity) {
        $itemCart = new cart();
        $product = product::getDetailProduct($id);
    
        if ($product != null && isset($cart['itemCart'][$id])) {
            // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật thông tin của nó
            $itemCart = $cart['itemCart'][$id];
            $itemCart->setQuantity($itemCart->getQuantity() + $quantity); // Cập nhật số lượng với giá trị mới
            $itemCart->setTotalPrice($itemCart->getQuantity() * $product->getPrice());
            $cart['itemCart'][$id] = $itemCart;
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm vào
            $itemCart->setProduct($product);
            $itemCart->setQuantity($quantity); // Số lượng được truyền vào từ tham số
            $itemCart->setTotalPrice($quantity * $product->getPrice()); // Tính tổng giá tiền
            $cart['itemCart'][$id] = $itemCart;
        }
    
        return $cart;
    }
    

    public static function EditCart($id, $quantity, $cart) {
        if ($cart == null) {
            return $cart;
        }
        $itemCart = new cart();
        if (isset($cart['itemCart'][$id])) {
            $itemCart = $cart['itemCart'][$id];
            $itemCart->setQuantity($quantity);
            $totalPrice = $quantity * $itemCart->getProduct()->getPrice();
            $itemCart->setTotalPrice($totalPrice);
        }
        $cart['itemCart'][$id] = $itemCart;
        return $cart;
    }

    public static function deleteCart($id, $cart) {
        if ($cart == null) {
            return $cart;
        }
        if (isset($cart['itemCart'][$id])) {
            unset($cart['itemCart'][$id]); // Xóa món hàng với $id đã cho khỏi giỏ hàng
        }
        return $cart;
    }

    public static function DeleteAllCart($cart) {
        $cart = [];
        return $cart;
    }

    public static function getTotalQuantyCart($cart) {
        $totalQuantity = 0;
        foreach ($cart['itemCart'] as $itemCart) {
            $totalQuantity += $itemCart->getQuantity();
        }
        return $totalQuantity;
    }

    public static function getTotalPriceCart($cart) {
        if (count($cart['itemCart']) == 1) {
            $onlyKey = current($cart['itemCart']);
            return $onlyKey->getTotalPrice();
        }
        
        $totalPrice = 0;
        foreach ($cart['itemCart'] as $itemCart) {
            $totalPrice += $itemCart->getTotalPrice(); 
        }
        return $totalPrice;
    }
}
?>
