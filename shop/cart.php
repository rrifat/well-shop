<?php include 'inc/header.php'; ?>
<?php

if (isset($_GET['delpro'])) {
    $id = $_GET['delpro'];

    $deleteCartItem = $cart->delete_cart_item($id);
}
?>
<?php
if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['update'])) {
    $cartId = $_POST['cart_id'];
    $productQty = $_POST['product_qty'];
    $productId = $_POST['pq'];

    $updateCart = $cart->update_cart($productQty, $cartId, $productId);
}
?>

<?php
if (!isset($_GET['id'])) {
    echo "<meta http-equiv='refresh' content='0;URL=?id=refresh'/>";
}
?>
    <div class="main">
        <div class="content">
            <div class="cartoption">
                <div class="cartpage">
                    <h2>Your Cart</h2>

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
                            <th width="5%">SL</th>
                            <th width="30%">Product Name</th>
                            <th width="10%">Image</th>
                            <th width="15%">Price</th>
                            <th width="15%">Quantity</th>
                            <th width="15%">Total Price</th>
                            <th width="10%">Action</th>
                        </tr>
                        <?php
                        $cartProduct = $cart->get_product_cart();
                        if ($cartProduct) {
                            $i = 0;
                            $sum = 0;
                            $qty = 0;
                            while ($row = $cartProduct->fetch_assoc()) {
                                $i++; ?>

                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['product_name']; ?></td>
                                    <td><img src="admin/<?php echo $row['product_image']; ?>" alt=""/></td>
                                    <td>৳<?php echo $row['product_price']; ?></td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="cart_id" value="<?php echo $row['cart_id']; ?>"/>

                                            <input type="number" min="1" name="product_qty"
                                                   value="<?php echo $row['product_qty']; ?>"/>
                                            <input type="submit" name="update" value="Update"/>
                                            <input type="hidden" name="pq" value="<?php echo $row['product_id']; ?>"/>
                                            <?php
                                            if (isset($updateCart)) {
                                                echo $updateCart;
                                            }
                                            ?>
                                        </form>
                                    </td>
                                    <td>
                                        <?php
                                        $total = $row['product_price'] * $row['product_qty'];
                                        echo "৳ " . $total;
                                        ?>
                                    </td>
                                    <td class="text-center"><a href="?delpro=<?php echo $row['cart_id']; ?>"
                                           onclick="return confirm('Are you sure to delete?')"><span
                                                    class="glyphicon glyphicon-remove"></span></a></td>
                                </tr>

                                <?php
                                $sum += $total;
                                $qty += $row['product_qty'];
                                Session::set("sum", $sum);
                                Session::set("qty", $qty);
                                ?>
                            <?php }
                        } ?>

                    </table>
                    <hr>
                    <?php
                    $getData = $cart->check_cart_table();
                    if ($getData) {
                        ?>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-7 well" style="font-weight: bolder">
                                <div class="col-md-7" style="text-align: right">
                                    <h3>Sub Total :</h3>
                                    <h3>VAT :</h3>
                                    <h3>Grand Total :</h3>
                                </div>
                                <div class="col-md-5">
                                    <h3>৳ <?php echo $sum; ?></h3>
                                    <h3>10%</h3>
                                    <h3>৳
                                        <?php
                                        $vat = $sum * 0.1;
                                        $grandTotal = $sum + $vat;
                                        echo $grandTotal;
                                        ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    <?php } else {
                        //header("Location:index.php");
                        echo "<script>window.location='index.php'</script>";

                    } ?>
                </div>
                <div class="shopping">
                    <div class="shopleft">
                        <button onclick="window.location.href='index.php'" class="btn btn-primary login-btn">Continue
                            Shopping
                        </button>
                    </div>
                    <div class="shopright">
                        <button onclick="window.location.href='payment.php'" class="btn btn-success login-btn">
                            Checkout
                        </button>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php include 'inc/footer.php';
