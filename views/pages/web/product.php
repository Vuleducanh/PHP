    <link rel="stylesheet"  href="./assets/css/header.css">
    <link rel="stylesheet"  href="./assets/css/product.css">
    <link rel="stylesheet"  href="./assets/css/footer.css">
    <link rel="stylesheet"  href="./assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

            <div id="content_product">
                <div id="div_detail_product">
                    <div id="div_detail_product_left">
                        <div id="img_detail_product" style="background-image: url(./assets/product/<?php echo $detailProduct->getImage(); ?>"></div>
                        <div id="list_img_detail_product">
                            <div class="img_detail_product_child1" style="background-image: url(./assets/product/<?php echo $detailProduct->getImage(); ?>"></div>
                            <div class="img_detail_product_child2" style="background-image: url(./assets/product/<?php echo $detailProduct->getImage(); ?>"></div>
                        </div>
                    </div>
                    <div id="div_detail_product_right">
                        <h1 id="name_product"><?php echo $detailProduct->getNameProduct(); ?></h1>
                        <div id="price_id">
                            <h3 id="price_product">Giá : <?php echo $detailProduct->getPrice(); ?></h3>
                            <hr id="line">
                            <h4 id="id_product">Mã : <?php echo $detailProduct->getIdProduct(); ?> </h4>
                        </div>
                        <h3 id="describe"> Mô tả </h3>
                        <p id="describe_content"><?php echo $detailProduct->getDescribe(); ?></p>
                        <h3 id="title_size">Size</h3>
                        <ul id="list_size">
                            <li class="size active" data-size="S"><a>S</a></li>
                            <li class="size" data-size="M"><a>M</a></li>
                            <li class="size" data-size="L"><a>L</a></li>
                            <li class="size" data-size="XL"><a>XL</a></li>
                            <li class="size" data-size="XXL"><a>XXL</a></li>
                        </ul>
                        
                        <div class="color-picker">
                            <a id="color">Màu</a>
                            <div class="color circle"></div>
                            <div class="list_color">
                              <div class="color1 circle"></div>
                              <div class="color2 circle"></div>
                              <div class="color3 circle"></div>
                              <div class="color4 circle"></div>
                              <div class="color5 circle"></div>
                              <div class="color6 circle"></div>
                              <div class="color7 circle"></div>
                            </div>
                        </div>
                        <div id="quantity_product">
                            <h3 id="quantity">Số lượng :1</h3> 
                            <button class="up_quantity"><i class="fa-solid fa-chevron-up"></i></button>
                            <button class="down_quantity"><i class="fa-solid fa-chevron-down"></i></button>
                        </div>
                        <div id="btn">
                            <a href="http://localhost:8008/PHP/index.php?controller=cart&action=addCart&idProduct=<?php echo $detailProduct->getIdProduct();?>&idStyle=<?php echo $detailProduct->getIdStyle()?>"><button id="btn_add_cart">Thêm vào giỏ <i class="fa-solid fa-cart-shopping"></i></button></a>
                            <button id="btn_buy">Mua ngay</button>
                        </div>
                    </div>
                </div>
   
                <h1 id="related_product">Sản phẩm liên quan</h1>
                
                <div class="product-list-container"> 
                <button class="prev-button"><i class="fa-solid fa-angles-left"></i></button>

                <ul id="list_product">
                    <?php $index = 0; ?>
                    <?php foreach ($dataRelatedProduct['relatedProduct'] as $product): ?>
                        <?php if ($index < 10): ?>
                            <li class="product">
                            <a href="http://localhost:8008/PHP/index.php?controller=product&action=product&idProduct=<?php echo $product->getIdProduct(); ?>&idStyle=<?php echo $product->getIdStyle();?>">
                                    <div class="img_product" style="background-image: url(./assets/product/<?php echo $product->getImage(); ?>"></div>
                            </a>
                                    <div class="infor_product">
                                        <a class="name_product"><?php echo $product->getNameProduct(); ?></a>
                                        <div class="div_price">
                                            <a class="price"><?php echo $product->getPrice(); ?></a>
                                            <a class="old_price"><?php echo $product->getOldPrice(); ?></a>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php $index++; ?>
                    <?php endforeach; ?>
                </ul>
       

                <button class="next-button"><i class="fa-solid fa-angles-right"></i></button>
               </div>

            </div>

            <script src="./assets/JavaScript/header.js"></script>
            <script src="./assets/JavaScript/slideProduct.js"></script>
            <script>
                <?php
                    // Hiển thị thông báo nếu có
                    if (isset($_GET['message'])) {
                        echo 'alert("Thêm thành công");';
                    } 
                ?>
            </script>
