<?php

class ProductsController extends VanillaController
{
    function beforeAction()
    {
    }

    function view($id = null)
    {
        $product_id = $this->Product->sanitize($id);
        $product = $this->Product->custom("SELECT * FROM `products` WHERE `product_id` = {$product_id}");
        if (count($product) > 0) {
            $product = $product[0];
        } else {
            
        }

        $this->set_template_variable('product', $product);
    }


    function afterAction()
    {
    }
}
