<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Weather Company</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>


	<body>
		
		<div class="site-content">
			<div class="site-header">
				<div class="container">
					<a href="index.php" class="branding">
						<img src="images/logo.png" alt="" class="logo">
						<div class="logo-type">
							<h1 class="site-title">Contact</h1>
							<small class="site-description">FRESI DELATTRE DANEL</small>
						</div>
					</a>

					<!-- Default snippet for navigation -->
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item"><a href="index.php">Home</a></li>
							<li class="menu-item"><a href="news.html">News</a></li>
							<li class="menu-item"><a href="clientPage.php">Client</a></li>
							<li class="menu-item"><a href="historique.php">Historique</a></li>
							<li class="menu-item"><a href="photos.html">Photos</a></li>
							<li class="menu-item current-menu-item"><a href="contact.php">Contact</a></li>
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>

				</div>
			</div> <!-- .site-header -->

			<main class="main-content">
				<div class="container">
					<div class="breadcrumb">
						<a href="index.php">Home</a>
						<span>Contact</span>
					</div>
				</div>

				<div class="fullwidth-block">
					<div class="container">
						<div class="col-md-5">
							<div class="contact-details">
								<div class="map" data-latitude="49.87611059357717" data-longitude="2.30148967969513"></div>
								<div class="contact-info">
									<address>
										<img src="images/icon-marker.png" alt="">
										<p>La Providence, Amiens <br>
											146 Boulevard de Saint-Quentin 80094 AMIENS cedex 3, 80000 Amiens</p>
									</address>
									
									<a href="#"><img src="images/icon-phone.png" alt="">+1 800 314 235</a>
									<a href="#"><img src="images/icon-envelope.png" alt="">mfresi@la-providence.net</a>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-md-offset-1">
							<h2 class="section-title">Nous contacter</h2>
							<p>Si vous le souhaitez vous pouvez envoyer un mail au developpeur du site ou de la monnaie ça serait cool merci bisous ;)</p>
							<form action="" class="contact-form" method="POST">
								<div class="row">
									<div class="col-md-6"><input type="text" name="nom" placeholder="Votre nom..."></div>
									<div class="col-md-6"><input type="text" name="mail" placeholder="Adresse mail..."></div>
								</div>
								<div class="row">
									<div class="col-md-6"><input type="text" placeholder="prenom..."></div>
									<div class="col-md-6"><input type="text" placeholder="telephone..."></div>
								</div>
								<textarea name="message" placeholder="Message..."></textarea>
								<div class="text-right">
									<input type="submit" name="envoyer" placeholder="Send message">
								</div>
							</form>

						</div>
					</div>
				</div>
				
			</main> <!-- .main-content -->

			<footer class="site-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<form action="#" class="subscribe-form">
								<input type="text" placeholder="Enter your email to subscribe...">
								<input type="submit" value="Subscribe">
							</form>
						</div>
						<div class="col-md-3 col-md-offset-1">
							<div class="social-links">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
								<a href="#"><i class="fa fa-pinterest"></i></a>
							</div>
						</div>
					</div>

					<p class="colophon">Copyright 2020 Company freso. Designed by Rency. All rights reserved</p>
				</div>
			</footer> <!-- .site-footer -->
		</div>
		
		<script src="js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>

<?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "mattei.fresi@hotmail.fr";
    $to = "mfresi@la-providence.net";
    $subject = "Essai de PHP Mail";
    $message = "PHP Mail fonctionne parfaitement";
	$headers = "De :" . $from;
	
	if (isset($_POST['envoyer']))
	{
		mail($to,$subject,$message, $headers);
    	echo "L'email a été envoyé.";
	}
?>