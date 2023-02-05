<?php
include "./include/header.php";
// include "./include/slider.php";
?>

<?php
if (isset($_GET['cartid'])) {
    $cartId = $_GET['cartid'];
    $delcart = $cart->del_product_cart($cartId);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $cartId = $_POST['cartId'];
    $quantity = $_POST['quantity'];
    $update_quantity_Cart = $cart->update_quantity_Cart($quantity, $cartId);
    if ($quantity == 0) {
        $delcart = $cart->del_product_cart($cartId);
    }
}
?>
<style>
    .box_left {
        width: 100%;
        border: 1px solid #666;
        padding: 4px;

        margin-left: 60px;

    }

    .shopright button {
        background-color: red;
        color: white;
        text-align: center;
        padding: 10px;
        cursor: pointer;
    }

    .shopright {
        text-align: center;
    }
</style>



<div class="main">
    <div class="content">

        <div class="section group">
            <div class="heading">
                <?php
                if (isset($_GET['congthanhtoan']) == 'vnpay') {


                ?>
                    <h2>Thanh Toán VNPAY</h2>
                <?php
                }
                ?>
                <div class="clear"></div>
                <div class="box_left">
                    <div class="cartpage">
                        <?php if (isset($update_quantity_Cart)) {
                            echo $update_quantity_Cart;
                        } ?>
                        <?php if (isset($delcart)) {
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
                                $qty = 0;
                                while ($result = $get_product_cart->fetch_assoc()) {

                            ?>
                                    <tr>
                                        <td><?php echo $result['productName'] ?></td>
                                        <td><img src="admin/uploads/<?php echo $result['hinhanh'] ?>" alt="" /></td>
                                        <td><?php echo $result['price'] . ' ' . 'VND' ?></td>
                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden" name="cartId" min="0" value="<?php echo $result['cartId'] ?>" />
                                                <input type="number" name="quantity" min="0" value="<?php echo $result['quantity'] ?>" />
                                                <input type="submit" name="submit" value="Cập nhật" />
                                            </form>
                                        </td>
                                        <td>
                                            <?php $total = $result['price'] * $result['quantity'];
                                            echo $total . ' ' . 'VND';
                                            ?>
                                        </td>
                                        <td><a href="?cartid=<?php echo $result['cartId'] ?>">X</a></td>
                                    </tr>
                            <?php
                                    $subtotal = $subtotal + $total;
                                    $qty = $qty + $result['quantity'];
                                }
                            }
                            ?>

                        </table>


                        <?php
                        if ($check_cart) {
                        ?>
                            <table style="float:right;text-align:left;" width="40%">
                                <tr>
                                    <th>Tổng tiền : </th>
                                    <td>
                                        <?php

                                        echo $subtotal . ' ' . 'VND';
                                        Session::set('qty', $qty);
                                        Session::set('sum', $subtotal);
                                        ?></td>
                                </tr>


                            </table>

                        <?php
                        } else {
                            echo 'Giỏ hàng trống' . '->' . '<a href="index.php">Shoping Now</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>


        <div class="clear"></div>
    </div>
    <div class="shopright">
        <?php
        if (isset($_GET['congthanhtoan']) == 'vnpay') {
        ?>
            <form action="congthanhtoan.php" method="post">
                <input type="hidden" name="tien_congthanhToan" value="<?php echo $subtotal ?>">
                <button class="payment_href" name="redirect" id="redirect">Thanh Toán VNPAY</button> <br><br>
                
            </form>
        <?php
        }
        ?>

    </div>
</div>


<?php
include "./include/footer.php";

?>