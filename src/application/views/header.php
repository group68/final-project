<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast-food restaurant</title>
    <!-- <script src="https://use.fontawesome.com/0e4620ce6a.js"></script> -->
    <script src="https://kit.fontawesome.com/9f89debcba.js" crossorigin="anonymous"></script>

    <?php echo $html->includeCss("common"); ?>
    <?php echo $html->includeCss("vendor/grid"); ?>
    <?php echo $html->includeCss("header"); ?>
    <?php echo $html->includeCss("footer"); ?>
    <?php echo $html->includeCss("searchbar"); ?>

    <?php echo $html->includeJsDeffered("header"); ?>

    <?php
foreach (${Template::CUSTOM_CSS_FILES} as $cssFile) {
    echo $html->includeCss($cssFile) . "\n";
}
?>
</head>

<body>
    <?php
if (isset($_SESSION['item_count'])) {
    $count_txt = $_SESSION['item_count'];
} else {
    $count_txt = 'CART';
}

?>
    <div id="navbar">
        <nav class="navbar-container container">
            <a href="/" class="home-link">
                <div class="logo-div">
                    <img src="/img/fflogo.png" class="logo inline-element">
                    <h3 class="logo inline-element title text-title">SE Restaurant</h3>
                </div>
            </a>

            <div class="search-container">
                <input id="search-input" class="search-input" type="search" placeholder="Search">
                <div id="search-result" class="search-result-container">
                    <p href="">AAAAAAAAAAAAAAAAAAAAAAAAAAAAA</p>
                    <a href="">B</a>
                    <a href="">C</a>
                    <a href="">D</a>
                    <a href="">E</a>
                </div>
            </div>

            <button type="button" class="navbar-toggle" aria-label="Open navigation menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-menu">
                <ul class="navbar-links">
                    <li class="navbar-item"><a class="navbar-link_customer" href="/">Home</a></li>
                    <li class="navbar-item"><a class="navbar-link_customer" href="/">Menu</a></li>
                    <?php
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
    if (isset($_SESSION['isEmployee']) && $_SESSION['isEmployee'] === true) {
        $username = htmlentities($_SESSION['username']);
        echo "<li class='navbar-item'><a href='#' class='navbar-link_customer'><i class='fas fa-user-circle icon-small'></i>Hi, {$username}</a></li>";
        echo "<li class='navbar-item'><a class='navbar-link_customer' href='/employees/logout'>Logout</a></li>";
    } else {
        echo "<li class='navbar-item'><a class='navbar-link_customer' href='/customer/logout'>Logout</a></li>";
    }

} else {
    echo "<li class='navbar-item'><a class='navbar-link_customer' href='/customer/login'>Login</a></li>";
}

?>
                    <li class="navbar-item"><a class="navbar-link_customer" href="/products/order"><i
                                class="fas fa-cart-plus mr-5"></i><?php echo ' ' . $count_txt ?></a></li>
                    <!-- <form id="demo-2" onsubmit="event.preventDefault();">
                        <input id="search-box" type="search" placeholder="Search">
                    </form> -->
                </ul>
            </div>
        </nav>
    </div>