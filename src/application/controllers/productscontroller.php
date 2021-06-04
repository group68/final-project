<?php

class ProductsController extends VanillaController
{
    function index()
    {
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
}
