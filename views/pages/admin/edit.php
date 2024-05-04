<div id="content">
        <h1 class="title_edit">Thông tin sản phẩm</h1>

        <form role="form" id="formSubmit" action="" method="post">
            <label for="name_edit">Tên sản phẩm:</label>
            <input id="name_edit" name="nameProduct" value="<?php  if(!empty($product)) echo $product->getNameProduct(); ?>" /><br>

            <label for="quanty_edit">Số lượng:</label>
            <input id="quanty_edit" type="number" name="quantity" value="<?php if(!empty($product)) echo $product->getQuantity(); ?>" /><br>
            
            <div class="div_img_edit">
                <input id="image" type="hidden" value="<?php if(!empty($product)) echo $product->getImage(); ?>"/>
                <label for="image">Ảnh: <?php if(!empty($product)) echo $product->getImage(); ?> </label>
                <div class="img_edit">
                    <input type="file"  name="image" onchange="displayFileName(this)" />
                </div>
            </div><br>

            <label for="price_edit">Giá:</label>
            <input id="price_edit" name="price" type="number" value="<?php if(!empty($product)) echo $product->getPrice(); ?>"  /><br>

            <label for="describe_edit">Mô tả:</label><br>   
            <textarea id="describe_edit" name="describe" rows="4" cols="50" ><?php if(!empty($product)) echo $product->getDescribe(); ?></textarea><br>

            <input type="hidden" id="idStyle" value="<?php if(!empty($product)) echo $product->getIdStyle(); ?>"/>
            <label for="style_edit" >Phong cách: 
                <?php 
                    if(!empty($product)) {
                        if($product->getIdStyle() == 1 ) 
                            echo "Tối giản";
                        elseif ($product->getIdStyle() == 2 ) 
                            echo "Công sở";
                        elseif ($product->getIdStyle() == 3 ) 
                            echo "Thể thao";
                        elseif ($product->getIdStyle() == 4 ) 
                            echo "Đường phố";
                        else echo "Du mục";
                    }
                ?>
            </label>
            <select id="style_edit" name="idStyle">
                <option value="0">-- Chọn phong cách --</option>
                <?php foreach ($dataStyle['style'] as $item): ?>
                    <option value="<?php echo $item->getIdStyle(); ?>"><?php echo $item->getNameStyle(); ?></option>
                <?php endforeach; ?>
            </select><br>  
            
            <input type="hidden" id="idCategory" value="<?php if(!empty($product)) echo $product->getIdCategory(); ?>"/>
            <label for="category_edit" >Loại: 
                <?php
                    if(!empty($product)){
                        if($product->getIdCategory() == 1 ) 
                            echo "Áo";
                        elseif ($product->getIdStyle() == 2 ) 
                            echo "Quần";
                        else echo "Phụ kiện";
                    }
                ?>
            </label>
            <select id="category_edit" name="category">
                <option value="0">-- Chọn loại --</option>
                <?php foreach ($dataCategory['category'] as $item): ?>
                    <option value="<?php echo $item->getIdCategory(); ?>"><?php echo $item->getNameCategory(); ?></option>
                <?php endforeach; ?>
            </select><br>  
        
            <br><br>
            <input type="hidden" name="idProduct" id="newIdProduct" value="<?php if(!empty($product)) echo $product->getIdProduct(); ?>"/>

            <?php if (!empty($idProduct)): ?>
                <button type="submit" value="submit" id="btnUpdateProduct"><i>Cập nhật sản phẩm</i></button>
            <?php else: ?>
                <button type="submit" value="submit" id="btnAddProduct"><i>Thêm sản phẩm</i></button>
            <?php endif; ?>
        </form>
</div>

      
      <script>
        if (typeof jQuery == 'undefined') {
        	console.log("jQuery is not loaded!");
    	} else {
        	console.log("jQuery is loaded!");
    	}

        var fileName;

        function displayFileName(input) {
            fileName = input.files[0].name;
        }
			
        $('#btnAddProduct').click(function (e) {

        var nameProduct = $("#name_edit").val();
        var quantity = $("#quanty_edit").val();
        var image = fileName ;
        var price = $("#price_edit").val();
        var describe = $("#describe_edit").val();
        var idCategory = $("#category_edit").val();
        var idStyle = $("#style_edit").val();

        if (nameProduct == "" || quantity == "" || image == "" || price =="" ||  describe == "" || idCategory == "") {
            alert("Vui lòng nhập đầy đủ thông tin sản phẩm!");
            return false;
        }else 
            $.ajax({
                    url: 'http://localhost:8008/PHP/index.php?controller=admin&action=addProduct',
                    data: {
                        post : 'true' ,
                        nameProduct: nameProduct,
                        quantity: quantity,
                        image: image,
                        price: price,
                        describe: describe,
                        idCategory: idCategory,
                        idStyle: idStyle
                    },
                    type: 'POST',
                    success: function (result) {
                        if ( result)
                            alert("Thêm sản phẩm thành công!");
                    },
                    error: function (error) {
                        alert("Thất bại");
                    }
                });

        });

        $('#btnUpdateProduct').click(function (e) {
            var nameProduct = $("#name_edit").val();
            var quantity = $("#quanty_edit").val();
            var image = fileName ;
            var price = $("#price_edit").val();
            var describe = $("#describe_edit").val();
            var idCategory = $("#category_edit").val();
            var idStyle = $("#style_edit").val();
            var idProduct = $("#newIdProduct").val();
            
            if(image == null)
                 image = $("#image").val();
            if(idCategory == 0)
                idCategory = $("#idCategory").val();
            if(idStyle == 0 )
                idStyle = $("#idStyle").val();

            //alert(nameProduct + " / " + quantity + " / " + image + " / " + price + " / " + describe + " / " + idCategory + " / " + idStyle + " / " + idProduct);

            if (nameProduct == "" || quantity == "" || price =="" ||  describe == "" ) {
                alert("Vui lòng nhập đầy đủ thông tin sản phẩm!");
                return false;
            }else 
                $.ajax({
                    url: 'http://localhost:8008/PHP/index.php?controller=admin&action=updateProduct',
                    data: {
                        post: 'true',
                        idProduct: idProduct,
                        nameProduct: nameProduct,
                        quantity: quantity,
                        image: image,
                        price: price,
                        describe: describe,
                        idCategory: idCategory,
                        idStyle: idStyle
                    },
                    type: 'POST',
                    success: function (result) {
                        if ( result)
                            alert("Cập nhật sản phẩm thành công!");
                    },
                    error: function (error) {
                        alert("Thất bại");
                    }
                });
		});

      </script>