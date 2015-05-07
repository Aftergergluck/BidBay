<?php
	require 'head_foot.php';
	headerHTML();
?>

<h1 class="Tpage">Inscription</h1>
	
	<div class="center"><h2 class="Tdesc">Commencez à utiliser BidBay</h2></div><br><br>
	<div>
	    <form action="admin_connexion.php" method="post" enctype="multipart/form-data">
		<div class="gauche">
		    <p>Prénom</p>
		    <input type="text" name="prenom">
		    <p>Adresse e-mail</p>
		    <input type="mail" name="mail">
		    <p>Mot de passe</p>
		    <input type="password" name="pass1">
		    <p>Confirmez le mot de passe</p>
		    <input type="password" name="pass2">
		</div class="gauche2_3">
		<div class="droite">
		    <p>Nom</p>
		    <input type="text" name="nom">
		    <div class="center">
			<p><br>En cliquant sur Soumettre, je reconnais que : <br>
			<ul>
			   <li>J'ai lu et j'accepte les Conditions d'Utilisation</li>
			   <li>Je donne mon accord au traitement de mes données personelles,</li>
			   <li>Je suis âgé de plus de 18 ans.</li>
			</ul><br>
			<input type="submit" class="bouton_inscr" value="Soumettre"></p>
		    </div>
		</div>
	    </form>
	</div>

<?php
	//require 'headfoot.php';
	footerHTML();
?>
