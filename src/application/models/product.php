<?php

class Product extends VanillaModel
{
    public $categories = array(
        "CHICKEN" => 1,
        "DESSERT" => 2,
        "DRINKS" => 3,
        "RICE DISKS" => 4,
        "LIGHT FOOD" => 5,
        "BURGERS" => 6
    );

    public function getCategoryImg()
    {
        $imgs = array();
        foreach ($this->categories as $k => $v) {
            $pic = $this->custom("SELECT `image_url` FROM `products` WHERE `category`=$v LIMIT 1");
            if ($pic)
                $imgs[$k] = $pic[0]['Product']['image_url'];
            else
                $imgs[$k] = '';
        }

        return $imgs;
    }

    public function submitOrder($customer_id)
    {
        if ($customer_id) {
            //get employees which work least
            $employee_id = null;
            //create order
            $query = "INSERT INTO `orders`(
                `order_id`,
                `customer_id`,
                `employee_id`,
                `status`
            )
            VALUES(
                0,
                $customer_id,
                $employee_id,
                '0'
            )";
        }
    }
}
