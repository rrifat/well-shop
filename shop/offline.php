<?php include "inc/header.php"; ?>
<?php
$loggedIn = Session::get("customer_login");
if ($loggedIn == false) {
    //header("Location:login.php");
    echo "<script>window.location='login.php'</script>";
}
?>
<?php
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $custId = Session::get("cust_id");
    $orderProduct = $cart->order_product($custId);
    $delDataFrmCart = $cart->del_data_from_cart();
    //header("Location:success.php");
    echo "<script>window.location='success.php'</script>";
}
?>
<?php
$custId = Session::get("cust_id");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['profile_update'])) {
    $customerProfileUpdate = $customer->customer_profile_update($_POST, $custId);
}
?>
    <style>
        .tblone, .tbltwo {
            border: 2px solid #ddd
        }

        .division {
            width: 50%;
            float: left
        }

        .tblone {
            width: 500px;
            margin: 0 auto
        }

        .tblone tr td {
            text-align: justify
        }

        .tbltwo {
            float: right;
            text-align: left;
            width: 60%;
            margin-right: 14px;
            margin-top: 12px
        }

        .tbltwo tr td {
            text-align: justify;
            padding: 5px 10px
        }

        .tbltwo tr th {
            padding-left: 20px
        }

        .order {
            padding-bottom: 30px
        }

        .order a {
            margin: 20px auto 0;
            /* background: #DD0F0E; */
            width: 150px;
            /* font-size: 30px; */
            display: block;
            /* padding: 10px; */
            color: #fff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 0px;
            text-transform: uppercase;
        }
        custom a{
            background: #204d74;
            color: white;
        }
        custom a:hover{
            color: white;
        }
    </style>

    <div class="main">
    <div class="content">
    <div class="section group">
    <div class=" division">
    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th width="30%">Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
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
                    <td>৳<?php echo $row['product_price']; ?></td>
                    <td class="text-center"><?php echo $row['product_qty']; ?></td>
                    <td>
                        <?php
                        $total = $row['product_price'] * $row['product_qty'];
                        echo "৳" . $total;
                        ?>
                    </td>
                </tr>

                <?php
                $sum += $total;
                $qty += $row['product_qty'];
                ?>
            <?php }
        } ?>

    </table>
<?php
$getData = $cart->check_cart_table();
if ($getData) {
    ?>
    <div class="row">
        <div class="col-md-7 col-md-offset-4 well" style="font-weight: bolder">
            <div class="col-md-6" style="text-align: right">
                <h3>Sub Total :</h3>
                <h3>VAT :</h3>
                <h3>Grand Total :</h3>
            </div>
            <div class="col-md-6">
                <h3>৳ <?php echo $sum; ?></h3>
                <h3>10% <?php echo "( ৳ ". $sum * 0.1. ")" ?> </h3>
                <h3>৳
                    <?php
                    $vat = $sum * 0.1;
                    $grandTotal = $sum + $vat;
                    echo $grandTotal;
                    Session::set("grand_total", $grandTotal);
                    ?>
                </h3>
            </div>
        </div>
    </div>
    <?php } ?>
    </div>
    <div class=" division">
        <?php
        $id = Session::get("cust_id");
        $getCustomerId = $customer->get_customer_id($id);
        if ($getCustomerId) {
            while ($row = $getCustomerId->fetch_assoc()) { ?>


                <table class="tblone">
                    <tr>
                        <td colspan="3"><h2>Your Profile</h2></td>
                    </tr>
                    <tr>
                        <td width="20%">Name</td>
                        <td>:</td>
                        <td><?php echo $row['customer_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td><?php echo $row['customer_phone']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $row['customer_email']; ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td><?php echo $row['customer_address']; ?></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>:</td>
                        <td><?php echo $row['customer_city']; ?></td>
                    </tr>
                    <tr>
                        <td>Zipcode</td>
                        <td>:</td>
                        <td><?php echo $row['customer_zip']; ?></td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td>:</td>
                        <td><?php echo $row['customer_country']; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><a href="" class="btn btn-primary custom" data-toggle="modal" data-target="#myModal">Update Profile</a></td>

                    </tr>
                </table>


            <?php }} ?>
        <!-- Button trigger modal -->
<!--        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">-->
<!--            Update-->
<!--        </button>-->

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                            <?php
                            $id = Session::get("cust_id");
                            $getCustomerId = $customer->get_customer_id($id);
                            if ($getCustomerId) {
                                while ($row = $getCustomerId->fetch_assoc()) { ?>

                                    <form action="" method="post">
                                        <table class="tblone">
                                            <?php
                                            if (isset($customerProfileUpdate)) {
                                                echo "<tr><td colspan='2'>".$customerProfileUpdate."</td></tr>";
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="2"><h2>Update Your Profile Details</h2></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Name</td>
                                                <td><input type="text" name="customer_name"
                                                           value="<?php echo $row['customer_name']; ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td><input type="text" name="customer_phone"
                                                           value="<?php echo $row['customer_phone']; ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><input type="text" name="customer_email"
                                                           value="<?php echo $row['customer_email']; ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td><input type="text" name="customer_address"
                                                           value="<?php echo $row['customer_address']; ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>City</td>
                                                <td><input type="text" name="customer_city"
                                                           value="<?php echo $row['customer_city']; ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Zipcode</td>
                                                <td><input type="text" name="customer_zip"
                                                           value="<?php echo $row['customer_zip']; ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Country</td>
                                                <td><input type="text" name="customer_country"
                                                           value="<?php echo $row['customer_country']; ?>"></td>
                                            </tr>
                                            <tr>
<!--                                                <td></td>-->
<!--                                                <td><input type="submit" name="profile_update" value="save"></td>-->
                                            </tr>
                                        </table>


                                <?php }
                            } ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<!--                        <button type="submit" name="profile_update" class="btn btn-primary">Save changes</button>-->
                        <input type="submit" name="profile_update" class="btn btn-primary" value="Save Changes">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="clear"></div>
    </div>
        <div class="order">
            <a href="?orderid=order" class="btn btn-success btn-lg">Order Now</a>
        </div>
    </div>

    <?php include "inc/footer.php"; ?>