<?php
class CustomerController extends VanillaController
{
    function login()
    {
        session_start();

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
                $username = $this->Customer->sanitize($username);
                $password = $this->Customer->sanitize($password);
                $sql = "SELECT * FROM `customers` WHERE `username` = '{$username}' AND `password` = '{$password}'";
                $query = $this->Customer->custom($sql);
                if (!$query) {
                    $login_err = "Invalid username or password.";
                    echo "$login_err";
                } else {
                    $_SESSION["loggedIn"] = true;
                    $_SESSION["isCustommer"] = true;
                    $_SESSION["id"] = $query[0]['Customer']['customer_id'];
                    $_SESSION["username"] = $username;
                }
            }
        }
        return true;
    }
}
