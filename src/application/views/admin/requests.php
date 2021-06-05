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

        <?php console_log($requests) ?>
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
    </header>

request

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