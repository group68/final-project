<div class="content">
    <img id='thumb-img' src="/img/banner.jpg" />
    <div style="display: flex; justify-content: center">
        <h1 style="color: orange; font-size: 2em">MENU</h1>
    </div>
    <?php foreach ($products as $product) : ?>
        <div class="product">
            <?php echo $html->link($product['Product']['NAME'], "/products/view/{$product['Product']['product_id']}") ?>
        </div>
    <?php endforeach ?>
</div>