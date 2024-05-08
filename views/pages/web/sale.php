    <link rel="stylesheet"  href="./assets/css/header.css">
    <link rel="stylesheet"  href="./assets/css/sale.css">
    <link rel="stylesheet"  href="./assets/css/footer.css">
    <link rel="stylesheet"  href="./assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

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
                <a href="<?php echo ($currentPage > 1) ? 'http://localhost:8008/PHP/index.php?controller=sale&action=sale&page=' . ($currentPage - 1) : '#'; ?>">&laquo;</a>
                <?php for ($i = 1; $i <= $totalPage; $i++): ?>
                    <a href="http://localhost:8008/PHP/index.php?controller=sale&action=sale&page=<?php echo $i; ?>" <?php if ($i == $currentPage) echo 'class="active"'; ?>><?php echo $i; ?></a>
                <?php endfor; ?>
                <a href="<?php echo ($currentPage < $totalPage) ? 'http://localhost:8008/PHP/index.php?controller=sale&action=sale&page=' . ($currentPage + 1) : '#'; ?>">&raquo;</a>
            </div>


        </div>

        <script src="./assets/JavaScript/header.js"></script>

    <script>
    var href = location.href.split("PHP/");
        var pages = href[1];
        var url_1=pages.split("&page=")
        var url_2=url_1[0];
    $(document).ready(function(){
    
    // Xử lý khi người dùng click vào nút phân trang
    $('.pagination a').on('click', function(event){
        // alert("hh");
        event.preventDefault();
        
        var page = $(this).attr('id');
        
        loadSale(page);
        var href = location.href.split("PHP/");
        var pages = href[1];
        var url_1=pages.split("page=")
        var url_2=url_1[0];
        console.log(url_2);

    });
    
    // Hàm gửi yêu cầu AJAX và cập nhật dữ liệu
        var href = location.href.split("page=");
        var url_1 = href[0];
    function loadSale(page){
        var href = location.href.split("page=");
        var page = href[1];
        var href = location.href.split("page=");
        var url_1 = href[0];
        var href = location.href.split("PHP/");
        var pages = href[1];
        var url_1=pages.split("&page=")
        var url_2=url_1[0];
        $.ajax({
            // url: url_1 + page,
            url: url_2+"&page="+page,
            method: 'GET',
            data: {page: page
                
            }, 
            success: function(data){
                // console.log(data);
                
                $("#content_1").html(data);
                // console.log(url);
                
                history.pushState({page: page}, "Page " + page, url_2+"&page=" + page);
                
                // Nạp lại các tệp CSS và JavaScript sau khi yêu cầu AJAX hoàn tất
            loadCSS('sale.css');
            loadJS('header.js');
        },
        error: function() {
            alert('Đã xảy ra lỗi khi tải danh sách sản phẩm.');
        }
            
        });
    }
});

    // Hàm để nạp các tệp CSS
    function loadCSS(filename) {
        var link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = filename;
        document.head.appendChild(link);
    }

    // Hàm để nạp các tệp JavaScript
    function loadJS(filename) {
        var script = document.createElement('script');
        script.src = filename;
        document.head.appendChild(script);
    }

    $(document).ready(function(){
        $("#login_form").submit(function(event){
            event.preventDefault();
            var username = $('#phone_number').val();
            var password = $('#passwd').val();
            $.ajax({
        type: 'POST',
        url: 'http://localhost:8008/PHP/index.php?controller=login&action=login', // Đường dẫn tới file xử lý đăng nhập
        data: {username: username, password: password},
        success: function(response) {
            if (response === 'success') {
                
                console.log(response);
            $('#message').html('Login successful');
            // Redirect or do something after successful login
        } else {
            console.log(response);
            $('#message').html('Invalid username or password');
        }
        }
    });
        });
    });

</script>