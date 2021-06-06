<?php echo $html->includeCss("common"); ?>
<?php echo $html->includeCss("admin"); ?>
<?php echo $html->includeCss("requests"); ?>
<?php
    function console_log($output, $with_script_tags = true)
    {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
            ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }
    
    ?>
    <?php console_log($request_detail); ?>
<div class="request-detail">
<div class="row">
            <h2>Importment request detail</h2>
            <p class="long-copy">
                Let see our importment request detail
            </p>
        </div>
    <table id="customers" class="plr-15 mt-15 shadow-box">
            <tr>
                <th>Request ID</th>
                <th>Ingredient ID</th>
                <th>Ingredient Name</th>
                <th>Requested Qty</th>
                <th>Remain Qty</th>
                <th>Unit Price</th>
                <th>Total Money</th>
            </tr>
            <?php 
            foreach ($request_detail as $item) {
                $total_price = ($item['Request_detail']['qty_request'] * $item['Request_detail']['unit_price']);
                echo "<tr>";
                echo "<td>{$item['Request_detail']['request_id']}</td>";
                echo "<td>{$item['Request_detail']['id']}</td>";
                echo "<td>{$item['Request_detail']['name']}</td>";
                echo "<td>{$item['Request_detail']['qty_request']}</td>";
                echo "<td>{$item['Request_detail']['qty_remain']}</td>";
                echo "<td>{$item['Request_detail']['unit_price']}</td>";
                echo "<td>{$total_price}</td>";
                echo"</tr>";
            }
            ?>
        </table>
</div>
This is request detail