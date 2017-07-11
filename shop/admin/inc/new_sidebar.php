<body>
<div id="wrapper">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">wellshop admin</a>
    </div>
    <?php
      if (isset($_GET['action']) && $_GET['action'] == "logout") {
           Session::destroy();
       }
    ?>
    <ul class="nav navbar-right top-nav">

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo Session::get('admin_name'); ?> <b class="caret"></b></a>

            <ul class="dropdown-menu">
                <li>
                    <a href="?action=logout"><i class="fa fa-fw fa-power-off"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>



<div class="collapse navbar-collapse navbar-ex1-collapse">
<!--    <ul class="nav navbar-nav">-->
<!--        <li class=""><a href="inbox.php"> <span>Inbox</span></a></li>-->
<!--        <li><a href="#">Link</a></li>-->
<!--    </ul>-->
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="inbox.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li><a style="font-size:20px;"><i class="fa fa-home"></i> Category Option</a>
            <ul class="nav child_menu">
                <li><a href="catadd.php">Add Category</a></li>
                <li><a href="catlist.php">Category List</a></li>
            </ul>
        </li>
        <li><a style="font-size:20px;"><i class="fa fa-table"></i> Brand Option</a>
            <ul class="nav child_menu">
                <li><a href="brand_add.php">Add Brand</a></li>
                <li><a href="brand_list.php">Brand List</a></li>

            </ul>
        </li>
        <li><a style="font-size:20px;"><i class="fa fa-th-list"></i> Product Option</a>
            <ul class="nav child_menu">
                <li><a href="productadd.php">Add Product</a></li>
                <li><a href="productlist.php">Product List</a></li>
            </ul>
        </li>
<!--        <li>-->
<!--            <a href="/admin/usermanagement"><i class="fa fa-fw fa-edit"></i> User Management</a>-->
<!--        </li>-->
    </ul>
</div>
<!-- /.navbar-collapse -->
</nav>
</div> <!-- /#wrapper -->

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>