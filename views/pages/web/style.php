    <link rel="stylesheet"  href="./assets/css/header.css">
    <link rel="stylesheet"  href="./assets/css/style.css">
    <link rel="stylesheet"  href="./assets/css/footer.css">
    <link rel="stylesheet"  href="./assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

        <h1 id="title_style">Loại sản phẩm</h1>
        <h2 id="name_style">Áo thun</h2>

        <div id="content_50">

            <div id="list_product">
                <?php foreach ($dataProductStyle['allProductStyle'] as $product): ?>
                    <div class="product">
                        <a href="http://localhost:8008/PHP/index.php?controller=product&action=product&idProduct=<?php echo $product->getIdProduct(); ?>&idStyle=<?php echo $product->getIdStyle();?>">
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

        
            <div class="pagination">
                <a href="<?php echo ($currentPage > 1) ? 'http://localhost:8008/PHP/index.php?controller=style&action=style&page=' . ($currentPage - 1) : '#'; ?>">&laquo;</a>
                <?php for ($i = 1; $i <= $totalPage; $i++): ?>
                    <a href="http://localhost:8008/PHP/index.php?controller=style&action=style&page=<?php echo $i; ?>" <?php if ($i == $currentPage) echo 'class="active"'; ?>><?php echo $i; ?></a>
                <?php endfor; ?>
                <a href="<?php echo ($currentPage < $totalPage) ? 'http://localhost:8008/PHP/index.php?controller=style&action=style&page=' . ($currentPage + 1) : '#'; ?>">&raquo;</a>
            </div>
        </div>

        <script src="./assets/JavaScript/header.js"></script>
