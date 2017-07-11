<?php
$filePath = realpath(dirname(__FILE__));
include_once $filePath.'/../lib/Session.php';
include_once $filePath.'/../lib/Database.php';
include_once $filePath.'/../helpers/Format.php';
Session::check_login();
?>

<?php
class Adminlogin
{
    private $database;
    private $format;

    public function __construct()
    {
        $this->database = new Database();
        $this->format = new Format();
    }

    public function admin_login($adminUser, $adminPass)
    {
        $adminUser = $this->format->validation($adminUser);
        $adminPass = $this->format->validation($adminPass);

        $adminUser = mysqli_real_escape_string($this->database->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->database->link, $adminPass);

        if (empty($adminUser) || empty($adminPass)) {
            $loginMessage = "Username or Password must not be empty";
            return $loginMessage;
        } else {
            $query = "SELECT * FROM admin WHERE admin_user = '$adminUser' AND admin_pass = '$adminPass' ";
            $result = $this->database->select($query);
            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set("admin_login", true);
                Session::set("admin_id", $value[admin_id]);
                Session::set("admin_user", $value[admin_user]);
                Session::set("admin_name", $value[admin_name]);

                header("Location: index.php");
            } else {
                $loginMessage = "Username or Password Not Match";
                return $loginMessage;
            }
        }
    }
}