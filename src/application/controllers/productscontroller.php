<?php

class ProductsController extends VanillaController
{
    function index()
    {
        session_start();

        // $products = $this->Product->custom("SELECT `product_id`, `NAME` FROM `products`");
        $categories = $this->Product->categories;
        $imgs = $this->Product->getCategoryImg();
        if (!$categories) {
            return false;
        }

        $this->set_template_variable('categories', $categories);
        $this->set_template_variable('imgs', $imgs);
        return true;
    }

    function view($id = null)
    {
        session_start();
        // session_destroy();
        if (!empty($_POST["submitBtn"])) {

            $itemArray = array($_POST["id"] => $_POST["quantity"]);
            // echo $itemArray[$_POST["id"]];
            if (!isset($_SESSION["cart_item"])) {
                $_SESSION["cart_item"] = $itemArray;
            } else {
                if (in_array($_POST['id'], array_keys($_SESSION["cart_item"]))) {
                    $_SESSION["cart_item"][$_POST['id']] += $_POST["quantity"];
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                }
            }
            if (!isset($_SESSION["item_count"]))
                $_SESSION["item_count"]  = $_POST["quantity"];
            else
                $_SESSION["item_count"]  += $_POST["quantity"];

            // echo $_SESSION["cart_item"][$_POST["id"]];
            // echo $_SESSION["item_count"];
        }

        $product_id = $this->Product->sanitize($id);
        $products = $this->Product->custom("SELECT * FROM `products` WHERE `product_id` = {$product_id}");

        if (!$products) {
            return false;
        }

        if (count($products) > 0) {
            $this->set_template_variable('product', $products[0]);
        } else {
            return false;
        }

        return true;
    }

    function category($id = null)
    {
        session_start();

        $cate_id = $this->Product->sanitize($id);
        $products = $this->Product->custom("SELECT * FROM `products` WHERE `category` = {$cate_id}");

        if (!$products) {
            return false;
        }

        if (count($products) > 0) {
            $this->set_template_variable('products', $products);
        } else {
            return false;
        }

        return true;
    }

    function order()
    {
        session_start();

        $products = array();
        if (isset($_SESSION['item_count'])) {
            foreach ($_SESSION['cart_item'] as $k => $v) {
                $prod = $this->Product->custom("SELECT * FROM `products` WHERE `category` = {$k} LIMIT 1");
                if ($prod) {
                    $cart_item = array($k => array('name' => $prod[0]['Product']['NAME'], 'image_url' => $prod[0]['Product']['image_url'], 'price' => $prod[0]['Product']['price'], 'quantity' => $v));
                    $products = array_merge($products, $cart_item);
                }
            }
        }

        $this->set_template_variable('products', $products);
        return true;
    }
}
