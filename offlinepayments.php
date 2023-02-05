<?php
include "./include/header.php";
// include "./include/slider.php";

?>
<?php
	if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
		$customer_id=Session::get('customer_id');
		$insertOrder=$cart->insertOrder($customer_id);
		$delcart=$cart->del_all_data_cart();
	} 

?>
<style>
    .box_left{
        width: 48%;
        border: 1px solid #666;
        float: left;
        padding: 4px;

    }
    .box_right{
        width: 48%;
        border: 1px solid #666;
        float: right;
        padding: 4px;
    }
	a.a_order{
		background: red;
		padding: 7px 20px;
		color: #fff;
		font-size: 20px;
	}
	
</style>
<form action="" method="post">
<div class="main">
	<div class="content">
		<div class="section group">
            <div class="heading">
                <h3>Thanh Toán Khi Nhận Hàng</h3>
            </div>
            <div class="clear"></div>
            <div class="box_left">
            <div class="cartpage">
				<?php if(isset($update_quantity_Cart)){
					echo $update_quantity_Cart;
				} ?>
				<?php if(isset($delcart)){
					echo $delcart;
				} ?>
				<table class="tblone">
					<tr>
                        <th width="5%">ID</th>
						<th width="15%">Tên sản phẩm</th>
						<th width="30%">Giá</th>
						<th width="25%">Số lượng</th>
						<th width="30%">Thành tiền</th>
						
					</tr>
					<?php
					$get_product_cart = $cart->get_product_cart();
					if ($get_product_cart) {
						$subtotal = 0;
						$qty=0;
                        $i=0;
						while ($result = $get_product_cart->fetch_assoc()) {
                            $i++;

					?>
							<tr>
                                <td><?php echo $i;?></td>
								<td><?php echo $result['productName'] ?></td>
								
								<td><?php echo $result['price'].' '.'VND' ?></td>
								<td>
									<?php echo $result['quantity'] ?>
																		
								</td>
								<td>
									<?php $total = $result['price'] * $result['quantity'];
									echo $total . ' ' . 'VND';
									?>
								</td>
								
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
							
							 echo $subtotal . ' ' . 'VND'; 
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
            </div>
            <div class="box_right">
			<table class="tblone">
                <?php
                $id = Session::get('customer_id');
                $get_customers = $customer->show_customers($id);
                if ($get_customers) {
                    while ($result = $get_customers->fetch_assoc()) {
                ?>

                        <tr>
                            <td>Tên</td>
                            
                            <td><?php echo $result['ten'] ?></td>
                        </tr>
                        <tr>
                            <td>Thành phố</td>
                            
                            <td><?php echo $result['city'] ?></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            
                            <td><?php echo $result['phone'] ?></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            
                            <td><?php echo $result['diachi'] ?></td>
                        </tr>
                        <tr>
                            <td>ZipCode</td>
                            
                            <td><?php echo $result['zipcode'] ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            
                            <td><?php echo $result['email'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="editprofile.php">Chỉnh Sửa Thông Tin Cá Nhân</a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>

            </table>
			</div>

        </div>
		
	</div>
	<center class="center"><a href="?orderid=order" class="a_order">Đặt hàng</a></center><br>
</div>
</form>
<?php
include "./include/footer.php";
?>