<?php include "inc/header.php"; ?>
<?php
$loggedIn = Session::get("customer_login");
if ($loggedIn == false) {
    header("Location:login.php");
}
?>
<?php
$custId = Session::get("cust_id");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['profile_update'])) {
    $customerProfileUpdate = $customer->customer_profile_update($_POST, $custId);
}
?>
    <style>
        .tblone {
            width: 550px;
            margin: 0 auto;
            border: 2px solid #ddd;
        }

        .tblone tr td {
            text-align: justify;
        }
        .tblone input[type="text"] {
            width: 400px;
            padding: 5px;
            font-size: 15px;
        }
    </style>

    <div class="main">
        <div class="content">
            <div class="section group">
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
                                    <td></td>
                                    <td><input type="submit" name="profile_update" value="save"></td>
                                </tr>
                            </table>
                        </form>

                    <?php }
                } ?>
            </div>
            <div class="clear"></div>
        </div>
    </div>

<?php include "inc/footer.php"; ?>