<?php
	require 'head_foot.php';
	headerHTML();
	session_start();

?>
<?php
	$login = $_SESSION['login'];
	$passwd = $_SESSION['passwd'];
	$nom = $_SESSION['nom'];
	$prenom =$_SESSION['prenom'];
	$imageuser = $_SESSION['imageuser'];
	$adresseuser = $_SESSION['adresseuser'];
	$telephone = $_SESSION['telephone'];
	$datenaissanceuser = $_SESSION['datenaissanceuser'];
?>
<h1 class="Tpage">Mon Compte</h1>
<form action="post_moncompte.php" method="post" enctype="multipart/form-data">
<div class ="droite1_3">
	<img src="photo_profil.jpg"  width="150" height="150" border=3>
	<br><input type="submit" class="bouton_inscr" value="Modifier"></br>
	</div>
	<div class="gauche2_3">
	</h2><b>Infomations personnelles</b></h2>
	<?php
		echo "<br />\n";
		echo "Votre Nom : $nom";
		echo "<br />\n";
		echo "Votre Prénom : $prenom";
		echo "<br />\n";
		echo "Votre date de naissance : $datenaissanceuser";
		echo "<br />\n";
	?>
	<div class="center">
	<input type="submit" class="bouton_inscr" value="Modifier"></p>
	</div>
	</h2><b>Infomations du compte</b></h2>
	<?php
		echo "<br />\n";
		echo "Votre Mail : $login";
		echo "<br />\n";
		echo "Votre Mot de passe : $passwd";
		echo "<br />\n";
	?>
	<div class="center">
	<input type="submit" class="bouton_inscr" value="Modifier"></p>
	</div>
	</h2><b>Coordonnées</b></h2>
	<?php
		echo "<br />\n";
		echo "Votre Adresse : $adresseuser";
		echo "<br />\n";
		echo "Votre Telephone : $telephone";
		echo "<br />\n";
	?>
	<div class="center">
	<input type="submit" class="bouton_inscr" value="Modifier"></p>
	</div>
	</div>
	</form>

<?php
	//require 'headfoot.php';
	footerHTML();
?>