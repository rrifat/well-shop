<?php include "inc/header.php"; ?>
<?php
$loggedIn = Session::get("customer_login");
if ($loggedIn == false) {
    //header("Location:login.php");
    echo "<script>window.location='login.php'</script>";
}
?>
    <style>
        .success{width:500px;min-height:200px;text-align:left;border:1px solid #ddf;margin:0 auto}.success h2{border-bottom:1px solid #ddf;
                                                                                                      text-align: center;}
    </style>

    <div class="main">
        <div class="content">
            <div class="section group">
                <div class="success">
                    <h2>Success</h2><br><br>
                    <?php
                    $custId = Session::get("cust_id");
                    $payableAmount = $cart->payable_amount($custId);
                    $sum = 0;
                    $price = 0;
                    if ($payableAmount) {

                        while ($row = $payableAmount->fetch_assoc()) {
                            $price = $row['product_price'];
                            $sum = $sum + $price;

                        }
                    }
                    ?>
                    <p>Total Payable Amount(Including Vat) :
                        <?php
                        $gTotal = Session::get("grand_total");
                            $vat = $sum * 0.1;
                            $total = $sum + $vat;
                            echo "৳".$gTotal;
                        ?>
                    </p>
                    <p>Here is your order details <a href="orderdetails.php">Visit Here</a></p>

                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>

<?php include "inc/footer.php"; ?>