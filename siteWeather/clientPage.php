<?php include('include/client.php'); ?>
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
						<h1 class="site-title">Client</h1>
						<small class="site-description">FRESI DELATTRE DANEL</small>
					</div>
				</a>

				<!-- Default snippet for navigation -->
				<div class="main-navigation">
					<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
					<ul class="menu">
						<li class="menu-item"><a href="index.php">Home</a></li>
						<li class="menu-item"><a href="news.html">News</a></li>
						<li class="menu-item current-menu-item"><a href="clientPage.php">Client</a></li>
						<li class="menu-item"><a href="historique.php">Historique</a></li>
						<li class="menu-item"><a href="photos.html">Photos</a></li>
						<li class="menu-item"><a href="contact.php">Contact</a></li>
					</ul> <!-- .menu -->
				</div> <!-- .main-navigation -->

				<div class="mobile-navigation"></div>

			</div>
		</div> <!-- .site-header -->

		<main class="main-content">
			<div class="container">
				<div class="breadcrumb">
					<a href="index.php">Home</a>
					<span>Client</span>
				</div>
			</div>

			<div class="fullwidth-block">
				<div class="container">
					<h4><u>Obtenir la temperature : </u></h4>
				</div>
				<!--Emplacement Formulaire-->
				<div class="row">
					<div class="startServ col-md-4 col-sm-6">
						<form action="" method="post" value="2">
							<input type="HIDDEN" name="startServer" value="" />
							<input type="submit" value="Lancer le serveur" />
						</form>
					</div>
					<div class="temperatureC col-md-4 col-sm-6">
						<button style="border: none;background: #009ad8;padding: 10px 20px;border-radius: 30px;color: white;" onclick="getRandomDegre()">Demander la temperature en °C</button>
					</div>

					<div class="temperatureF col-md-4 col-sm-6">

						<button style="border: none;background: #009ad8;padding: 10px 20px;border-radius: 30px;color: white;" onclick="getRandomFaren()">Demander la temperature en Farenheit</button>
					</div>

					<div class="arretServ col-md-4 col-sm-6">
						<form action="" method="post" value="2">
							<input type="HIDDEN" name="stopServer" value="Ts" />
							<input type="submit" value="Arreter le serveur" />
						</form>
					</div>

					<div class="affichageResult col-md-4 col-sm-6">
					<?php

							if (isset($_POST['stopServer']))
							{
								echo "serveur bien close";
							}
								echo "<div id='temp'><div>";

						if (isset($_POST['startServer']))
						{
							function execInBackground($cmd) {
								if (substr(php_uname(), 0, 7) == "Windows"){
									pclose(popen("start /B ". $cmd, "r")); 
								}
								else {
									exec($cmd . " > /dev/null &");
								}
							}
							
							execInBackground('Z:/TP3meteo/Debug/TP3meteo.exe');
						}
						?>
					</div>
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

			<p class="colophon">Copyright 2020 Company Freso. Designed by Rency. All rights reserved</p>
		</div>
	</footer> <!-- .site-footer -->
	</div>

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/app.js"></script>

</body>

</html>

<script>

function getRandomDegre(){
	//pour appeler une API on utilise la méthode fetch()
	fetch('include/api_meteo_degre.php').then((resp) => resp.json())
	.then(function(data) {
		// data est la réponse http de notre API.
		console.log(data);
		UpdateDivDegre("temp",data);
	})
	.catch(function(error) {
		// This is where you run code if the server returns any errors
		//console.log(error);
	});
}

function getRandomFaren(){
	//pour appeler une API on utilise la méthode fetch()
	fetch('include/api_meteo_faren.php').then((resp) => resp.json())
	.then(function(data) {
		// data est la réponse http de notre API.
		console.log(data);
		UpdateDivFaren("temp",data);
	})
	.catch(function(error) {
		// This is where you run code if the server returns any errors
		//console.log(error);
	});
}

function UpdateDivDegre(id,text){
	var e = document.getElementById(id).innerHTML = "La temperature est de " + text + " °C";
	if (text == false)
	{
		var e = document.getElementById(id).innerHTML = "le serveur n'est pas lancé";
	}
}

function UpdateDivFaren(id,text){
	var e = document.getElementById(id).innerHTML = "La temperature est de " + text + " F";
	if (text == false)
	{
		var e = document.getElementById(id).innerHTML = "le serveur n'est pas lancé";
	}
}

</script>