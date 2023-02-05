<div class="header_bottom">
    <div class="header_bottom_left">
        <div class="section group">
            <?php
            $getLastestGucci = $product->getLastestGucci();
            if ($getLastestGucci) {
                while ($resultgucci = $getLastestGucci->fetch_assoc()) {
            ?>
                    <div class="listview_1_of_2 images_1_of_2">
                        <div class="listimg listimg_2_of_1">
                            <a href="detail.php?proid=<?php echo $resultgucci['productId'] ?>"> <img src="admin/uploads/<?php echo $resultgucci['hinhanh'] ?>" alt="" /></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h2>Gucci</h2>
                            <p><?php echo $resultgucci['productName'] ?></p>
                            <div class="button"><span><a href="detail.php?proid=<?php echo $resultgucci['productId'] ?>">Thêm giỏ hàng</a></span></div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

            <?php
            $getLastestMwc = $product->getLastestMwc();
            if ($getLastestMwc) {
                while ($resultmwc = $getLastestMwc->fetch_assoc()) {
            ?>
                    <div class="listview_1_of_2 images_1_of_2">
                        <div class="listimg listimg_2_of_1">
                            <a href="detail.php?proid=<?php echo $resultmwc['productId'] ?>"><img src="admin/uploads/<?php echo $resultmwc['hinhanh'] ?>" alt="" /></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h2>MWC</h2>
                            <p><?php echo $resultmwc['productName'] ?></p>
                            <div class="button"><span><a href="detail.php?proid=<?php echo $resultmwc['productId'] ?>">Thêm giỏ hàng</a></span></div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>


        <?php
        $getLastestAdidas = $product->getLastestAdidas();
        if ($getLastestAdidas) {
            while ($resultadidas = $getLastestAdidas->fetch_assoc()) {
        ?>
                <div class="section group">
                    <div class="listview_1_of_2 images_1_of_2">
                        <div class="listimg listimg_2_of_1">
                            <a href="detail.php?proid=<?php echo $resultadidas['productId'] ?>"> <img src="admin/uploads/<?php echo $resultadidas['hinhanh'] ?>" alt="" /></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h2>Adidas</h2>
                            <p><?php echo $resultadidas['productName'] ?></p>
                            <div class="button"><span><a href="detail.php?proid=<?php echo $resultadidas['productId'] ?>">Thêm giỏ hàng</a></span></div>
                        </div>
                    </div>


                    <?php
                    $getLastestDior = $product->getLastestDior();
                    if ($getLastestDior) {
                        while ($resultadior = $getLastestDior->fetch_assoc()) {
                    ?>
                            <div class="listview_1_of_2 images_1_of_2">
                                <div class="listimg listimg_2_of_1">
                                    <a href="detail.php?proid=<?php echo $resultadior['productId'] ?>"><img src="admin/uploads/<?php echo $resultadior['hinhanh'] ?>" alt="" /></a>
                                </div>
                                <div class="text list_2_of_1">
                                    <h2>Dior</h2>
                                    <p><?php echo $resultadior['productName'] ?></p>
                                    <div class="button"><span><a href="detail.php?proid=<?php echo $resultadior['productId'] ?>">Thêm giỏ hàng</a></span></div>
                                </div>
                            </div>
                    <?php
                        }
                    } ?>
                </div>
        <?php
            }
        }
        ?>
        <div class="clear"></div>
    </div>
    <div class="header_bottom_right_images">
        <!-- FlexSlider -->

        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li><img src="images/3.jpg" alt="" /></li>
                    <li><img src="images/4.jpg" alt="" /></li>
                </ul>
            </div>
        </section>
        <!-- FlexSlider -->
    </div>
    <div class="clear"></div>
</div>