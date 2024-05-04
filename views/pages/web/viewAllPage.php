
	<div id="content">
	<div id="div_slider_sale"></div>
		<hr id="line_sale">

		<div id="div_sale">
			<h1 id="title_sale">#SINGED</h1>
		</div>

		<div id="list_product_sale">
			<?php foreach ($viewAllProduct['viewAllProduct'] as $item): ?>
				<div class="product">
					<a href="http://localhost:8008/PHP/index.php?controller=product&action=product&idProduct=<?php echo $item->getIdProduct(); ?>&idStyle=<?php echo $item->getIdStyle();?>">
						<div class="img_product" style="background-image: url(./assets/product/<?php echo $item->getImage(); ?>" alt="<?php echo $item->getNameProduct(); ?>)"> </div>
					</a>
					<div class="infor_product">
						<a class="name_product"><?php echo $item->getNameProduct(); ?></a>
						<div class="div_price">
							<a class="price"><?php echo $item->getPrice(); ?></a> 
							<a class="old_price"><?php echo $item->getOldPrice(); ?></a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
					
	<?php if (isset($currentPage)): ?>
		<div class="pagination">
			<a href="<?php echo ($currentPage > 1) ? 'http://localhost:8008/PHP/index.php?controller=pages&action='. $action .'&page=' . ($currentPage - 1) : '#'; ?>">&laquo;</a>
			<?php for ($i = 1; $i <= $totalPage; $i++): ?>
				<a href="http://localhost:8008/PHP/index.php?controller=pages&action=<?php echo $action?>&page=<?php echo $i; ?>" <?php if ($i == $currentPage) echo 'class="active"'; ?>><?php echo $i; ?></a>
			<?php endfor; ?>
			<a href="<?php echo ($currentPage < $totalPage) ? 'http://localhost:8008/PHP/index.php?controller=pages&action=&'. $action. 'page=' . ($currentPage + 1) : '#'; ?>">&raquo;</a>
		</div>
	<?php endif; ?>

	</div>

