<?php
	require 'head_foot.php';
	headerHTML();
	session_start();
?>
<?php
	/*cette variable va nous servir à selon sa valeur dire si l'utilisateur à oublier de remplir un ou plusieur champs dans un premier cas,
	et dans un second cas il indiquera à l'utilisateur qu'il s'est trompé dans sa saisie*/
	$error = isset($_GET['error']) ? $_GET['error'] : '';
?>
<h1 class="Tpage">Connexion</h1>
		
		<div class="gauche">
		<form action="post_connexion.php" method="post" enctype="multipart/form-data">
		<?php
		/*case de la variable error*/
			switch ($error){
				case 1:
					echo "<B class=\"error\">merci de saisir vos identifiants</B>";
					break;
				case 2:
					echo "<B class=\"error\">Votre mail ou mot de passe est incorrect</B>";
					break;
			}
		?>
		<!--on met un champ pour que l'utilisateur puisse saisir son mail et son mot de passe-->
		<p>Adresse e-mail</p>
		    <input type="mail" name="mail">
		    <p>Mot de passe</p>
		    <input type="password" name="pass1">
			<p>
			<a class="Connexion" href="mot_de_passe_oublier.php">Mot de passe oublié</a><!--c'est un lien pour dire qu'on a oublié son mot de passe-->
			</p>
		<p><input type="checkbox" name="Restez Connecté" id="Restez Connecté" /> <label for="Restez Connecté">Restez Connecté</label></p>
		<input type="submit" class="bouton_co" value="Connexion">
		</div>
		</form>
		<div class="droite">
		<h3>Vous êtes nouveau sur BidBay?</h3>
		Commencer dès maintenant. C'est simple et rapide!
		<p>
		</p>
		<!--on valide sur inscription-->
		<a class="bouton_inscr" href="inscription.php">Inscription</a>
		</div>
		
<?php
	//require 'headfoot.php';
	footerHTML();
?>