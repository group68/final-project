<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
	<?php echo $html->includeCss("vendor/grid"); ?>
	<?php echo $html->includeCss("common"); ?>
	<?php echo $html->includeCss("admin"); ?>

</head>
<body>
<header>
	
		
            <nav>
                <div class="row">
					<div class="logo-div"> 
						<img src="../img/fflogo.png" alt="Omnifood logo" class="logo inline-element">
						<h3 class="logo inline-element title text-title">SE Restaurant</h3>
				</div>
                   

                    <ul class="main-nav js--main-nav">
                        <li><a href="#features">Food delivery</a></li>
                        <li class="text-primary"><a href="#features"><i class="fas fa-user-circle icon-small"></i>Hi, Dung</a></li>
                        <li><a href="#plans"></a></li>
                    </ul>
                    <a class="mobile-nav-icon js--nav-icon"><i class="ion-navicon-round"></i></a>
                </div>
            </nav>    
		       
            <!-- <div class="hero-text-box">
                <h1>
                    Goodbye junk food.<br>
                    Hello super healthy meals.
                </h1>
                <a class="btn btn-full js--scroll-to-plans" href="#">I’m hungry</a>
                <a class="btn btn-ghost js--scroll-to-start" href="#">Show me more</a>
            </div>            -->
        </header>	
	</div>



	<section class="section-features js--section-features" id="features">
            <div class="row">
                <h2>Restaurant Statistic</h2>
                <p class="long-copy">
                    Let see our revenues recently, take some modification on stratgy if needed
                </p>
            </div>            
            <div class="row card-container">
                <div class="col span-1-of-3 box card card-1">
                    <i class="ion-ios-infinite-outline icon-big"></i>
                    <h3>DAILY REVENUE</h3>
					<?php
                    echo "<p class='money-amount'> $revenues[0] </p>";
					?>
                </div>
                <div class="col span-1-of-3 box card card-2">
                    <i class="ion-ios-stopwatch-outline icon-big"></i>
                    <h3>WEEKLY REVENUE</h3>
					<?php
                    echo "<p class='money-amount'> $revenues[1] </p>";
					?>
                </div>
                <div class="col span-1-of-3 box card card-3">
                    <i class="ion-ios-nutrition-outline icon-big"></i>
					<h3>MONTHLY REVENUE</h3>
					<?php
                    echo "<p class='money-amount'> $revenues[2] </p>";
					?>
                </div>
            </div>            
        </section>
  
		
	</body>
</html>