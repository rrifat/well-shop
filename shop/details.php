<?php include 'inc/header.php'; ?>
<?php

if (isset($_GET['proid'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['proid']);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $productQty = $_POST['product_qty'];
    $addCart = $cart->add_cart($productQty, $id);

}
?>

<?php
$custId = Session::get("cust_id");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {

    $productId = $_POST['product_id'];
    $insertKmprData = $product->insert_kmpare_data($custId, $productId);
}

?>
 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">

                    <?php
                    $singleProductLoad = $product->get_single_product($id);
                    if ($singleProductLoad) {
                        while ($row = $singleProductLoad->fetch_assoc()) { ?>



					<div class="grid images_3_of_2">
						<img src="admin/<?php echo $row['product_image']; ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2> <?php echo $row['product_name']; ?> </h2>
					<div class="price">
						<p>Price: <span>৳ <?php echo $row['product_price']; ?></span></p>
						<p>Category: <span><?php echo $row['cat_name']; ?></span></p>
						<p>Brand:<span><?php echo $row['brand_name']; ?></span></p>
					</div>

				<div class="add-cart">
					<form action="" method="post">
						<input type="number" min="1" class="buyfield" name="product_qty" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
						<input type="hidden" value="<?php $row['cat_id']; ?>"/>
					</form>
				</div>

                    <?php
                    if (isset($insertKmprData)) {
                        echo $insertKmprData;
                    }
                    ?>

                    <?php
                    $loggedIn = Session::get("customer_login");
                    if ($loggedIn == true) { ?>
                <div class="add-cart">
					<form action="" method="post">
						<input type="hidden" class="buyfield" name="product_id" value="<?php echo $row['product_id']; ?>"/>
						<input type="submit" class="buysubmit" name="compare" value="Add to compare"/>
					</form>
				</div>
                    <?php } ?>

                    <span style="color: red; font-size: 18px;">
                        <?php
                        if (isset($addCart)) {
                            echo $addCart;
                        }
                        ?>
                    </span>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php echo $row['product_body']; ?></p>
	    </div>

                <?php } } ?>

	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
                        <?php
                        $getAllCat = $category->get_all_cat();
                        if ($getAllCat) {
                            while ($row = $getAllCat->fetch_assoc()) {
                        ?>
				        <li><a href="productbycat.php?catid=<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></a></li>
                        <?php } } ?>
    				</ul>

 				</div>
 		</div>
 	</div>
	</div>
   <?php include 'inc/footer.php'; ?>
