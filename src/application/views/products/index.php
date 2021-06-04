<div class="content">
    <img id='thumb-img' src="/img/banner.jpg" />
    <div style="display: flex; justify-content: center">
        <h1 style="color: orange; font-size: 12vh">MENU</h1>
    </div>

    <?php foreach ($categories as $key => $value) : ?>
        <div class="card-container">
            <div class="span-1-of-3 box card-home" style="background: radial-gradient(#de7b26, #ffb42c);">
                <img src="<?php echo $imgs[$key] ?>" alt="<?php echo $key ?>" />
                <a style="color: white; font-size:2em;" href="<?php echo "/products/category/{$value}" ?>"><?php echo $key ?></a>
            </div>
        </div>
    <?php endforeach ?>
</div>