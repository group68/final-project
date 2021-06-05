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

    public function submitOrder()
    {
    }
}
