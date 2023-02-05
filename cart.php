<?php
include "./include/header.php";
// include "./include/slider.php";
?>

<?php
	if (isset($_GET['cartid'])) {
		$cartId = $_GET['cartid'];
		$delcart=$cart->del_product_cart($cartId);
	}

	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
		$cartId=$_POST['cartId'];
		$quantity=$_POST['quantity'];
		$update_quantity_Cart=$cart->update_quantity_Cart($quantity, $cartId);
		if($quantity==0){
			$delcart=$cart->del_product_cart($cartId);
		}
	}
?>


<?php
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;cart.php?id=live'>";
	}
?>
<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
				<h2>Giỏ Hàng</h2>
				<?php if(isset($update_quantity_Cart)){
					echo $update_quantity_Cart;
				} ?>
				<?php if(isset($delcart)){
					echo $delcart;
				} ?>
				<table class="tblone">
					<tr>
						<th width="20%">Tên sản phẩm</th>
						<th width="10%">Hình ảnh</th>
						<th width="15%">Giá</th>
						<th width="25%">Số lượng</th>
						<th width="20%">Thành tiền</th>
						<th width="10%">Xóa</th>
					</tr>
					<?php
					$get_product_cart = $cart->get_product_cart();
					if ($get_product_cart) {
						$subtotal = 0;
						$qty=0;
						while ($result = $get_product_cart->fetch_assoc()) {

					?>
							<tr>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['hinhanh'] ?>" alt="" /></td>
								<td><?php echo $result['price'].' '.'VND' ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" min="0" value="<?php echo $result['cartId'] ?>" />
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity'] ?>" />
										<input type="submit" name="submit" value="Cập nhật" />
									</form>
								</td>
								<td>
									<?php $total = $result['price'] * $result['quantity'];
									echo $fm->format_currently($total). ' ' . 'VND';
									?>
								</td>
								<td><a href="?cartid=<?php echo $result['cartId'] ?>">X</a></td>
							</tr>
					<?php
							$subtotal = $subtotal + $total;
							$qty=$qty+ $result['quantity'];
						}
					}
					?>

				</table>


				<?php
					if($check_cart){	
				?>
				<table style="float:right;text-align:left;" width="40%">
					<tr>
						<th>Tổng tiền : </th>
						<td>
							<?php
							
							 echo $fm->format_currently($subtotal). ' ' . 'VND'; 
							 Session::set('qty',$qty); 
							 Session::set('sum',$subtotal); 
							 ?></td>
					</tr>
					
	
				</table>

				<?php
				}else{
					echo 'Giỏ hàng trống'.'->'.'<a href="index.php">Shoping Now</a>';
				}
				 ?>
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="index.php"> <img src="images/shop.png" alt="" /></a>
				</div>
				<div class="shopright">
					<a href="pay.php"> <img src="images/check.png" alt="" /></a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>

<?php
include "./include/footer.php";

?>