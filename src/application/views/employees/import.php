<div style="padding: 5%;">
<div>
    <!-- <form method="POST">
        <?php foreach ($ingredients as $ingredient) : ?>
            <div class="ingredient">
                <?php
                $current = $ingredient['Ingredient'];
                echo $current['ingredient_id'] . "\t" . $current['name'] . "\t" . $current['quantity'] . "\t" . $current['price_unit'];
                echo '<input type="checkbox" value ="' . $current['ingredient_id'] . '" name = "id[]"/>';
                echo '<input type="number" min="0" pattern="\d*" name = "quantity"/>';
                echo '<br>'; ?>

            </div>
        <?php endforeach ?>
        <br><input type="submit" value="Click To Submit">
        <input type="reset" value="Reset">
    </form> -->

    <?php foreach ($ingredients as $ingredient) :
        $current = $ingredient['Ingredient'];
    ?>
        <div class="ingredient">
            <form method="post">
                <div class="product-tile-footer">
                    <div class="product-title"><?php echo $current["name"]; ?></div>
                    <div class="product-price"><?php echo "$" . $current["price_unit"]; ?></div>
                    <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
                </div>
            <?php endforeach ?>
        </div>