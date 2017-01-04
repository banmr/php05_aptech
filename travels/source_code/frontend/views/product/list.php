<div class="row product-list">
	<?php if (empty($products)) : ?>
	<h3 class="col-sm-12">Không có sản phẩm nào trong danh mục này.</h3>
	<?php endif; ?>
	<?php foreach($products as $product): ?>
	<div class="col-lg-4 col-sm-6">
		<div class="thumbnail">
			<a href="index.php?controller=product&amp;action=view&amp;pid=<?php echo $product['id']; ?>">
				<img src="webroot/upload/product/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>"/>
			</a>
			<div class="caption text-center">
				<h4><a href="index.php?controller=product&amp;action=view&amp;pid=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a></h4>
				<p><?php echo number_format($product['price'],0,',','.'); ?> VNĐ</p>
				<p><a href="index.php?controller=cart&amp;action=add&amp;pid=<?php echo $product['id']; ?>" class="btn btn-primary" role="button">Đặt mua</a></p>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>

<div class="text-center">
	<?php echo $pagination; ?>
</div>
	