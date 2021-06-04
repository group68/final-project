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
                <h2>Get food fast &mdash; not fast food.</h2>
                <p class="long-copy">
                    Hello, we’re Omnifood, your new premium food delivery service. We know you’re always busy. No time for cooking. So let us take care of that, we’re really good at it, we promise!
                </p>
            </div>            
            <div class="row card-container">
                <div class="col span-1-of-3 box card card-1">
                    <i class="ion-ios-infinite-outline icon-big"></i>
                    <h3>Up to 365 days/year</h3>
                    <p>
                        Never cook again! We really mean that. Our subscription plans include up to 365 days/year coverage. You can also choose to order more flexibly if that's your style.
                    </p>
                </div>
                <div class="col span-1-of-3 box card card-2">
                    <i class="ion-ios-stopwatch-outline icon-big"></i>
                    <h3>Ready in 20 minutes</h3>
                    <p>
                        You're only twenty minutes away from your delicious and super healthy meals delivered right to your home. We work with the best chefs in each town to ensure that you're 100% happy.
                    </p>
                </div>
                <div class="col span-1-of-3 box card card-3">
                    <i class="ion-ios-nutrition-outline icon-big"></i>
                    <h3>100% organic</h3>
                    <p>
                        All our vegetables are fresh, organic and local. Animals are raised without added hormones or antibiotics. Good for your health, the environment, and it also tastes better!
                    </p>
                </div>
            </div>            
        </section>
  
		
	</body>
</html>