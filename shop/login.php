<?php include 'inc/header.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $customerLogin = $customer->customer_login($_POST);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $customerReg = $customer->customer_reg($_POST);
}

$loggedIn = Session::get("customer_login");
if ($loggedIn == true) {
    //header("Location: cart.php");
    echo "<script>window.location='cart.php'</script>";
}




?>

<div class="main">
    <div class="content ">
        <div class="login_panel jumbotron">
            <h3 class="well ">Existing Customers</h3>
            <?php
            if (isset($customerLogin)) {

                echo "<div class='alert alert-success alert-dismissable' role='alert'>".
                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <p>$customerLogin</p>"."</div>";
            }
            ?>

            <form action="" method="post">
                <input name="customer_email" type="text" placeholder="Email">
                <input name="customer_password" type="password" placeholder="Password">
                <div class="buttons">
                    <div style="padding-top: 20px;">
                        <button class="btn btn-success" name="login">Sign In</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="register_account">

            <?php
            if (isset($customerReg)) {
                echo "<div class='alert alert-success alert-dismissable' role='alert'>".
                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <p>$customerReg</p>"."</div>";
            }
            ?>

            <h3 class="well">Register New Account</h3>
            <form action="" method="post">
                <table>
                    <tbody>
                    <tr>
                        <td>
                            <div>
                                <input type="text" name="customer_name" placeholder="Name">
                            </div>

                            <div>
                                <input type="text" name="customer_city" placeholder="City">
                            </div>

                            <div>
                                <input type="text" name="customer_zip" placeholder="Zip">
                            </div>
                            <div>
                                <input type="text" name="customer_email" placeholder="Email">
                            </div>
                        </td>
                        <td>
                            <div>
                                <input type="text" name="customer_address" placeholder="Address">
                            </div>
                            <div>
                                <input type="text" name="customer_country" placeholder="Country">
                            </div>

                            <div>
                                <input type="text" name="customer_phone" placeholder="Phone">
                            </div>

                            <div>
                                <input type="password" name="customer_password" placeholder="Password">
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="search">
                    <div style="padding-top: 15px;">
                        <button class="btn btn-primary" name="register">Create Account</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
