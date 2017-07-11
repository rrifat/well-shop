<?php
$filePath = realpath(dirname(__FILE__));
include_once $filePath . '/../lib/Database.php';
include_once $filePath . '/../helpers/Format.php';
?>

<?php

class Cart
{
    private $database;
    private $format;

    public function __construct()
    {
        $this->database = new Database();
        $this->format = new Format();
    }

    public function add_cart($qty, $id)
    {
        $qty = $this->format->validation($qty);
        $qty = mysqli_real_escape_string($this->database->link, $qty);
        $id = mysqli_real_escape_string($this->database->link, $id);
        $sessionId = session_id();

        $query = "SELECT * FROM product WHERE product_id = '$id'";
        $result = $this->database->select($query)->fetch_assoc();

        $productName = $result['product_name'];
        $productPrice = $result['product_price'];
        $productImg = $result['product_image'];

        $checkQuery = "SELECT * FROM cart WHERE product_id = '$id' AND session_id = '$sessionId'";
        $checkRow = $this->database->select($checkQuery);

        $query = "SELECT * FROM product WHERE product_id = '$id'";
        $totalProduct = $this->database->select($query)->fetch_assoc();

        if ($checkRow) {
            $msg = "Product Already Added";
            return $msg;
        } else {
            if ($qty <= $totalProduct['total_product'] && $qty >= 0) {
                $insertCartQuery = "INSERT INTO cart 
                            SET 
                            session_id = '$sessionId',
                            product_id = '$id',
                            product_name = '$productName',
                            product_price = '$productPrice',
                            product_qty = '$qty',
                            product_image = '$productImg'";

                $insertedRow = $this->database->insert($insertCartQuery);
                if ($insertedRow) {
                    //header("Location:cart.php");
                    echo "<script>window.location='cart.php'</script>";
                } else {
                    header("Location:404.php");
                }
            } else {
                $msg = "OUT OF STOCK";
                //echo "<h2 class='alert alert-warning alert-dismissable'>$msg<h2>";
                echo "<h2 class='alert alert-danger text-center' style='font-weight: bolder;'><span class='glyphicon glyphicon-info-sign'></span> $msg</h2>";
            }

        }


    }

    public function get_product_cart()
    {
        $sessionId = session_id();
        $query = "SELECT * FROM cart WHERE session_id = '$sessionId'";
        $result = $this->database->select($query);
        return $result;
    }

    public function update_cart($qty, $id, $pID)
    {
        $cartId = $this->format->validation($id);
        $productQty = $this->format->validation($qty);
        $productId = $this->format->validation($pID);

        $productQty = mysqli_real_escape_string($this->database->link, $qty);
        $cartId = mysqli_real_escape_string($this->database->link, $id);
        $productId = mysqli_real_escape_string($this->database->link, $pID);


        $query = "SELECT * FROM product WHERE product_id = '$productId'";
        $totalProduct = $this->database->select($query)->fetch_assoc();

        if ($productQty <= $totalProduct['total_product'] && $productQty >= 0) {

            $query = "UPDATE cart SET ";
            $query .= "product_qty = '$productQty' ";
            $query .= "WHERE cart_id = '$cartId' ";

            $result = $this->database->update($query);

            if ($result) {
                /*$msg = "<span style='color: green; font-size: 18px;'>" . "Cart Quantity updated successfully" . "</span>";
                return $msg;*/
                //header("Location:cart.php");
                echo "<script>window.location = 'cart.php'</script>";
            } else {
                /*$msg = "Cart quantity not updated";
                return $msg;*/
                //header("Location:index.php");
                echo "<script>window.location = 'index.php'</script>";
            }


        } else {

            $msg = "OUT OF STOCK";
            //echo "<h2 class='alert alert-warning alert-dismissable'>$msg<h2>";
            echo "<h2 class='alert alert-danger text-center' style='font-weight: bolder;'><span class='glyphicon glyphicon-info-sign'></span> $msg</h2>";
        }


    }

    public function delete_cart_item($id)
    {
        $query = "DELETE FROM cart WHERE cart_id = '$id'";
        $result = $this->database->delete($query);

        if ($result) {
            //header("Location:cart.php");
            echo "<script>window.location='cart.php'</script>";

        }
    }

    public function check_cart_table()
    {
        $sessionId = session_id();
        $query = "SELECT * FROM cart WHERE session_id = '$sessionId'";
        $result = $this->database->select($query);
        return $result;
    }

    public function del_data_from_cart()
    {
        $sessioId = session_id();
        $query = "DELETE FROM cart WHERE session_id = '$sessioId'";
        $result = $this->database->delete($query);
    }

    public function order_product($custId)
    {
        $sessionId = session_id();
        $query = "SELECT * FROM cart WHERE session_id = '$sessionId'";
        $getPro = $this->database->select($query);
        if ($getPro) {
            while ($row = $getPro->fetch_assoc()) {
                $productId = $row['product_id'];
                $productName = $row['product_name'];
                $productQty = $row['product_qty'];
                $productPrice = $row['product_price'] * $productQty;
                $productImg = $row['product_image'];

                $query = "INSERT INTO orders 
                            SET 
                            cust_id = '$custId',
                            product_id = '$productId',
                            product_name = '$productName',
                            product_price = '$productPrice',
                            product_qty = '$productQty',
                            product_image = '$productImg'";

                $insertRow = $this->database->insert($query);
            }
        }
    }

    public function payable_amount($custId)
    {
        $query = "SELECT product_price FROM orders WHERE cust_id = '$custId' AND order_date = now()";
        $result = $this->database->select($query);
        return $result;
    }

    public function get_ordered_product($custId)
    {
        $query = "SELECT * FROM orders WHERE cust_id = '$custId' ORDER BY order_date DESC ";
        $result = $this->database->select($query);
        return $result;
    }

    public function check_order_table($custId)
    {
        $query = "SELECT * FROM orders WHERE cust_id = '$custId'";
        $result = $this->database->select($query);
        return $result;
    }

    public function get_ordered_product_admin()
    {
        $query = "SELECT * FROM orders ORDER BY order_date DESC ";
        $result = $this->database->select($query);
        return $result;
    }

    public function product_shifted($id, $date, $price)
    {
        $id = mysqli_real_escape_string($this->database->link, $id);
        $date = mysqli_real_escape_string($this->database->link, $date);
        $price = mysqli_real_escape_string($this->database->link, $price);

        $query = "UPDATE orders 
                       SET
                       order_status = '1'
                       
                       WHERE cust_id  = '$id' AND order_date = '$date' AND product_price = '$price'";

        $result = $this->database->update($query);
        return $result;
    }

    public function del_product_shifted($id, $date, $price)
    {
        $id = mysqli_real_escape_string($this->database->link, $id);
        $date = mysqli_real_escape_string($this->database->link, $date);
        $price = mysqli_real_escape_string($this->database->link, $price);

        $query = "DELETE FROM orders WHERE cust_id  = '$id' AND order_date = '$date' AND product_price = '$price'";
        $result = $this->database->delete($query);

        if ($result) {
            $msg = "<span style='color: green; font-size: 18px;'>" . "Order Delivered successfully" . "</span>";
            return $msg;

        }
    }

    public function product_shift_confirm($id, $price)
    {
        $id = mysqli_real_escape_string($this->database->link, $id);
        $price = mysqli_real_escape_string($this->database->link, $price);

        $query = "UPDATE orders 
                       SET
                       order_status = '2'
                       
                       WHERE cust_id  = '$id' AND product_price = '$price'";

        $result = $this->database->update($query);
        return $result;
    }

}