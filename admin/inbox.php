<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../classes/cart.php");
include_once($filepath . "/../helpers/format.php");
?>

<?php
$cart = new cart();
if (isset($_GET['shiftid'])) {
	$id = $_GET['shiftid'];
	$time = $_GET['time'];
	$price = $_GET['price'];
	$shifted = $cart->shifted($id, $time, $price);
}
if (isset($_GET['delid'])) {
	$id = $_GET['delid'];
	$time = $_GET['time'];
	$price = $_GET['price'];
	$del_shifted = $cart->del_shifted($id, $time, $price);
}
?>

<div class="grid_10">
	<div class="box round first grid">
		<h2>Inbox</h2>
		<div class="block">
			<?php
			if (isset($shifted)) {
				echo $shifted;
			}
			if (isset($del_shifted)) {
				echo $del_shifted;
			}
			?>
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>No.</th>
						<th>Ngày đặt</th>
						<th>Sản phẩm</th>
						<th>Số lượng</th>
						<th>Giá</th>
						<th>Mã khách hàng</th>
						<th>Khách hàng</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$cart = new cart();
					$fm = new Format();
					$get_inbox_cart = $cart->get_inbox_cart();
					if ($get_inbox_cart) {
						$i = 0;
						while ($result = $get_inbox_cart->fetch_assoc()) {
							$i++;

					?>
							<tr class="odd gradeX">
								<td><?php echo $i ?></td>
								<td><?php echo $fm->formatDate($result['date_order'])  ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><?php echo $result['quantity'] ?></td>
								<td><?php echo $result['price'] . ' ' . 'VND' ?></td>
								<td><?php echo $result['customer_Id'] ?></td>
								<td><a href="customer.php?customerid=<?php echo $result['customer_Id'] ?>">Xem khách hàng</a></td>
								<td>
									<?php
									if ($result['trangthai'] == 0) {
									?>
										<a href="inbox.php?shiftid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?> &time=<?php echo $result['date_order'] ?>">Chờ xác nhận</a>
										
									<?php
									} elseif($result['trangthai'] == 1) {
									?>
									<?php
										echo 'Đang vận chuyển'
										?>
									<?php
									}else if($result['trangthai']==2){
										?>
										<a href="inbox.php?delid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Xóa</a>
										<?php
									}

									?>

								</td>
							</tr>
					<?php
						}
					}
					?>

				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		setupLeftMenu();

		$('.datatable').dataTable();
		setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php'; ?>