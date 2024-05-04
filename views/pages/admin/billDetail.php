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