<?php
include "./include/header.php";
// include "./include/slider.php";

?>
<?php
$login_check = Session::get('customer_login');
if ($login_check == false) {
    header('Location:login.php');
}
$cart = new cart();
if (isset($_GET['confirmid'])) {
	$id = $_GET['confirmid'];
	$time = $_GET['time'];
	$price = $_GET['price'];
	$shifted_confirm = $cart->shifted_confirm($id, $time, $price);
}

?>
<style>
    .box_left {
        width: 100%;
        border: 1px solid #666;
        padding: 4px;

    }
</style>
<form action="" method="post">
    <div class="main">
        <div class="content">
            <div class="section group">
                <div class="heading">
                    <h2>Chi Tiết Đơn Đặt hàng</h2>
                </div>
                <div class="clear"></div>
                <div class="box_left">
                    <div class="cartpage">

                        <table class="tblone">
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">Tên sản phẩm</th>
                                <th width="10%">Hình ảnh</th>
                                <th width="15%">Giá</th>
                                <th width="10%">Số lượng</th>
                                <th width="10%">Ngày đặt</th>
                                <th width="10%">Trạng thái</th>
                                <th width="15%">Action</th>
                            </tr>
                            <?php
                            $customer_id = Session::get('customer_id');
                            $get_cart_ordered = $cart->get_cart_ordered($customer_id);
                            if ($get_cart_ordered) {
                                $i = 0;
                                $qty = 0;
                                while ($result = $get_cart_ordered->fetch_assoc()) {
                                    $i++;
                            ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result['productName'] ?></td>
                                        <td><img src="admin/uploads//<?php echo $result['hinhanh'] ?>" alt=""></td>
                                        <td>
                                            <?php echo $result['price'] . ' ' . 'VND' ?>
                                        </td>
                                        <td>
                                            <?php echo $result['quantity'] ?>
                                        </td>
                                        <td><?php echo $fm->formatDate($result['date_order']) ?></td>
                                        <td>
                                            <?php
                                            if ($result['trangthai'] == 0) {
                                                echo "Đang xử lý";
                                            } elseif($result['trangthai']==1) {
                                                ?>
                                                <span>Đã giao hàng</span>
                                                <?php
                                            }elseif($result['trangthai']==2){
                                                echo 'Đã nhận hàng';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                        <?php
                                            if ($result['trangthai'] == 0) {
                                                echo "Không xác định";
                                            } elseif($result['trangthai']==1) {
                                                ?>
                                                <a href="orderdetails.php?confirmid=<?php echo $customer_id ?>
                                                &price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>
                                                ">Đã nhận hàng</a>
                                                <?php
                                                }else{
                                                    ?>
                                                     <?php echo 'Đã nhận hàng'?>
                                                <?php
                                                }

                                                ?>
                                               
                                                <?php
                                            }
                                            ?>
                    

                                    </tr>

                            <?php
                                }
                            
                            ?>
                        </table>
                    </div>

                </div>
                <div class="shopping">
                    <div class="shopleft">
                        <a href="index.php"> <img src="images/shop.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
</form>
<?php
include "./include/footer.php";
?>