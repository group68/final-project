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
            } else {
                header("location: /");
                exit;
            }
        }
        // Define variables and initialize with empty values
        $username = $password = "";
        $username_err = $password_err = $login_err = "";

        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Check if username is empty
            if (empty(trim($_POST["username"]))) {
                $username_err = "Please enter username.";
                echo $username_err;
            } else {
                $username = trim($_POST["username"]);
            }

            // Check if password is empty
            if (empty(trim($_POST["password"]))) {
                $password_err = "Please enter your password.";
                echo $password_err;
            } else {
                $password = trim($_POST["password"]);
            }

            if (empty($username_err) && empty($password_err)) {
                //login
                $username = $this->Employee->sanitize($username);
                $password = $this->Employee->sanitize($password);
                $sql = "SELECT * FROM `employees` WHERE `username` = '{$username}' AND `password` = '{$password}'";
                $query = $this->Employee->custom($sql);
                if (!$query) {
                    $login_err = "Invalid username or password.";
                    echo "$login_err";
                } else {
                    $_SESSION["loggedIn"] = true;
                    $_SESSION["isEmployee"] = true;
                    $_SESSION["id"] = $query[0];
                    $_SESSION["username"] = $username;
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

    function view($id = null) {
    }


    function afterAction() {
    }
}
