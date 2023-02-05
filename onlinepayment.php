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
<style>
    h3.payment {
        text-align: center;
        font-size: 20px;

        font-weight: bold;
        text-decoration: underline;
    }

    .wrapper_method {
        width: 650px;
        margin: 0 auto;
        border: 1px solid #666;
        padding: 20px;
        background: cornsilk;
    }

    .wrapper_method a {

        padding: 10px;
        
    }

    .wrapper_method {
        text-align: center;
    }

    .wrapper_method button {
        text-align: center;
        width: 200px;
        margin-top: 20px;
        border: 1px solid #666;
        padding: 10px;
        background: red;
        color: white;
    }

    .wrapper_method button:hover {
        color: white;
        background-color: blue;
    }
</style>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="content_top">
                <div class="heading">
                    <h3>Thanh Toán Online</h3>
                </div>
                <div class="clear"></div>
                <div class="wrapper_method">
                    <h3 class="payment">Chọn Cổng Thanh Toán Online</h3>
                    <form action="donhangonline.php?congthanhtoan=vnpay" method="post">
                        <button class="payment_href" name="redirect" id="redirect">Thanh Toán VNPAY</button> <br><br><br><br>
                        <a style="background:grey ;" href="pay.php">
                        << Quay lại</a>
                    </form>
                    


                    
                </div>
                


            </div>




        </div>
    </div>
</div>
<?php
include "./include/footer.php";
?>