<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../classes/customer.php");
include_once($filepath . "/../helpers/format.php");
?>

<?php
$customer = new customer();
if (isset($_GET['customerid']) || $_GET['customerid'] != NULL) {
    $id = $_GET['customerid'];
    
}

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa danh mục</h2>
                <div class="block copyblock">
                <?php
        $get_customer = $customer->show_customers($id);
        if ($get_customer) {
            while ($result = $get_customer->fetch_assoc()) {
        ?>
                    <form action="" method="post">
                        <table class="form">
                            <tr>
                                <td>Name</td>
                                <td>
                                    <input type="text" readonly="readonly" value="<?php echo $result['ten'] ?>" name="catName" class="medium" />
                                </td>

                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td>
                                    <input type="text" readonly="readonly" value="<?php echo $result['phone'] ?>" name="catName" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td>
                                    <input type="text" readonly="readonly" value="<?php echo $result['diachi'] ?>" name="catName" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>Thành phố</td>
                                <td>
                                    <input type="text" readonly="readonly" value="<?php echo $result['country'] ?>" name="catName" class="medium" />
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Zip Code</td>
                                <td>
                                    <input type="text" readonly="readonly" value="<?php echo $result['zipcode'] ?>" name="catName" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <input type="text" readonly="readonly" value="<?php echo $result['email'] ?>" name="catName" class="medium" />
                                </td>
                            </tr>
                            
                        </table>
                    </form>

            <?php
            }
        }
            ?>
                </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>