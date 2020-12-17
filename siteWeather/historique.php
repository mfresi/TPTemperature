<?php 
include("include/user.php");
?>
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
							<h1 class="site-title">Historique</h1>
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
							<li class="menu-item current-menu-item"><a href="historique.php">Historique</a></li>
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
						<span>Historique</span>
					</div>
				</div>
				

				<div class="fullwidth-block">
					<div class="container">
						<div class="row">
							<div class="content col-md-8">
                                <div class="container">
					                <h4><u>Historique des températures : </u></h4>
								</div>
								<div class="container">
								<form action="" method="POST">
									<input type="number" class="fadeIn first" name="value" placeholder="Valeur de départ">
									<input type="submit" class="fadeIn fourth" name="do"value="Valeur">
								</form>
								</div>
<?php
	if(isset($_POST['do']) && $_POST['value']>=0)
	{
    $sql = "SELECT * FROM `temperature` LIMIT 10 OFFSET ".$_POST['value']."";
    $i=0;

    ?>

    <table>
    <tr>
        <th> Id </th>
        <th> Température(en °C) </th>
        <th> Température(en °F) </th>
        <th> Date </th>
    </tr>

    <?php
    foreach($db->query($sql) as $row){
    ?>
        <tr>
            <td><?php
            print $row['id'] . "\t \n";?></td>
            <td><?php
            print $row['tempC'] . "\t \n";?></td>
            <td><?php
            print $row['tempF'] . "\t \n";?></td>
            <td><?php
            print $row['date'] . "\t \n";?></td>
        </tr>
        <?php
		$i++;
    }
    ?>
    </table>
    <?php
    
        echo "$i températures de ".($_POST['value']+1)." à ".($_POST['value']+10)." sont affichées";

}else{
	echo "Erreur de saisie, veuillez saisir un nombre positif!";
}
?>
    </div>
                        </div>
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