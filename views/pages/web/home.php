<div id="content_50">
                <div id="background_slider">
                    <div id="slider"></div>
                    <h2 id="title_shop" class="title_content">Singed - Shop</h2>
                    <h3 id="slogan" class="title_content">IF YOU LIKE THAT</h3>
                    <div id="div_sub_slogan"> 
                        <div class="glowing-icon"><i class="fa-sharp fa-solid fa-user-astronaut" id="icon_clothes"></i></div>
                        <h4 class="title_content sub_slogan"> Đồng hành cùng phong cách của bạn</h4> 
                    </div>
                    <a href="#best_selling"><i class="fa-regular fa-circle-down icon_down"></i></a>
                    <div id="list_slider">
                        <div id="slider_child1"></div>
                        <div id="slider_child2"></div>
                        <div id="slider_child_mid"></div>
                        <div id="slider_child4"></div>
                        <div id="slider_child5"></div>
                    </div>
                </div>       
                
                <h1 id="best_selling">Top bán chạy</h1>

                <div id="list_product">
                    <?php for($i = 1; $i <= 4; $i++ ):
                        $product = $dataBestSaleProduct['bestSaleProduct'][$i] ?>
                        <div class="product">   
                            <a href="">
                                <div class="img_product" style="background-image: url(./assets/product/<?php echo $product->getImage(); ?>" alt="<?php echo $product->getNameProduct(); ?>)"> </div>
                            </a>
                            <div class="infor_product">
                                <!-- Tên sản phẩm -->
                                <a class="name_product"><?php echo $product->getNameProduct(); ?></a>
                                <div class="div_price">
                                    <!-- Giá sản phẩm -->
                                    <a class="price"><?php echo number_format($product->getPrice()); ?>đ</a>
                                    <!-- Giá cũ -->
                                    <a class="old_price"><?php echo number_format($product->getOldPrice()); ?>đ</a>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>

                <button id="btn_seeall">Xem tất cả</button>
            </div>
            
            <div id="banner">
                <div id="banner_left">  
                    <div class="banner_img1 banner_img"></div>
                    <div class="banner_img2 banner_img"></div>
                    <div class="banner_img3 banner_img"></div>
                    <div class="banner_img4 banner_img"></div>
                    <div class="banner_img5 banner_img"></div>
                </div>
                <div id="banner_right">
                    <div id="title_banner">
                        <h2 class="title_h2 h2_1">SALE</h2>
                        <h2 class="title_h2">UP TO</h2>
                    </div>
                    <div id="sale_imgbanner"></div>
                </div>
            </div>

            <hr id="line">

            <div id="content_100">
                <div id="div_new">
                    <h1 id="title_newproduct">Sản phẩm mới</h1>
                    <img id="icon_new" class="new" src="./assets/img/new.png">
                    <h2 id="sub_newproduct" class="new">New</h2>
                </div>

                <div id="list_product1">
                    <?php for($i = 1; $i <= 8; $i++ ):
                        $product = $dataNewProduct['newProduct'][$i] ?>
                    <div class="product1">
                        <a href="">
							<div class="img_product1" style="background-image: url(./assets/product/<?php echo $product->getImage(); ?>" alt="<?php echo $product->getNameProduct(); ?>)"> </div>
                        </a>
                        <div class="infor_product1">
                            <a class="name_product1"><?php echo $product->getNameProduct(); ?></a>
                            <div class="div_price">
                                <a class="price1"><?php echo number_format($product->getPrice()); ?>đ</a>
                                <a class="old_price1"><?php echo number_format($product->getOldPrice()); ?>đ</a>
                            </div>
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>

                <button id="btn_seeall1">Xem tất cả</button>
            </div>
