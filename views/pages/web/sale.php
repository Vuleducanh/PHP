<body>
        <div id="content">
            <div id="div_slider_sale"></div>
            <div id="logo_slider_sale"></div>
            
            <hr id="line_sale">

            <div id="div_sale">
                <h1 id="title_sale">#SINGEDsale</h1>
                <h2 id="sub_sale">Sale up to 50% </h2>
            </div>

            <div id="list_product_sale">
                <?php foreach ($dataSale['sale'] as $product): ?>
                <div class="product">
                        <a href="">
                                <div class="img_product" style="background-image: url(./assets/product/<?php echo $product->getImage(); ?>" alt="<?php echo $product->getNameProduct(); ?>)"> </div>
                        </a>
                    <div class="infor_product">
                        <a class="name_product"><?php echo $product->getNameProduct(); ?></a>
                        <div class="div_price">
                            <a class="price"><?php echo number_format($product->getPrice()); ?>đ</a>
                            <a class="old_price"><?php echo number_format($product->getOldPrice()); ?>đ</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>  
            <button id="btn_seeall1">Xem tất cả</button>

            <div id="pagination">
                <?php for ($i = 1; $i <= $totalPageSale; $i++): ?>
                    <a id="not-click" href="http://localhost:8008/PHP/index.php?controller=sale&action=sale&page=<?php echo $i; ?>" <?php if ($i == $currentPage) echo 'class="active"'; ?>><?php echo $i; ?></a>
                <?php endfor; ?>
            </div>
        </div>


    </body>