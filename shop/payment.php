<?php include "inc/header.php"; ?>
<?php
$loggedIn = Session::get("customer_login");
if ($loggedIn == false) {
    //header("Location:login.php");
    echo "<script>window.location='login.php'</script>";
}
?>
    <style>
        .payment {
            width: 500px;
            min-height: 200px;
            text-align: center;
            border: 1px solid #ddf;
            margin: 0 auto
        }

        .payment h2 {
            border-bottom: 1px solid #ddf
        }

        .payment a {
            color: #ffff;
            padding: 10px;
            display: inline-block;
            border-radius: 0px;
        }
    </style>

    <div class="main">
        <div class="content">
            <div class="section group">
                <div class="payment">
                    <h2>Choose Payment Option</h2><br><br>

                    <a href="offline.php" class="btn btn-success btn-lg"><i class="fa fa-money fa-lg" aria-hidden="true"></i>  Offline Payment</a>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>

<?php include "inc/footer.php"; ?>