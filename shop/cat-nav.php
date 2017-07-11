<?php include 'inc/header.php'; ?>
<?php
if (isset($_GET['catid'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['catid']);

    $getCatNameById = $category->get_cat_name_by_id($id);
    $getProductByCatId = $product->get_product_by_cat($id);

}
?>
 <div class="main">
    <div class="content">


        <?php
        if ($getCatNameById) {
            while ($row = $getCatNameById->fetch_assoc()) { ?>


    	<div class="content_top">
    		<div class="heading">
    		<h3><?php echo $row['cat_name']; ?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>

        <?php } } ?>


	      <div class="section group">
              <?php
              if ($getProductByCatId) {
              while ($row = $getProductByCatId->fetch_assoc()) { ?>
				<div class="grid_1_of_4 images_1_of_4" id="">
					 <a href="details-3.php"><img src="admin/<?php echo $row['product_image']; ?>" alt="" /></a>
					 <h2><?php echo $row['product_name']; ?></h2>
					 <p><?php echo $format->text_shorten($row['product_body'], 80); ?></p>
					 <p><span class="price">৳<?php echo $row['product_price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $row['product_id']; ?>" class="details">Details</a></span></div>
				</div>
              <?php } } ?>
          </div>
    </div>
 </div>


<?php include 'inc/footer.php'; ?>
