<div class="content">
    <img id='thumb-img' src="/img/banner.jpg" />
    <div style="display: flex; justify-content: center">
        <h1 style="color: orange; font-size: 12vh">MENU</h1>
    </div>
    <div style="display: flex; justify-content: center">

        <?php foreach ($categories as $key => $value) : ?>
            <div class="card-container">
                <a style="color: white; font-size:2em;" href="<?php echo "/products/category/{$value}" ?>">
                    <div class="span-1-of-3 box card-home card-5">
                        <img src="<?php echo $imgs[$key] ?>" alt="<?php echo $key ?>" />
                        <p><?php echo $key ?></p>
                    </div>
                </a>
            </div>
        <?php endforeach ?>
    </div>
</div>