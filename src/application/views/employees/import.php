<div style="padding: 15%;">
    <div>

        <? if (isset($complete)) {
            echo $complete;
        } ?>

        <?php foreach ($ingredients as $ingredient) :
            $current = $ingredient['Ingredient'];
        ?>
            <div class="ingredient">
                <form method="post">
                    <div><?php echo $current["name"]; ?></div>
                    <div><?php echo "$" . $current["price_unit"]; ?></div>
                    <input type="number" name="quantity[]" value="0" min="0" step="1" size="2" />
                    <input type="hidden" name ="price[]" value="<?echo $current["price_unit"]?>"/>
                <?php endforeach ?>
                <br>
                <input type="submit" value="Order ingredients" />
                </form>
            </div>
    </div>
</div>