<?php
include "./include/header.php";
include "./include/slider.php";
?>



<div class="main">
	
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Sản Phẩm Nổi Bật</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$product_feathread = $product->getproduct_feathread();
			if ($product_feathread) {
				while ($result = $product_feathread->fetch_assoc()) {


			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="detail.php?proid=<?php echo $result['productId'] ?>"><img src="admin/uploads/<?php echo $result['hinhanh'] ?>" height='150px' alt="" /></a>
						<h2><?php echo $result['productName'] ?></h2>
						<p><?php echo $fm->textShorten($result['product_desc'], 30)  ?></p>
						<p><span class="price"><?php echo $fm->format_currently($result['price']) . " " . "VND"; ?></span></p>
						<div class="button"><span><a href="detail.php?proid=<?php echo $result['productId'] ?>" class="details">Chi tiết</a></span></div>
					</div>
			<?php
				}
			}
			?>

		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Sản Phẩm Mới</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$product_new = $product->getproduct_new();
			if ($product_new) {
				while ($result_new = $product_new->fetch_assoc()) {


			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="detail.php?proid=<?php echo $result_new['productId'] ?>"><img src="admin/uploads/<?php echo $result_new['hinhanh'] ?>" height="150px" alt="" /></a>
						<h2><?php echo $result_new['productName'] ?></h2>
						<p><?php echo $fm->textShorten($result_new['product_desc'], 30)  ?></p>
						<p><span class="price"><?php echo $fm->format_currently($result_new['price']) . ' ' . 'VND'; ?></span></p>
						<div class="button"><span><a href="detail.php?proid=<?php echo $result_new['productId'] ?>" class="details">Chi tiết</a></span></div>
					</div>
			<?php
				}
			}
			?>

		</div>
	</div>
</div>

<?php
include "./include/footer.php"
?>