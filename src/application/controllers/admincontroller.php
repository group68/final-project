<?php

class AdminController extends VanillaController
{
    function beforeAction()
    {
    }

    function index()
    {
        session_start();
        if (!$this->Admin->checkAdmin()) {
            header("Location: /employees/login");
            exit();
        }
        // $this->doNotRenderHeader = true;

        // $products = $this->Product->custom("SELECT `product_id`, `NAME` FROM `products`");

        // $this->set_template_variable('admin', );
        $admindata = $this->Admin->getData();
        $this->setTemplateVariable('admindata', $admindata);
        return true;
    }

    function view($id = null)
    {
        $product_id = $this->Product->sanitize($id);
        $products = $this->Product->custom("SELECT * FROM `products` WHERE `product_id` = {$product_id}");
        // if (count($products) > 0) {
        //     $this->set_template_variable('', $products[0]);
        // } else {
            
        // }
        
    }

    function requests() {
        session_start();
        if (!$this->Admin->checkAdmin()) {
            header("Location: /employees/login");
            exit();
        }
        $requests = $this->Admin->getRequests();
       
        $this->setTemplateVariable('requests', $requests);
        return true;
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


   
    function afterAction()
    {
    }
}
