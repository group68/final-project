
<?php


class adminData  {
    var $revenues = array();
    var $increasing_amount = array();
    var $decreasing_amount = array();
    var $best_sellers;
    var $favourite_customers;

    function __construct($revenue, $increasing_amount, $decreasing_amount, $best_sellers, $favourite_customers) {
        $this->revenues = $revenue;
        $this->increasing_amount = $increasing_amount;
        $this->decreasing_amount = $decreasing_amount;
        $this->best_sellers = $best_sellers;
        $this->favourite_customers = $favourite_customers;
      }
}

class Admin extends VanillaModel
{
    var $abstract = true;

    function getBestSeller() {
        $best_sellers_query = "SELECT
        *
    FROM
        products
    INNER JOIN(
        SELECT
            oi.product_id AS `product_id`,
            SUM(oi.quantity) AS `purchase_count`
        FROM
            `order_items` AS oi
        INNER JOIN `orders` AS o
        ON
            oi.order_id = o.order_id
        WHERE
            TIMESTAMPDIFF(DAY, o.created_at, NOW()) <= 7
        GROUP BY
            oi.product_id
        ORDER BY
            SUM(oi.quantity)) AS a
        ON
            products.product_id = a.product_id limit 5";


        $best_sellers = $this->custom($best_sellers_query);
        // console_log($best_sellers);
        return $best_sellers;
        
    }

    function getFavouriteCustomers() {
        $query = "SELECT
        *
        from
        (SELECT
                cust.username,
                cust.name,
                cust.phone,
                cust.address,
                SUM(oi.unit_price * oi.quantity) as total_money
            FROM
                customers AS cust
            INNER JOIN orders AS o
            ON
                cust.customer_id = o.customer_id
            INNER JOIN order_items AS oi
            ON
                o.order_id = oi.order_id
            GROUP BY
                cust.customer_id
            ORDER BY
                SUM(oi.unit_price * oi.quantity)
            DESC
            LIMIT 10) as favo_customer";
    $cust = $this->custom($query);
    // console_log($best_sellers);
    return $cust;

    }
    function getData() {
        $revenues_ = [130000000, 7890000000, 9099999999];
        $increasing_amount_ = [7, 8, 9];
        $decreasing_amount_ = [0, 0, 0];
        $best_sellers_ = $this->getBestSeller();
        $favourite_customers_ = $this->getFavouriteCustomers();
        return new adminData($revenues_, $increasing_amount_, $decreasing_amount_, $best_sellers_, $favourite_customers_);
    }    
}
