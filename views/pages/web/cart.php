<link rel="stylesheet"  href="./assets/css/header.css">
<link rel="stylesheet"  href="./assets/css/cart.css">
<link rel="stylesheet"  href="./assets/css/footer.css">
<link rel="stylesheet"  href="./assets/icon/themify-icons/themify-icons.css">
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

<div id="content_cart">
        <?php $cart = unserialize($_SESSION['cart']);  
              $totalCart =  $cart['totalCart'];?>
            <?php if(isset($_GET['pay']) && $_GET['pay'] == true) 
                    echo '<h1 id="true"> .</h1>'
                ?>
                <div class="column_product">

                <ul>    
                <?php 
                if (!$cart['itemCart'] == []) {
                    // Giỏ hàng không rỗng
                    foreach ($cart['itemCart'] as $item) {
                        if ($item instanceof cart) { ?>
                        <li id="product_cart">
                            <img class="img_product_cart" style="background-image: url(./assets/product/<?php echo $item->getProduct()->getImage();?>);  width: 120px; height: 120px; background-size: cover; margin-left: 40px;">
                                <div class="infor_product_cart">
                                    <div class="vertical_column">
                                        <h3 class="name_product_cart"><?php echo $item->getProduct()->getNameProduct();?></h3>
                                        <div class="parallel">
                                            <h4 class="color_product_cart">Màu</h4>
                                            <div class="display_color_cart last"></div>
                                    </div>
                                    <div class="parallel">
                                        <h4 class="size_product_cart">Size</h4>
                                        <h4 class="last">XL</h4>
                                    </div>
                                    <div class="parallel">
                                        <h4 class="quantity_product_cart">Số lượng:</h4>
                                        <input class="last_input_quanty" id="quantity-cart-<?php echo $item->getProduct()->getIdProduct() ?>" type="number" min="1" max="1000" value="<?php echo $item->getQuantity();?>">
                                    </div>
                                </div>
                                <div id="function">
                                <a href="http://localhost:8008/PHP/index.php?controller=cart&action=deleteCart&idProduct=<?php echo $item->getProduct()->getIdProduct() ?>"><button class="delete_product_cart"> Xóa </button></a>
                                <button onclick="EditQuantityCart(this);" data-id="<?php echo $item->getProduct()->getIdProduct() ?>" class="edit_product_cart"> Sửa</button>
                                </div>
                                <div id="infor_price_product_cart">
                                    <h3 class="price_product_cart">Đơn giá : <?php echo $item->getProduct()->getPrice();?></h3>
                                    <h3 class="total_price_product_cart">Tổng giá : <?php echo $item->getTotalPrice();?></h3>
                                </div>
                                </div>
					    </li>
                        <?php } else echo "<h1>ItemCart rỗng</h1>";
                    }
                } else {
                    // Giỏ hàng rỗng
                    echo "<h1>Giỏ hàng của bạn trống!</h1>";
                }
            ?>
                    </ul>
                </div>
                <div class="column_funtion">
                    <h3 class="all_price_cart">Thành tiền : <?php echo $totalCart->getTotalPrice();?></h3>
                    <a href="http://localhost:8008/PHP/index.php?controller=pay&action=pay"><button class="btn_buy_cart">Mua</button></a>
                    <a href="http://localhost:8008/PHP/index.php?controller=cart&action=deleteAllCart"><button class="btn_delete_cart">Xóa tất cả</button></a>
                </div>
            </div>
    <script src="./assets/JavaScript/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">

        var h1Element = document.getElementById('true');
        if (h1Element) {
            // Hiển thị một cảnh báo thông báo
            alert("Mua hàng thành công");
        }

		function EditQuantityCart(button) {
			var id = $(button).data("id");
			var quanty = $("#quantity-cart-" + id).val();
			//alert(quanty);
			window.location = "http://localhost:8008/PHP/index.php?controller=cart&action=editCart&idProduct=" + id +"&quantity="+quanty;
		}
	</script>
