<?php include 'inc/header.php'; ?>
<?php
if (!isset($_GET['catid']) && $_GET['catid'] == NULL) {
    //echo "<script>window.location = 'catlist.phps'</script>";
    header("Location: 404.php");
} else {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['catid']);
}
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from Category</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
              <?php
              $productByCat = $product->get_product_by_cat($id);
              if ($productByCat) {
                  while ($row = $productByCat->fetch_assoc()) {

              ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $row['product_id']; ?>"><img src="admin/<?php echo $row['product_image']; ?>" alt="" /></a>
					 <h2><?php echo $row['product_name']; ?></h2>
					 <p><?php echo $format->text_shorten($row['product_body'],80); ?></p>
					 <p><span class="price">$<?php echo $row['product_price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $row['product_id']; ?>" class="details">Details</a></span></div>
				</div>

              <?php } } else {
                  header("Location:404.php");
              } ?>
			</div>



    </div>
 </div>
<?php include 'inc/footer.php'; ?>
