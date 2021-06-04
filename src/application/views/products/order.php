<div style="padding-top: 5%;">
    <?php foreach ($products as $k => $v) : ?>
        <div style="display: flex; flex-direction:row; justify-content: space-between; padding: 5vh">
            <img src="<?php echo $v['image_url'] ?>" style="width: 30vh" />
            <p><?php echo $v['name'] ?></p>
            <p><?php echo $v['price'] ?></p>
            <p><?php echo $v['quantity'] ?></p>
        </div>
    <?php endforeach ?>
</div>