<?php include 'inc/header.php'; ?>
<?php

if (isset($_GET['delpro'])) {
    $id = $_GET['delpro'];

    $deleteCartItem = $cart->delete_cart_item($id);
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productQty = $_POST['product_qty'];
    $cartId = $_POST['cart_id'];

    $updateCart = $cart->update_cart($productQty, $cartId);

    if ($productQty <= 0) {
        $deleteCartItem = $cart->delete_cart_item($cartId);
    }
}
?>
<?php
if (!isset($_GET['id'])) {
    echo "<meta http-equiv='refresh' content='0;URL=?id=refresh'/>";
}
?>
<style>
    table.tblone img {
        height: 90px;
        width: 100px;
    }
</style>
    <div class="main">
        <div class="content">
            <div class="cartoption">
                <div class="cartpage">
                    <h2>Product Comparison</h2>

                    <?php
                    if (isset($updateCart)) {
                        echo $updateCart;
                    }
                    if (isset($deleteCartItem)) {
                        echo $deleteCartItem;
                    }
                    ?>
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th class="text-center">Image</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $custId = Session::get("cust_id");
                        $compareProduct = $product->get_kmpare_proudct($custId);
                        if ($compareProduct) {
                            $i = 0;
                            while ($row = $compareProduct->fetch_assoc()) {
                                $i++; ?>

                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['product_name']; ?></td>
                                    <td>৳<?php echo $row['product_price']; ?></td>
                                    <td width="20%"><img src="admin/<?php echo $row['product_image']; ?>" alt=""/></td>
                                    <td><a href="details.php?proid=<?php echo $row['product_id']; ?>" class="btn btn-primary">View</a></td>
                                </tr>

                            <?php }
                        } ?>

                    </table>
                    
                </div>
                <div class="shopping">
                    <div class="shopleft">
                        <button onclick="window.location.href='index.php'" class="btn btn-primary login-btn">Continue Shopping</button>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php include 'inc/footer.php';
