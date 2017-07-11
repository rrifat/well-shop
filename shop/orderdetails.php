

<?php
include "inc/header.php";
$loggedIn = Session::get("customer_login");
if ($loggedIn == false) {
    //header("Location:login.php");
    echo "<script>window.location='login.php'</script>";
}
?>

<?php
$cart = new Cart();
$format = new Format();
?>

<?php
if (isset($_GET['cust-id'])) {
    $shiftId = $_GET['cust-id'];
    $price = $_GET['price'];

    $shifted = $cart->product_shift_confirm($shiftId, $price);
}

//if (isset($_GET['del-shift-id'])) {
//    $shiftId = $_GET['del-shift-id'];
//    $date = $_GET['time'];
//    $price = $_GET['price'];
//
//    $delShifted = $cart->del_product_shifted($shiftId, $date, $price);
//}
?>
    <style>
        .payment {
            text-align: center;
            padding-top:10px;
            font-weight:bold;
            font-size:30px;
        }
    </style>

                <div class="payment content">
                    <h2>Order Details</h2><br><br>
                </div>

            <div class="clear"></div>

    <table class="table table-striped">
        <tr>
            <th>SL</th>
            <th>Product Name</th>
            <th width="10%">Image</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php
        $custId = Session::get("cust_id");
        $orderedProduct = $cart->get_ordered_product($custId);
        if ($orderedProduct) {
            $i = 0;

            while ($row = $orderedProduct->fetch_assoc()) {
                $i++; ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><img src="admin/<?php echo $row['product_image']; ?>" alt=""/></td>
                    <td class="text-center"><?php echo $row['product_qty']; ?></td>
                    <td>
                        <?php echo "৳" . $row['product_price']; ?>
                    </td>
                    <td><?php echo $format->format_date($row['order_date']); ?></td>
                    <td>
                        <?php
                        if ($row['order_status'] == '0') {
                            echo "<span class='label label-warning'>Pending</span>";
                        } elseif ($row['order_status'] == '1' )  { ?>
                            <a class="btn btn-success" href="?cust-id=<?php echo $custId ;?>&price=<?php echo $row['product_price']; ?>">Shifted</a>
                        <?php } else {
                            echo "<span class='label label-success'>confirm</span>";
                             }?>
                    </td>
                </tr>
            <?php }
        } ?>

    </table>

<?php include "inc/footer.php"; ?>