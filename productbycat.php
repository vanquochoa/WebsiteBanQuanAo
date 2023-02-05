<?php
include "./include/header.php";
// include "./include/slider.php";
?>
<?php
if (isset($_GET['catid']) || $_GET['catid'] != NULL) {
	$id = $_GET['catid'];
}
// if($_SERVER['REQUEST_METHOD']=='POST'){
// 	$catName=$_POST['catName'];
// 	$updateCat=$cat->update_category($catName,$id);
// }

?>

<div class="main">
	<div class="content">
		<div class="content_top">
			<?php
			$name_cat = $cat->get_name_cat($id);
			if ($name_cat) {
				while ($result_name = $name_cat->fetch_assoc()) {
			?>
					<div class="heading">
						<h3>Danh Mục: <?php echo $result_name['catName'] ?></h3>
					</div>

			<?php
				}
			}
			?>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$productbycat = $cat->get_product_by_cat($id);
			if ($productbycat) {
				while ($result = $productbycat->fetch_assoc()) {
			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="detail-3.php"><img src="admin/uploads/<?php echo $result['hinhanh'] ?>" alt="" /></a>
						<h2><?php echo $result['productName'] ?> </h2>
						<p><?php echo $fm->textShorten($result['product_desc'], 30)  ?> </p>
						<p><span class="price"><?php echo $result['price'] . ' ' . 'VND' ?> </span></p>
						<div class="button"><span><a href="detail.php?proid=<?php echo $result['productId'] ?>" class="details">Details</a></span></div>
					</div>
			<?php
				}
			} else {
				echo 'Danh mục chưa có sản phẩm'."<a href='index.php'> Quay lại trang chủ <a/>";
			}
			?>


		</div>



	</div>
</div>
<?php
include "./include/footer.php";

?>