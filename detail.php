<?php
include "./include/header.php";
// include "./include/slider.php";

?>
<?php
if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
	echo "<script>window.location=404.php</script>";
} else {
	$id = $_GET['proid'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$quantity = $_POST['quantity'];
	$insertCart = $cart->add_to_cart($quantity, $id);
}



?>
<div class="main">
	<div class="content">
		<div class="section group">
			<?php
			$get_product_detail = $product->get_detail($id);
			if ($get_product_detail) {
				while ($result_detail = $get_product_detail->fetch_assoc()) {
			?>
					<div class="cont-desc span_1_of_2">
						<div class="grid images_3_of_2">
							<img src="admin/uploads/<?php echo $result_detail['hinhanh'] ?>" alt="" />
						</div>
						<div class="desc span_3_of_2">
							<h2><?php echo $result_detail['productName'] ?> </h2>
							<p><?php echo $fm->textShorten($result_detail['product_desc'], 30)  ?></p>
							<div class="price">
								<p>Giá: <span><?php echo $fm->format_currently($result_detail['price']) . ' ' . 'VND' ?></span></p>
								<p>Loại sản phẩm: <span><?php echo $result_detail['catName'] ?></span></p>
								<p>Thương hiệu:<span><?php echo $result_detail['brandName'] ?></span></p>
							</div>
							<div class="add-cart">
								<form action="" method="post">
									<input type="number" class="buyfield" name="quantity" value="1" min="1" />
									<input type="submit" class="buysubmit" name="submit" value="Mua" />
								</form>
							</div>

						</div>

						<div class="product-desc">
							<h2>Chi tiết sản phẩm</h2>
							<?php echo $fm->textShorten($result_detail['product_desc'], 200)  ?>
						</div>

					</div>
			<?php
				}
			}
			?>
			<div class="rightsidebar span_3_of_1">
				<h2>Danh Mục Sản Phẩm</h2>
				<ul>
					<?php
					$getall_category = $cat->show_category_fontend();
					if ($getall_category) {
						while ($result_allcat = $getall_category->fetch_assoc()) {


					?>
							<li><a href="productbycat.php?catid=<?php echo $result_allcat['catId'] ?>"><?php echo $result_allcat['catName']  ?></a></li>
					<?php
						}
					}
					?>

				</ul>

			</div>
		</div>
	</div>
</div>
<?php
include "./include/footer.php";
?>