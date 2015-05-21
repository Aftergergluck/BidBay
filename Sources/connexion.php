<?php
	require 'head_foot.php';
	headerHTML();
	session_start();
?>
<?php
	$error = isset($_GET['error']) ? $_GET['error'] : '';
?>
<h1 class="Tpage">Connexion</h1>
		
		<div class="gauche">
		<form action="post_connexion.php" method="post" enctype="multipart/form-data">
		<?php
			switch ($error){
				case 1:
					echo "<B>merci de saisir vos identifiants</B>";
					break;
				case 2:
					echo "<B>Votre mail ou mot de passe est incorrect</B>";
					break;
			}
		?>
		<p>Adresse e-mail</p>
		    <input type="mail" name="mail">
		    <p>Mot de passe</p>
		    <input type="password" name="pass1">
			<p>
			<a class="Connexion" href="mot_de_passe_oublier.php">Mot de passe oublié</a>
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
		<a class="bouton_inscr" href="inscription.php">Inscription</a>
		</div>
		
<?php
	//require 'headfoot.php';
	footerHTML();
?>