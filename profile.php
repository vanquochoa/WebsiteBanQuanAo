<?php
include "./include/header.php";
// include "./include/slider.php";
?>


<?php
$login_check = Session::get('customer_login');
if ($login_check == false) {
    header('Location:login.php');
}

?>


<?php
// if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
// 	echo "<script>window.location=404.php</script>";
// } else {
// 	$id = $_GET['proid'];
// }

// if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
// 	$quantity=$_POST['quantity'];
// 	$addtoCart=$cart->add_to_cart($quantity, $id);
// }
?>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="content_top">
                <div class="heading">
                    <h3>Tài Khoản Của Bạn</h3>
                </div>
                <div class="clear"></div>
            </div>


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
<?php
include "./include/footer.php";
?>