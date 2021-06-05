<?php

class EmployeesController extends VanillaController {
    function beforeAction() {
    }

    function login() {
        session_start();

        // Check if the user is logged in, otherwise redirect to login page
        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
            if (isset($_SESSION["isEmployee"]) && $_SESSION["isEmployee"] === true) {

                // header("location: /employees/index.php");
                // exit;
                echo "is employee!\n";
                header("location: /employees/processOrder");
            } else {
                header("location: /");
                exit;
            }
        }
        // Define variables and initialize with empty values
        $username = $password = "";
        $err = $login_err = "";

        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Check if username is empty
            if (empty(trim($_POST["username"])) || empty(trim($_POST["password"]))) {
                $err = "Username and password must not be blank";
                $this->set_template_variable('err',$err);
            } else {
                $username = trim($_POST["username"]);
                $password = trim($_POST["password"]);
            }

            if (empty($err)) {
                //login
                $username = $this->Employee->sanitize($username);
                $password = $this->Employee->sanitize($password);
                $sql = "SELECT * FROM `employees` WHERE `username` = '{$username}' AND `password` = '{$password}'";
                $query = $this->Employee->custom($sql);
                if (!$query) {
                    $login_err = "Invalid username or password.";
                    // echo "$login_err";
                    $this->set_template_variable('err',$login_err);
                } else {
                    $_SESSION["loggedIn"] = true;
                    $_SESSION["isEmployee"] = true;
                    $_SESSION["id"] = $query[0]['Employee']['employee_id'];
                    $_SESSION["username"] = $username;
                    $_SESSION["isManager"] = $query[0]['Employee']['is_manager'];
                }
            }
        }
        return true;
    }

    function index() {
    }

    function import() {
        $ingredients = $this->Employee->custom("SELECT * FROM `ingredients`");

        $this->set_template_variable('ingredients', $ingredients);
    }

    function processOrder() {
        session_start();

        // Check if the user is logged in, otherwise redirect to login page
        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
            if (isset($_SESSION["isEmployee"]) && $_SESSION["isEmployee"] === true) {

                // header("location: /employees/index.php");
                // exit;
                echo "is employee!\n";
            } else {
                header("location: /");
                exit;
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['orders'])) {
                $orders = $_POST['orders'];
                foreach ($orders as $order) {
                    print $order;
                    $update = $this->Employee->custom("UPDATE `orders` SET `status` = 1 WHERE `order_id` = $order");
                    if ($update) {
                        echo 'Order processing completed!\n';
                    } else {
                        echo 'Order processing failed\n';
                    }
                }
            }
        }
        $orders = $this->Employee->custom("SELECT * FROM `orders` WHERE `status` = 0 ");

        $this->set_template_variable('orders', $orders);

        return true;
    }

    function view($id = null) {
    }


    function afterAction() {
    }
}
