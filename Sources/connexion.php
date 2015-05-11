<?php
	require 'head_foot.php';
	headerHTML();
?>

<h1 class="Tpage">Connexion</h1>
		
		
		<p>Adresse e-mail</p>
		    <input type="mail" name="mail">
		    <p>Mot de passe</p>
		    <input type="password" name="pass1">
			<p>
			<a class="Connexion" href="accueil.php">Mot de passe oublié</a>
			</p>
		<p><input type="checkbox" name="Restez Connecté" id="Restez Connecté" /> <label for="Restez Connecté">Restez Connecté</label></p>
		<input type="submit" class="bouton_co" value="Connexion">
		<div style="text-align: right;padding-right: 300px; padding-bottom: 100px">
		<h3>Vous êtes nouveau sur BidBay?</h3>
		Commencer dès maintenant. C'est simple et rapide!
		<p>
		</p>
		<a class="bouton_inscr" href="index2.html">Inscription</a>
		</div>
		
<?php
	//require 'headfoot.php';
	footerHTML();
?>