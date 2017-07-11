<?php
include 'inc/header.php';
include 'inc/slider.php';
?>


 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
              <?php
                $featuredProduct = $product->get_featured_product();
              if ($featuredProduct) {
                  while ($row = $featuredProduct->fetch_assoc()) { ?>

				<div class="grid_1_of_4 images_1_of_4" id="product">
					 <a href="details.php?proid=<?php echo $row['product_id']; ?>"><img src="admin/<?php echo $row['product_image']; ?>" alt="" /></a>
					 <h2> <?php echo $row['product_name']; ?> </h2>
					 <p> <?php echo $format->text_shorten($row['product_body'], 50); ?> </p>
					 <p><span class="price"> ৳ <?php echo $row['product_price']; ?> </span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $row['product_id']; ?>" class="details">Details</a></span></div>
				</div>

              <?php } } ?>

			</div>
        <div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
                <?php
                    $newProduct = $product->get_new_product();
                if ($newProduct) {
                    while ($row = $newProduct->fetch_assoc()) { ?>


				<div class="grid_1_of_4 images_1_of_4" id="product">
                    <a href="details.php?proid=<?php echo $row['product_id']; ?>"><img src="admin/<?php echo $row['product_image']; ?>" alt="" /></a>
                    <h2> <?php echo $row['product_name']; ?> </h2>
                    <p><span class="price"> ৳ <?php echo $row['product_price']; ?> </span></p>
                    <div class="button"><span><a href="details.php?proid=<?php echo $row['product_id']; ?>" class="details">Details</a></span></div>
				</div>

                <?php } } ?>
			</div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>
