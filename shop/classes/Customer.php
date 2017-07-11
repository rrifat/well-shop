<?php
$filePath = realpath(dirname(__FILE__));
include_once $filePath . '/../lib/Database.php';
include_once $filePath . '/../helpers/Format.php';
?>

<?php

class Customer
{
    private $database;
    private $format;

    public function __construct()
    {
        $this->database = new Database();
        $this->format = new Format();
    }

    public function customer_reg($data)
    {
        $customer_name = mysqli_real_escape_string($this->database->link, $data['customer_name']);
        $customer_city = mysqli_real_escape_string($this->database->link, $data['customer_city']);
        $customer_zip = mysqli_real_escape_string($this->database->link, $data['customer_zip']);
        $customer_email = mysqli_real_escape_string($this->database->link, $data['customer_email']);
        $customer_address = mysqli_real_escape_string($this->database->link, $data['customer_address']);
        $customer_country = mysqli_real_escape_string($this->database->link, $data['customer_country']);
        $customer_phone = mysqli_real_escape_string($this->database->link, $data['customer_phone']);
        $customer_password = mysqli_real_escape_string($this->database->link, md5($data['customer_password']));

        if ($customer_name == "" || $customer_city == "" || $customer_zip == "" || $customer_email == "" || $customer_address == "" || $customer_country == "" || $customer_phone == "" || $customer_password == "") {
            $msg = "<span style='color: red; font-size: 18px;'>" . "Field must not be empty" . "</span>";
            return $msg;
        }


        $mailQuery = "SELECT * FROM customer WHERE customer_email = '$customer_email' LIMIT 1";
        $mailCheck = $this->database->select($mailQuery);
        if ($mailCheck == true) {
            $msg = "<span style='color: red; font-size: 18px;'>" . "Email Already Exit. Try with another mail" . "</span>";
            return $msg;
        } else {
            $insertQuery = "INSERT INTO customer
                            SET
                            customer_name = '$customer_name',
                            customer_city = '$customer_city',
                            customer_zip = '$customer_zip',
                            customer_email = '$customer_email',
                            customer_address = '$customer_address',
                            customer_country = '$customer_country',
                            customer_phone = '$customer_phone',
                            customer_password = '$customer_password'";

            $insertedRow = $this->database->insert($insertQuery);
            if ($insertedRow) {
                $msg = "<span style='color: green; font-size: 18px;'>" . "Customer data inserted successfully" . "</span>";
                return $msg;
            } else {
                $msg = "<span style='color: red; font-size: 18px;'>" . "Customer data not inserted successfully" . "</span>";
                return $msg;
            }
        }

    }

    public function customer_login($data)
    {
        $email = mysqli_real_escape_string($this->database->link, $data['customer_email']);
        $password = mysqli_real_escape_string($this->database->link, md5($data['customer_password']));
        if (empty($email) || empty($password)) {
            $msg = "<span style='color: red; font-size: 18px;'>" . "Field must not be empty" . "</span>";
            return $msg;
        }
        $query = "SELECT * FROM customer WHERE customer_email = '$email' AND customer_password = '$password'";
        $result = $this->database->select($query);
        if ($result == true) {
            $row = $result->fetch_assoc();
            Session::set("customer_login", true);
            Session::set("cust_id", $row['customer_id']);
            Session::set("cust_name", $row['customer_name']);
            //header("Location:cart.php");
            echo "<script>window.location='cart.php'</script>";

        } else {
            $msg = "<span style='color: red; font-size: 18px;'>" . "Email or Password is not matched" . "</span>";
            return $msg;
        }
    }

    public function get_customer_id($id)
    {
        $query = "SELECT * FROM customer WHERE customer_id = '$id'";
        $result = $this->database->select($query);
        return $result;
    }

    public function customer_profile_update($data, $id)
    {
        $customer_name = mysqli_real_escape_string($this->database->link, $data['customer_name']);
        $customer_city = mysqli_real_escape_string($this->database->link, $data['customer_city']);
        $customer_zip = mysqli_real_escape_string($this->database->link, $data['customer_zip']);
        $customer_email = mysqli_real_escape_string($this->database->link, $data['customer_email']);
        $customer_address = mysqli_real_escape_string($this->database->link, $data['customer_address']);
        $customer_country = mysqli_real_escape_string($this->database->link, $data['customer_country']);
        $customer_phone = mysqli_real_escape_string($this->database->link, $data['customer_phone']);

        if ($customer_name == "" || $customer_city == "" || $customer_zip == "" || $customer_email == "" || $customer_address == "" || $customer_country == "" || $customer_phone == "") {
            $msg = "<span style='color: red; font-size: 18px;'>" . "Field must not be empty" . "</span>";
            return $msg;
        } else {

            $query = "UPDATE customer 
                               SET
                               customer_name = '$customer_name',
                               customer_city = '$customer_city',
                               customer_zip = '$customer_zip',
                               customer_email = '$customer_email',
                               customer_address = '$customer_address',
                               customer_country = '$customer_country',
                               customer_phone = '$customer_phone'
                               WHERE customer_id  = '$id'";

            $result = $this->database->update($query);
            if ($result) {
                $msg = "<span style='color: green; font-size: 18px;'>" . "Profile updated successfully" . "</span>";
                return $msg;
            } else {
                $msg = "<span style='color: red; font-size: 18px;'>" . "Profile not updated" . "</span>";
                return $msg;
            }
        }
    }
}
