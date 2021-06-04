<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- <script>console_log('a string');</script> -->
    <?php echo $html->includeCss("vendor/grid"); ?>
    <?php echo $html->includeCss("common"); ?>
    <?php echo $html->includeCss("admin"); ?>

</head>

<body>
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

    <header>

        <?php console_log($admindata) ?>
        <nav>
            <div class="row">
                <div class="logo-div">
                    <img src="../img/fflogo.png" alt="Omnifood logo" class="logo inline-element">
                    <h3 class="logo inline-element title text-title">SE Restaurant</h3>
                </div>


                <ul class="main-nav js--main-nav">
                    <li><a href="#revenue-session">Statistic</a></li>
                    <li><a href="#customer-sesion">Customers</a></li>
                    <li><a href="#best-sellers-session">Products</a></li>
                    <li class="text-primary"><a href="#features"><i class="fas fa-user-circle icon-small"></i>Hi, Dung</a></li>
                    <li><a href="#plans"></a></li>
                </ul>
                <a class="mobile-nav-icon js--nav-icon"><i class="ion-navicon-round"></i></a>
            </div>
        </nav>

        <div id="best-sellers-session" class="row best-sellers">
            <h2>BEST-SELLERS</h2>
            <p class="long-copy">
                Let see our best-sellers this week
            </p>
        </div>

        <div class="row best-sellers">
            <?php foreach ($admindata->best_sellers as  $key => $best_seller) : ?>
                <?php console_log($key);
                if ($key % 3 == 0) echo "<div class = row>"; ?>
                <div class="col span-1-of-3 box">
                    <div class="product-card shadow-box">
                        <div class="product-link">
                            <?php echo $html->link($best_seller['Product']['NAME'], "/products/view/{$best_seller['Product']['product_id']}") ?>
                            <?php echo "<div class='sold-count'>{$best_seller['A']['purchase_count']} sold!</div>" ?>
                        </div>

                        <div class="row center-inline-block">

                            <img src="<?php echo $best_seller['Product']['image_url'] ?>" alt="Product image" class="product-img" />

                        </div>
                    </div>
                </div>
                <?php
                if ($key % 3 == 2) echo "</div>"; ?>
            <?php endforeach ?>
        </div>
        </div>
    </header>
    </div>



    <section class="section-features js--section-features" id="revenue-session">
        <div class="row">
            <h2>REVENUE STATISTICS</h2>
            <p class="long-copy">
                Let see our revenue statistic of our restaurent, make some modification on strategy if needed
            </p>
        </div>
        <div class="row card-container">
            <div class="col span-1-of-3 box card card-1">
                <i class="ion-ios-infinite-outline icon-big"></i>
                <h3>DAILY REVENUE</h3>
                <?php
                echo "<p class='money-amount'>{$admindata->revenues[0]} </p>";
                echo "<div><i class='fas fa-level-up-alt inline-element '></i> {$admindata->increasing_amount[0]} %";
                echo "<i class='fas fa-level-down-alt inline-element ml-15'></i> {$admindata->decreasing_amount[1]} %</div>";
                ?>
            </div>
            <div class="col span-1-of-3 box card card-2">
                <i class="ion-ios-stopwatch-outline icon-big"></i>
                <h3>WEEKLY REVENUE</h3>
                <?php
                echo "<p class='money-amount'> {$admindata->revenues[1]} </p>";
                echo "<div><i class='fas fa-level-up-alt inline-element'></i> {$admindata->increasing_amount[1]} %";
                echo "<i class='fas fa-level-down-alt inline-element ml-15'></i> {$admindata->decreasing_amount[1]} %</div>";
                ?>
            </div>
            <div class="col span-1-of-3 box card card-3">
                <i class="ion-ios-nutrition-outline icon-big"></i>
                <h3>MONTHLY REVENUE</h3>
                <?php
                echo "<p class='money-amount'> {$admindata->revenues[2]} </p>";
                echo "<div><i class='fas fa-level-up-alt inline-element'></i> {$admindata->increasing_amount[2]} %";
                echo "<i class='fas fa-level-down-alt inline-element ml-15'></i> {$admindata->decreasing_amount[1]} %</div>";
                ?>
            </div>
        </div>
    </section>

    <section class="section-testimonials js--section-features p-base" id="customer-sesion">
        <div class="row">
            <h2>FAVOURITE CUSTOMERS</h2>
            <p class="long-copy">
                Let see our favourite customers, great power comes with grear responsibility
            </p>
        </div>
        <table id="customers" class="plr-15 mt-15 shadow-box">
            <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Total money</th>
            </tr>
            <?php foreach ($admindata->favourite_customers as $customer) : ?>
                <?php
                $cust = $customer['Favo_customer'];
                echo "<tr>";
                foreach ($cust as $attr) :
                    echo " <td>{$attr}</td>";
                endforeach;
                echo "</tr>";
                ?>
            <?php endforeach ?>
        </table>

    </section>
	<footer>
            <div class="row footer">
                <div class="col span-1-of-2">
                    <ul class="footer-nav">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">iOS App</a></li>
                        <li><a href="#">Android App</a></li>
                    </ul>
                </div>
                <div class="col span-1-of-2">
                    <ul class="social-links">
                        <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus-square"></i></a></li>
                        <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram-square"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <p>
                    Copyright &copy; 2021 by Group-68. All rights reserved.
                </p>
            </div>            
        </footer>
</body>

</html>