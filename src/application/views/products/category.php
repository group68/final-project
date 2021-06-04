<div class="content">
    <div style="padding-top: 5%">
        <?php
        for ($i = 0; $i < count($products); $i += 3) {
            echo "<div class='row card-container'>";
            for ($j = 1; $j <= 3; $j++) {
                $idx = $i + $j - 1;
                if ($idx < count($products)) {
                    echo "<a href='/products/view/{$products[$idx]['Product']['product_id']}' style='color:white;'>";
                    echo "<div class='col span-$j-of-3 box card-home card-5'>";
                    echo "<img src='{$products[$idx]['Product']['image_url']}' alt='Product image' />";
                    echo "<h2><strong>{$products[$idx]['Product']['NAME']}</strong></h2>";
                    echo "<div><h2>Price: {$products[$idx]['Product']['price']}đ</h2></div>";
                    echo "</div>";
                    echo "</a>";
                }
            }
            echo "</div>";
        }
        ?>

    </div>
</div>