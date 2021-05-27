<div>
    <?php foreach ($products as $product):?>
        <div class="product">
            <?php echo $html->link($product['Product']['NAME'], "/products/view/{$product['Product']['product_id']}") ?>
        </div>
    <?php endforeach?>
</div>