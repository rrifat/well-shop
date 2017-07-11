<?php
include 'lib/Database.php';
include 'helpers/Format.php';
include 'lib/Session.php';
Session::init();

spl_autoload_register(function ($class) {
    include_once "classes/" .$class.".php";
});
$database = new Database();
$format  = new Format();
$product = new Product();
$cart = new Cart();
$category = new Category();
$customer = new Customer();

?>
<?php
$catListForNav = $category->get_cat_list_for_nav();
?>
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>

<?php
if (isset($_GET['cid'])) {
    $delDataFrmCmpare = $product->del_data_from_kmpare();
    Session::destroy();
}
?>

<?php
if (isset($_GET['cid'])) {
    $delDataFrmCart = $cart->del_data_from_cart();
    Session::destroy();
}
?>

<!DOCTYPE HTML>
<head>
    <title>well shop</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
    <script src="js/jquerymain.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/nav.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/nav-hover.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">
        $(document).ready(function ($) {
            $('#dc_mega-menu-orange').dcMegaMenu({rowItems: '4', speed: 'fast', effect: 'fade'});



            $('.search').on('keyup', function() {
               var searchTerm = $(this).val().toLowerCase();
               $('.grid_1_of_4').each(function() {
                  var lineStr = $(this).text().toLowerCase();
                  if (lineStr.indexOf(searchTerm) === -1) {
                      $(this).hide();
                  } else {
                      $(this).show();
                  }
               });
            });
        });

    </script>

    <style>
        .login-btn {
            padding: 9px;
            font-weight: bold;
            width: auto;
            border-radius: 0px;
        }
    </style>
</head>
<body>
<div class="wrap">
    <div class="header_top">
        <div class="logo">
            <a href="index.html"><img src="images/logo.png" alt="" /></a>
        </div>
        <div class="header_top_right">
            <div class="search_box">
                <form>

                    <input type="text" value="Search for Products" onfocus="this.value = '';"
                           onblur="if (this.value == '') {this.value = 'Search for Products';}" placeholder="What are you looking for.." class="search">
                </form>
            </div>
            <div class="shopping_cart">
                <div class="cart">
                    <a href="#" title="View my shopping cart" rel="nofollow">
                        <span class="cart_title">Cart:</span>
                        <span class="no_product">
                            <?php
                            $getData = $cart->check_cart_table();
                            if ($getData) {
                                $sum = Session::get("sum");
                                echo "$".$sum;
                            } else {
                                echo "$0";
                            }

                            ?>
                        </span>
                        <span class="cart_title">Qty:</span>
                        <span class="no_product">
                            <?php
                            $getData = $cart->check_cart_table();
                            if ($getData) {
                                $qty = Session::get("qty");
                                echo $qty;
                            } else {
                                echo "0";
                            }

                            ?>
                        </span>
                    </a>
                </div>
            </div>
            <?php
            $loggedIn = Session::get("customer_login");
            if ($loggedIn == false) { ?>
                <div class="pull-right"><button onclick="window.location.href='login.php'" class="btn btn-info login-btn">Login</button></div>
            <?php } else { ?>
                <div class="pull-right"><button onclick="window.location.href='?cid=<?php Session::get('cust_id');?>'" class="btn btn-danger login-btn">Logout</button></div>

            <?php }  ?>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="menu">
        <ul id="dc_mega-menu-orange" class="dc_mm-orange">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Categories</a>
                <ul id="dc_mega-menu-orange" class="dc_mm_orange">

                    <?php
                    if ($catListForNav) {
                        while ($row = $catListForNav->fetch_assoc()) { ?>
                            <li><a href="cat-nav.php?catid=<?php echo $row['cat_id']; ?> "><?php echo $row['cat_name']; ?></a></li>
                    <?php } } ?>

                </ul>
            </li>
            <?php
            $loggedIn = Session::get("customer_login");
            if ($loggedIn == true) { ?>
                <li><a href="profile.php">Profile</a></li>
            <?php } ?>

            <?php
            $checkCartTable = $cart->check_cart_table();
            if ($checkCartTable) { ?>
              <li><a href="cart.php">Cart</a></li>
            <?php } ?>

            <?php
            if ($loggedIn == true) { ?>
                <li><a href="compare.php">Compare</a></li>
            <?php } ?>



            <?php
            $custId = Session::get("cust_id");
            $checkOrderTable = $cart->check_order_table($custId);
            if ($checkOrderTable) { ?>
              <li><a href="orderdetails.php">Order</a></li>
            <?php } ?>
            <li><a href="contact.php">Contact</a></li>
            <div class="clear"></div>
        </ul>
    </div>
