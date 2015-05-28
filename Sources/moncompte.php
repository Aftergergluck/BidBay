<?php
	require 'head_foot.php';
	headerHTML();
	session_start();

?>
<?php
		if(isset($_SESSION) && (!isset($_SESSION['login']))){  //Déconnecté
			header('Location : connexion.php');
		}
		else{
			$login = $_SESSION['login']; //on récupère l'identifiant avec lequel on s'est connecté
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";
		$connect = pg_connect("dbname=$db user=$user password=$pass");	//connexion à la base de données
		$donnees = pg_exec($connect,"SELECT * FROM utilisateur");	//récupération des informations de l'utilisateur
		$var = 0;
		while ($row = pg_fetch_row($donnees)){
			if ( $row[0]==$login){
				$var = 1;
				$_SESSION['passwd'] = $row[1];
				$_SESSION['nom'] = $row[2];
				$_SESSION['prenom'] = $row[3];
				$_SESSION['typeuser'] = $row[4];
				$_SESSION['adresseuser'] = $row[5];
				$_SESSION['telephone'] = $row[6];
				$_SESSION['datenaissanceuser'] = $row[7];
				$_SESSION['dateinscription'] = $row[8];
				$_SESSION['nbobjvendu'] = $row[9];
				$_SESSION['nbobjach'] = $row[10];
			}
		}
	$login = $_SESSION['login'];
	$passwd = $_SESSION['passwd'];
	$nom = $_SESSION['nom'];
	$prenom =$_SESSION['prenom'];
	$adresseuser = $_SESSION['adresseuser'];
	$telephone = $_SESSION['telephone'];
	$datenaissanceuser = $_SESSION['datenaissanceuser'];
	$dateinscription = $_SESSION['dateinscription'];
	$nbobjvendu = $_SESSION['nbobjvendu'];
	$nbobjach = $_SESSION['nbobjach'];
		}
?>
<!--on affiche les differentes parti de notre compte qui sont la photo les infos perso, les infos du compte 
et les coordonnées, on insère du code php pour récupérer et afficher la valeur des variables qui contiennent les information  de l'utilisateur-->
<h1 class="Tpage">Mon Compte</h1>
	<form action="post_photo.php" method="post" enctype="multipart/form-data">
		<div class ="droite1_3">
			<img src="photo_profil.jpg"  width="150" height="150" border=3>
			<br><input type="submit" class="bouton_inscr" value="Modifier"></br>
		</div>
	</form>
	<div class="gauche2_3">
		<form action="form_infoperso.php" method="post" enctype="multipart/form-data">
			<h2><b>Infomations personnelles</b></h2>
				<?php
					echo "<br />\n";
					echo "Votre Nom : $nom";
					echo "<br />\n";
					echo "Votre Prénom : $prenom";
					echo "<br />\n";
					echo "Votre date de naissance : $datenaissanceuser";
					echo "<br />\n";
				?>
				<!--on peut appyer sur un bouton modifier pour changer certaines de nos informations-->
			<div class="center">
				<input type="submit" class="bouton_inscr" value="Modifier"></p>
			</div>
		</form>
		<form action="form_infocompte.php" method="post" enctype="multipart/form-data">
			<h2><b>Infomations du compte</b></h2>
				<?php
					echo "<br />\n";
					echo "Votre Mail : $login";
					echo "<br />\n";
					echo "Votre Mot de passe : $passwd";
					echo "<br />\n";
					echo "Votre Date d'inscription : $dateinscription";
					echo "<br />\n";
				?>
			<div class="center">
				<input type="submit" class="bouton_inscr" value="Modifier"></p>
			</div>
		</form>
		<form action="form_coordonnees.php" method="post" enctype="multipart/form-data">
			<h2><b>Coordonnées</b></h2>
				<?php
					echo "<br />\n";
					echo "Votre Adresse : $adresseuser";
					echo "<br />\n";
					echo "Votre Telephone : +33$telephone";
					echo "<br />\n";
				?>
			<div class="center">
				<input type="submit" class="bouton_inscr" value="Modifier"></p>
			</div>
			<h2><b>Statistiques sur BidBay</b></h2>
				<?php
					echo "<br />\n";
					echo "Votre nombre d'objet vendu : $nbobjvendu";
					echo "<br />\n";
					echo "Votre nombre d'objet acheté : $nbobjach";
					echo "<br />\n";
				?>
		</form>
	</div>
</form>
<?php
	//require 'headfoot.php';
	footerHTML();
?>