<?php
include "./include/header.php";
// include "./include/slider.php";

?>
<?php
// if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
// 	$customer_id=Session::get('customer_id');
// 	$insertOrder=$cart->insertOrder($customer_id);
// 	$delcart=$cart->del_all_data_cart();
// 	header('Location:success.php');
// } 

?>
<style>
	h2.success_order {
		text-align: center;
		color: red;
	}

	p.success_note {
		text-align: center;
		padding: 8px;
		font-size: 17px;
	}
</style>
<form action="" method="post">
	<div class="main">
		<div class="content">
			<div class="section group">
				<h2 class="success_order">Đặt Hàng Thành Công</h2>
				<?php
				$customer_id = Session::get('customer_id');
				$get_amount = $cart->getAmountPrice($customer_id);
				if ($get_amount) {
					$amount = 0;
					while ($result = $get_amount->fetch_assoc()) {
						$price=$result['price'];
						$amount=$amount+$price;
					}
				}
				?>
				<p class="success_note">Tổng tiền bạn cần thanh toán: <?php echo $amount.' '.'VND' ?></p>
				<p class="success_note">Xem chi tiết đơn hàng của bạn <a href="orderdetails.php">Tại đây</a> </p>
			</div>
		</div>
</form>
<?php
include "./include/footer.php";
?>