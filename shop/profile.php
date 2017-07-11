<?php include "inc/header.php"; ?>
<?php
$loggedIn = Session::get("customer_login");
if ($loggedIn == false) {
    header("Location:login.php");
}
?>
    <style>
        .tblone{
            width: 550px;
            margin: 0 auto;
            border: 2px solid #ddd;
        }
        .tblone tr td {
            text-align: justify;
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
                        <td><a href="profile_edit.php">Update Profile</a></td>
                    </tr>
                </table>

                <?php } } ?>
            </div>
            <div class="clear"></div>
        </div>
    </div>

<?php include "inc/footer.php";?>