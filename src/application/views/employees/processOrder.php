<div>

<form method="POST">
    <? 
    if ($orders) {
        foreach ($orders as $order) :

            $current = $order['Order'];
            echo "id: " . $current['order_id']  . " cus_id: " . $current['customer_id'] . " time: " . $current['created_at'];
    ?>
    <br><input type="checkbox" value="<?echo $current['order_id']?>" name="orders[]">
        <? endforeach ?>
        <br><input type="submit" value="Click To Submit">
        <input type="reset" value="Reset">
    <? } else {
        echo "no order!\n";
    } ?>
</form>
</div>