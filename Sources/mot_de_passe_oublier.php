<?php
	require 'head_foot.php';
	headerHTML();
?>

<h1 class="Tpage">Mot de passe Oublié</h1>
		
		<div class="center">
		<h3>Vous avez oublié votre mot de passe BidBay?</h3>
		<p>Pas de problème! Envoyer nous votre email et vous recevrez votre mot de passe dans votre boite mail.<br><br>
		<form action="post_mot_de_passe_oublier.php" method="post" enctype="multipart/form-data">
		<p>Adresse e-mail</p>
		    <input type="mail" name="mail">
		<input class="bouton_co" type="submit" value="Envoyer"><br><br><br></form></p>
		</div>
		
<?php
	//require 'headfoot.php';
	footerHTML();
?>