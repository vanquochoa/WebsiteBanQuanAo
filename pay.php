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
    .wrapper_method {
        text-align: center;
    }
    .wrapper_method a{
        padding: 10px;
    }
    .wrapper_method button {
       text-align: center;
       width: 200px;
       margin-top: 20px;
       border: 1px solid #666;
       padding: 10px;
       background: red;
       color:white;
    }
    .wrapper_method button:hover{
        color: white;
        background-color: blue;
    }

    
</style>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="content_top">
                <div class="heading">
                    <h3>Thanh Toán</h3>
                </div>

                <div class="clear"></div>
                <div class="wrapper_method">
                    <h3 class="payment">Chọn Phương Thức Thanh Toán</h3>
                    <a class="payment_href" href="offlinepayments.php"><button>Thanh Toán Khi Nhận Hàng</button></a><br>
                    <a class="payment_href" href="onlinepayment.php"><button>Thanh Toán Trực Tuyến</button></a> <br><br><br>
                    <a style="background:grey ;" href="cart.php"> << Quay lại</a>
                </div>


            </div>




        </div>
    </div>
</div>
<?php
include "./include/footer.php";
?>