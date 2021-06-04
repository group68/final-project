<?php

class EmployeesController extends VanillaController {
    function beforeAction() {
    }

    function login() {
        session_start();

        // Check if the user is logged in, otherwise redirect to login page
        if (isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === true) {
            if (isset($_SESSION["isemployee"]) || $_SESSION["isemployee"] === true) {
                header("location: /employees/index.php");
                exit;
            }
            header("location: /products/index.php");
        }
        // Define variables and initialize with empty values
        $username = $password = "";
        $username_err = $password_err = $login_err = "";

        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Check if username is empty
            if (empty(trim($_POST["username"]))) {
                $username_err = "Please enter username.";
            } else {
                $username = trim($_POST["username"]);
            }

            // Check if password is empty
            if (empty(trim($_POST["password"]))) {
                $password_err = "Please enter your password.";
            } else {
                $password = trim($_POST["password"]);
            }
        }
        if (empty($username_err) && empty($password_err)) {
            //login
        }
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
