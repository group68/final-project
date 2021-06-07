<?php

class EmployeesController extends VanillaController {
    function beforeAction() {
    }

    function login() {
        session_start();

        // Check if the user is logged in, otherwise redirect to login page
        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
            if (isset($_SESSION["isEmployee"]) && $_SESSION["isEmployee"] === true) {

                if (isset($_SESSION["isManager"]) && $_SESSION["isManager"] === true) {
                    header("location: /admin");
                    exit();
                }
                header("location: /employees/processOrder");
                exit();
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
                $this->setTemplateVariable('err', $err);
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
                    $this->setTemplateVariable('err', $login_err);
                } else {
                    $_SESSION["loggedIn"] = true;
                    $_SESSION["isEmployee"] = true;
                    $_SESSION["id"] = $query[0]['Employee']['employee_id'];
                    $_SESSION["username"] = $username;
                    if ($query[0]['Employee']['is_manager']) {
                        $_SESSION["isManager"] = true;
                        header("location: /admin");
                        exit();
                    } else {
                        $_SESSION["isManager"] = false;
                        header("location: /employees/processOrder");
                        exit();
                    }
                }
            }
        }
        return true;
    }

    function index() {
    }

    function import() {
        session_start();

        if (isset($_SESSION['isEmployee']) && $_SESSION['isEmployee'] === true) {
            $complete = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $items = $_POST['quantity'];
                $flag = 0;
                foreach ($items as $item) {
                    if ($item > 0) {
                        $flag = 1;
                        break;
                    }
                }
                if ($flag == 0) {
                    $complete = "You can't order nothing!\n";
                    $this->setTemplateVariable('complete', $complete);
                } else {
                    $prices = $_POST['price'];
                    if ($this->Employee->importRequest($_SESSION["id"], $items, $prices)) {
                        $complete = "Order completed!";
                        $this->setTemplateVariable('complete', $complete);
                    } else {
                        http_response_code(500);
                    }
                }
            }
            $ingredients = $this->Employee->custom("SELECT * FROM `ingredients`");

            $this->setTemplateVariable('ingredients', $ingredients);

            return true;
        } else {
            header("location: /employees/login");
            exit();
        }
    }

    function processOrder() {
        session_start();
        echo $_SESSION['isManager'];

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
                    $update = $this->Employee->custom("UPDATE `orders` SET `status` = 1 WHERE `order_id` = $order ");
                    if ($update) {
                        echo 'Order processing completed!\n';
                    } else {
                        echo 'Order processing failed\n';
                    }
                }
            }
        }
        $id = $_SESSION['id'];
        $orders = $this->Employee->custom("SELECT * FROM `orders` WHERE `status` = 0 AND `employee_id` = $id");

        $this->setTemplateVariable('orders', $orders);

        return true;
    }

    function logOut() {
        session_start();
        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
            $_SESSION["loggedIn"] = false;
            $_SESSION["isEmployee"] = false;
            $_SESSION["isManager"] = false;
            $_SESSION["id"] = "";
            $_SESSION["username"] = "";
        }
        header("location: /employees/login");
        exit();
    }

    function view($id = null) {
    }


    function afterAction() {
    }
}
