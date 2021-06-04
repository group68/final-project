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
        $revenues = [130000000, 7890000000, 9099999999];
        $increasing_amount = [7, 8, 9];
        $this->set_template_variable('revenues', $revenues);
        $this->set_template_variable('increasing_amount', $increasing_amount);
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
   
    function afterAction()
    {
    }
}
