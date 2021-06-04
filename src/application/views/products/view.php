<div class="content" style="text-align: center; padding: 5%">
    <img src="<?php echo $product['Product']['image_url'] ?>" alt="Product image" />
    <h2><strong><?php echo $product['Product']['NAME'] ?></strong></h2>
    <h2>Price: <?php echo $product['Product']['price'] ?>đ</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $product['Product']['product_id'] ?>" />
        <input type="number" name="quantity" class="txt-input" placeholder="Quantity" min=1 />
        <input type="submit" name="submitBtn" class="btn-home" value="Add to Cart" />
    </form>
</div>