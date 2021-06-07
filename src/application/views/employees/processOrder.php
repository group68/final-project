<div class="body-container p-base">
    <div class="row">
        <h2>All orders you've not processed</h2>
        <p>
            Let check the orders and accept if all the products are available.
        </p>
    </div>
    <div>
        <form method="POST">
            <table id="customers" class="plr-15 mt-15 shadow-box">
                <tr>
                    <th>OK</th>
                    <th>OrderID</th>
                    <th>CustomerID</th>
                    <th>Created at</th>
                    <th>Details</th>
                </tr>
                <?
                if ($orders) {
                    foreach ($orders as $order) :

                        $current = $order['Order'];
                        echo "<tr>";
                        echo "<td><input type='checkbox' value='<?echo {$current["order_id"]}?>' name='orders[]'></td>";
                        echo "<td>{$current['order_id']}</td>";
                        echo "<td>{$current['customer_id']}</td>";
                        echo "<td>{$current['created_at']}</td>";
                        echo "<td>";
                        echo "<a href='/employees/orderDetail/{$current['order_id']}'>";
                        echo "See more";
                        echo "</a>";
                        echo "</td>";
                        echo "</tr>";
                        // echo "id: " . $current['order_id'] . " cus_id: " . $current['customer_id'] . " time: " .
                ?>
                    <?php endforeach ?>
                    <br><input type="submit" value="Process">
                    <input type="reset" value="Reset" class="btn btn-secondary">
                <? } else {
                    echo "You currently have no order assigned!\n";
                } ?>
            </table>

        </form>
    </div>
</div>