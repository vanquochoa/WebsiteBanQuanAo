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
$id =Session::get('customer_id');

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
	
	$updateCustomer=$customer->update_customers($_POST, $id);
}
?>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="content_top">
                <div class="heading">
                    <h3>Sửa Thông Tin Tài Khoản</h3>
                </div>
                <div class="clear"></div>
            </div>
            <form action="" method="post">

                <table class="tblone">
                    <tr>
                        
                            <?php if(isset($updateCustomer)){
                                echo  ' <td colspan="2">'.$updateCustomer.'</td>';
                            } ?>
                       
                    </tr>
                    <?php
                    $id = Session::get('customer_id');
                    $get_customers = $customer->show_customers($id);
                    if ($get_customers) {
                        while ($result = $get_customers->fetch_assoc()) {
                    ?>

                            <tr>
                                <td>Tên</td>
                                <td><input type="text" name="ten" value="<?php echo $result['ten'] ?>" id=""></td>

                            </tr>
                            <!-- <tr>
                                <td>Thành phố</td>
                                <td><input type="text" name="city" value="<?php echo $result['city'] ?>" id=""></td>
                            </tr> -->
                            <tr>
                                <td>Số điện thoại</td>
                                <td><input type="text" name="phone" value="<?php echo $result['phone'] ?>" id=""></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td><input type="text" name="diachi" value="<?php echo $result['diachi'] ?>" id=""></td>
                            </tr>
                            <tr>
                                <td>ZipCode</td>
                                <td><input type="text" name="zipcode" value="<?php echo $result['zipcode'] ?>" id=""></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="email" value="<?php echo $result['email'] ?>" id=""></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="update" value="Cập nhật" class="grey" id="">
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>

                </table>
            </form>

        </div>
    </div>
</div>
<?php
include "./include/footer.php";
?>