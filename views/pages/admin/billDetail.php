<link rel="stylesheet"  href="./assets/css/admin.css">
<link rel="stylesheet"  href="./assets/css/billDetail.css">
<link rel="stylesheet"  href="./assets/css/sweetalert2.min.css">
<link rel="stylesheet"  href="./assets/icon/themify-icons/themify-icons.css">
<link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

<div id="content">
    <h1 id="text-billDetail"> Danh sách các sản phẩm </h1>
    <div id="div-table">
        <?php foreach ($dataBillDetail['dataBillDetail'] as $billDetail): ?>
            <div class="product">
                <img src="./assets/product/<?php echo $billDetail->getImage(); ?>" style="width: 100px; height: 100px;">
                <div class="product-info">
                    <h3>Tên sản phẩm : <?php echo $billDetail->getNameProduct();?></h3>
                    <h3>Tổng giá : <?php echo $billDetail->getTotalPrice();?></h3>
                    <h3>Số lượng : <?php echo $billDetail->getQuanty();?> </h3>
                </div>
            </div> 
        <?php endforeach; ?>        
    </div>
</div>

<script src="./assets/JavaScript/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>