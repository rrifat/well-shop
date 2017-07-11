<div class="header_bottom">
    <div class="header_bottom_left">
        <div class="section group">
            <div class="listview_1_of_2 images_1_of_2">
                <?php
                $oneplusLatest = $product->oneplus_lates_product();
                if ($oneplusLatest) {
                    while ($row = $oneplusLatest->fetch_assoc()) {

                        ?>
                        <div class="listimg listimg_2_of_1">
                            <a href="details.php?proid=<?php echo $row['product_id']; ?>"> <img src="admin/<?php echo $row['product_image']; ?>" alt=""/></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h2>Naviforce</h2>
                            <p><?php echo $format->text_shorten($row['product_body'], 30); ?></p>
                            <div class="button"><span><a href="details.php?proid=<?php echo $row['product_id']; ?>">Add to cart</a></span></div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="listview_1_of_2 images_1_of_2">
                <?php
                $xiaomiLatest = $product->xiaomi_lates_product();
                if ($xiaomiLatest) {
                    while ($row = $xiaomiLatest->fetch_assoc()) {

                        ?>
                        <div class="listimg listimg_2_of_1">
                            <a href="details.php?proid=<?php echo $row['product_id']; ?>"> <img src="admin/<?php echo $row['product_image']; ?>" alt=""/></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h2>Curren</h2>
                            <p><?php echo $format->text_shorten($row['product_body'], 30); ?></p>
                            <div class="button"><span><a href="details.php?proid=<?php echo $row['product_id']; ?>">Add to cart</a></span></div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="section group">
            <div class="listview_1_of_2 images_1_of_2">
                <?php
                $googleLatest = $product->google_lates_product();
                if ($googleLatest) {
                    while ($row = $googleLatest->fetch_assoc()) {

                        ?>
                        <div class="listimg listimg_2_of_1">
                            <a href="details.php?proid=<?php echo $row['product_id']; ?>"> <img src="admin/<?php echo $row['product_image']; ?>" alt=""/></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h2>Ochstin</h2>
                            <p><?php echo $format->text_shorten($row['product_body'], 30); ?></p>
                            <div class="button"><span><a href="details.php?proid=<?php echo $row['product_id']; ?>">Add to cart</a></span></div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="listview_1_of_2 images_1_of_2">
                <?php
                $appleLatest = $product->apple_lates_product();
                if ($appleLatest) {
                    while ($row = $appleLatest->fetch_assoc()) {

                        ?>
                        <div class="listimg listimg_2_of_1">
                            <a href="details.php?proid=<?php echo $row['product_id']; ?>"> <img src="admin/<?php echo $row['product_image']; ?>" alt=""/></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h2>Casio</h2>
                            <p><?php echo $format->text_shorten($row['product_body'], 30); ?></p>
                            <div class="button"><span><a href="details.php?proid=<?php echo $row['product_id']; ?>">Add to cart</a></span></div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="header_bottom_right_images">
        <!-- FlexSlider -->

        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li><img src="images/slider-1.jpg" alt=""/></li>
                    <li><img src="images/slider-2.jpg" alt=""/></li>
                    <li><img src="images/slider-3.jpg" alt=""/></li>
                    <li><img src="images/slider-4.jpg" alt=""/></li>
                </ul>
            </div>
        </section>
        <!-- FlexSlider -->
    </div>
    <div class="clear"></div>
</div>
