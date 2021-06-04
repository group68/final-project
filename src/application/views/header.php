<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast-food restaurant</title>

    <?php echo $html->includeCss("header"); ?>
    <?php echo $html->includeCss("footer"); ?>
    <?php echo $html->includeCss("home"); ?>
    <?php echo $html->includeJsDeffered("header"); ?>
</head>

<body>
    <header id="navbar">
        <nav class="navbar-container container">
            <a href="/" class="home-link">
                <div class="navbar-logo"></div>
                SE-FastFood
            </a>
            <button type="button" class="navbar-toggle" aria-label="Open navigation menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-menu">
                <ul class="navbar-links">
                    <li class="navbar-item"><a class="navbar-link" href="">Home</a></li>
                    <li class="navbar-item"><a class="navbar-link" href="">Menu</a></li>
                    <li class="navbar-item"><a class="navbar-link" href="">Order</a></li>
                    <li class="navbar-item"><a class="navbar-link" href="">Login</a></li>
                </ul>
            </div>
        </nav>
    </header>