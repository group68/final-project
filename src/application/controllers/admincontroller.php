<?php

class AdminController extends VanillaController
{
    function beforeAction()
    {
    }

    function index()
    {
          $this->doNotRenderHeader = true;

        // $products = $this->Product->custom("SELECT `product_id`, `NAME` FROM `products`");

        // $this->set_template_variable('admin', );
        
        return true;
    }

    function view($id = null)
    {
        $product_id = $this->Product->sanitize($id);
        $products = $this->Product->custom("SELECT * FROM `products` WHERE `product_id` = {$product_id}");
        if (count($products) > 0) {
            $this->set_template_variable('product', $products[0]);
        } else {
            
        }
    }
   
    function afterAction()
    {
    }
}
