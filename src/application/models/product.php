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

    public function submitOrder($customer_id, $carts)
    {
        if ($customer_id) {
            $query = "CALL add_new_order($customer_id, @em_id, @ord_id);";
            $result = $this->custom($query);
            if (!$result)
                return false;

            $ord_result = $this->custom2("SELECT @ord_id as order_id;");
            if (!$ord_result)
                return false;

            $row = $ord_result->fetch_assoc();
            $ord_id = $row['order_id'];

            foreach ($carts as $k => $v) {
                $cart_item_query = "INSERT INTO `order_items`(
                    `product_id`,
                    `order_id`,
                    `quantity`,
                    `unit_price`
                )
                VALUES(
                    $k,
                    $ord_id,
                    {$v['quantity']},
                    {$v['price']}
                );";

                // echo $cart_item_query . "<br />";
                $res = $this->custom($cart_item_query);
                if (!$res)
                    return false;
            }
            return true;
        }
    }
}
