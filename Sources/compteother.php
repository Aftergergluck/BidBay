<?php
	require 'head_foot.php';
	headerHTML();
	session_start();
	$loginother= $_SESSION['profilother'] = "charles.banquet@live.com";

?>
<?php
	$param = isset($_GET['param']) ? $_GET['param'] : '';
?>
<form action="objet.php" method="post" enctype="multipart/form-data">
<?php
		switch ($param){
				case 1:
					$loginother = $_SESSION['mailutilisateurvendeur'];
					break;
				case 2:
					$loginother = $_SESSION['mailutilisateuracheteur'];
					break;
			}
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";
		$connect = pg_connect("dbname=$db user=$user password=$pass");
		$donnees = pg_exec($connect,"SELECT * FROM utilisateur");
		$var = 0;
		while ($row = pg_fetch_row($donnees)){
			if ( $row[0]==$loginother){
				$var = 1;
				$_SESSION['nom'] = $row[2];
				$_SESSION['prenom'] = $row[3];
				$_SESSION['typeuser'] = $row[4];
				$_SESSION['imageuser'] = $row[5];
				$_SESSION['adresseuser'] = $row[6];
				$_SESSION['telephone'] = $row[7];
				$_SESSION['datenaissanceuser'] = $row[8];
				$_SESSION['dateinscription'] = $row[9];
				$_SESSION['nbobjvendu'] = $row[10];
				$_SESSION['nbobjach'] = $row[11];
			}
		}
	$nom = $_SESSION['nom'];
	$prenom =$_SESSION['prenom'];
	$imageuser = $_SESSION['imageuser'];
	$adresseuser = $_SESSION['adresseuser'];
	$telephone = $_SESSION['telephone'];
	$datenaissanceuser = $_SESSION['datenaissanceuser'];
	$dateinscription = $_SESSION['dateinscription'];
	$nbobjvendu = $_SESSION['nbobjvendu'];
	$nbobjach = $_SESSION['nbobjach'];
?>
	<?php
		echo "<h1>Vous ètes sur le compte de : $loginother</h1>";
	?>
	<div class="gauche2_3">
			<h2><b>Photo de profil</b></h2>
			<img src="photo_profil.jpg"  width="150" height="150" border=3>
			<h2><b>Infomations personnelles</b></h2>
				<?php
					echo "<br />\n";
					echo "Nom : $nom";
					echo "<br />\n";
					echo "Prénom : $prenom";
					echo "<br />\n";
					echo "Naissance : $datenaissanceuser";
					echo "<br />\n";
					echo "Date d'inscription : $dateinscription";
					echo "<br />\n";
				?>
			<h2><b>Coordonnées</b></h2>
				<?php
					echo "<br />\n";
					echo "Adresse : $adresseuser";
					echo "<br />\n";
					echo "Telephone : +33$telephone";
					echo "<br />\n";
					echo "Mail : $loginother";
					echo "<br />\n";
				?>
			<h2><b>Statistiques sur BidBay</b></h2>
				<?php
					echo "<br />\n";
					echo "Nombre d'objet vendu : $nbobjvendu";
					echo "<br />\n";
					echo "Nombre d'objet acheté : $nbobjach";
					echo "<br />\n";
				?>				
	</div>
</form>
<?php
	//require 'headfoot.php';
	footerHTML();
?>