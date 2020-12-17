<?php
include('include/database.php');
include('include/user.php');
include('include/gestion.php');
global $db;

session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">


	<title>Accueil Weather Company</title>

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
<?php
        $user = new user($db);
        
        // Si la fonction "deco" est utilisé, la session est détruite.
        if (isset($_POST['deco'])) 
        {
            session_unset();
            session_destroy();
        }
        
        // Si la fonction "valid" est utilisé,
        if (isset($_POST['valid'])) 
        {
            $user->Connexion($_POST['user'], $_POST['pass']);
            $connexion = $user->compare($_POST['user'], $_POST['pass']);
            if ($connexion) 
            {
                $_SESSION['user'] = $user->getLogin();
                $_SESSION['nom'] = $user->getNom();
                $_SESSION['prenom'] = $user->getPrenom();
                $_SESSION['admin'] = $user->getAdmin();
            }
        }
        //  Si la fonction "inscrip" est utilisé :
        if (isset($_POST['inscrip'])) 
        {
            // On vérifie si tous les champs sont remplis, sinon on quitte le programme.
            if (empty($_POST['nom'] && $_POST['prenom'] && $_POST['user'] && $_POST['pass'])) // Vérifie si l'utilisateur a bien rempli tous les champs dans le formulaire
            { 
                echo '<a href="index.php">Votre saisie est incorrecte veuillez recommencer</a>';
                exit();
            } 
            else 
            {
                // On vérifie si l'utilisateur est déja inscrit dans la base de données
                $user->Connexion($_POST['user'], $_POST['pass']);
                $comparuser = $user->compare($_POST['user'], $_POST['pass']);
                if ($comparuser) 
                {
                    echo 'utilisateur déja inscrit';
                    // Sinon si il n'est pas incrit on l'inscrit.
                } 
                else 
                {
                    echo 'Votre inscription a bien été prise en compte. 
                        Connectez-vous !';
                    $user->newUser($_POST['user'], $_POST['pass'], $_POST['nom'], $_POST['prenom']);
                }
            }
        }
    ?>

	<div class="site-content">
		<div class="site-header">
			<div class="container">
				<a href="index.php" class="branding">
					<img src="images/logo.png" alt="" class="logo">
					<div class="logo-type">
						<h1 class="site-title">BTS SN2</h1>
						<small class="site-description">FRESI DELATTRE DANEL</small>
					</div>
				</a>

				<!-- Default snippet for navigation -->
				<div class="main-navigation">
					<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
					<ul class="menu">
						<li class="menu-item current-menu-item"><a href="index.php">Home</a></li>
						<li class="menu-item"><a href="news.html">News</a></li>
                        <li class="menu-item"><a href="clientPage.php">Client</a></li>
                        <li class="menu-item"><a href="historique.php">Historique</a></li>
						<li class="menu-item"><a href="photos.html">Photos</a></li>
						<li class="menu-item"><a href="contact.php">Contact</a></li>
					</ul> <!-- .menu -->
				</div> <!-- .main-navigation -->

				<div class="mobile-navigation"></div>

			</div>
		</div> <!-- .site-header -->

		<div class="hero" data-bg-image="images/fontAccueil.jpg">
			<div class="container">
			</div>
		</div>

		<div class="prevision">

			<iframe id="widget_autocomplete_preview" width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/800210"> </iframe>
			<iframe id="widget_autocomplete_preview" width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/751010"> </iframe>
			<iframe id="widget_autocomplete_preview" width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/315550"> </iframe>
			<iframe id="widget_autocomplete_preview" width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/330630"> </iframe>
			<iframe id="widget_autocomplete_preview" width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/1305551"> </iframe>
			<iframe id="widget_autocomplete_preview" width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/691230"> </iframe>
			<iframe id="widget_autocomplete_preview" width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/360240"> </iframe>
			<iframe id="widget_autocomplete_preview"  width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/060880"> </iframe>
			<iframe id="widget_autocomplete_preview"  width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/212310"> </iframe>
			<iframe id="widget_autocomplete_preview"  width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/452340"> </iframe>
			<iframe id="widget_autocomplete_preview"  width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/141180"> </iframe>
			<iframe id="widget_autocomplete_preview"  width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/341720"> </iframe>

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

	<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accueil</title>
    </head>
    <body>
        <?php 
            if (!isset($_SESSION['user'])) 
            {  
        ?>
            <div class="wrapper container">
                <div class="row justify-content-center">
                    <div class="col-auto align-self-center">
                        <div class="wrapper fadeInDown">
                            <div id="formContent">
                                <p class="card-text">
                                    <table class="table">
                                        <tr>
                                            <th scope="col" class="text-center">Inscription</th>
                                            <!--Formulaire pour inscrire un utilisateur dans la BDD -->
                                        </tr>
                                        <form action="" method="post">
                                            <tr>
                                                <td class="text-center">
                                                    <input type="text" class="fadeIn second" name="nom" placeholder="Nom">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input type="text" class="fadeIn second" name="prenom" placeholder="Prenom">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input type="text" class="fadeIn second" name="user" placeholder="login">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">

                                                    <input type="password" class="fadeIn third" name="pass" placeholder="password">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input type="submit" class="fadeIn fourth" name="inscrip" value="Inscription">
                                                </td>
                                            </tr>
                                        </form>
                                    </table>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto align-self-center">
                        <div class="wrapper fadeInDown">
                            <div id="formContent">
                                <p class="card-text">
                                    <table class="table">
                                        <tr>
                                            <th scope="col" class="text-center">Connexion</th>
                                            <!--Permet à l'utilisateur ou à l'administrateur de se connecter au site-->
                                        </tr>
                                        <form action="" method="post">
                                            <tr>
                                                <td class="text-center">
                                                    <input type="text" class="fadeIn second" name="user" placeholder="login">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input type="password" class="fadeIn third" name="pass" placeholder="password">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input type="submit" class="fadeIn fourth" name="valid" value="Connexion">
                                                </td>
                                            </tr>
                                        </form>
                                    </table>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } 
            else if (isset($_SESSION['user'])) 
            {
                menu();
        ?>
            <!-- Permet à l'utilisateur de mettre fin à sa session. -->
            <div class="wrapper container">
                <div class="row justify-content-center">
                    <form action="" method="post"><input type="submit" name="deco" value="Déconnexion"></form>
                </div>
            </div>
        <?php
            }
        ?>
    </body>
    </html>

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/app.js"></script>

</body>

</html>