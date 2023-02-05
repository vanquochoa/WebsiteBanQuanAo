<?php
include "./include/header.php";
// include "./include/slider.php";
?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

	$insertCustomer = $customer->insert_customer($_POST);
}
?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {

	$login_Customer = $customer->login_customer($_POST);
}
?>

<?php

$login_check = Session::get('customer_login');
if ($login_check) {
	header('Location:index.php');
}
?>
<style>
	.buttons input {
		padding: 7px;
	}

	.buttons {
		text-align: center;
	}

	.search input {
		padding: 7px;
	}
</style>

<div class="main">
	<div class="content">
		<div class="login_panel">
			<h3>Đăng nhập</h3>
			<?php
			if (isset($login_Customer)) {
				echo $login_Customer;
			}
			?>

			<form action="" method="post">
				<input type="text" name="email" class="field" placeholder="Nhập email">
				<input type="password" name="password" class="field" placeholder="Nhập password">

				<div class="buttons"><br>
					<div><input type="submit" name="login" class="grey" value="Đăng nhập"></div>
				</div><br><br><br>
			</form>
		</div>
		<?php

		?>
		<div class="register_account">
			<h3>Đăng Ký Tài Khoản</h3>
			<?php
			if (isset($insertCustomer)) {
				echo $insertCustomer;
			}
			?>
			<form action="" method="post">
				<table>
					<tbody>
						<tr>
							<td>
								<div>
									<input type="text" name="name" placeholder="Nhập tên">
								</div>

								<div>
									<input type="text" name="city" placeholder="Nhập địa chỉ">
								</div>

								<div>
									<input type="text" name="zipcode" placeholder="Nhập mã giảm giá">
								</div>
								<div>
									<input type="text" name="email" placeholder="Nhập email">
								</div>
							</td>
							<td>
								<div>
									<input type="text" name="address" placeholder="Nhập địa chỉ">
								</div>
								<div>
									<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
										<option value="null">Thành phố</option>
										<option value="HCM">Hồ Chí Minh</option>
										<option value="HaNoi">Hà Nội</option>
										<option value="BinhDinh">Bình Định</option>
										<option value="BacLieu">Bạc Liêu
										<option value="TienGiang">Tiền Giang</option>


									</select>
								</div>

								<div>
									<input type="text" name="phone" placeholder="Nhập số điện thoại">
								</div>

								<div>
									<input type="text" name="password" placeholder="Nhập mật khẩu">
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="search"><br>
					<div><input type="submit" name="submit" class="grey" value="Tạo tài khoản"></div>
				</div>

				<div class="clear"></div>
			</form>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php
include "./include/footer.php";

?>