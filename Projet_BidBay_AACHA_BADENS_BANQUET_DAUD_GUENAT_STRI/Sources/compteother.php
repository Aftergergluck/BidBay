<?php
	require 'head_foot.php';
	require 'bdd.php';
	headerHTML();
	$loginother = $_GET['mail'];
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
		$donnees = pg_exec($connect,"SELECT * FROM utilisateur WHERE mailutilisateur ='".$loginother."'");
		$var = 0;
		while ($row = pg_fetch_row($donnees)){
			if ( $row[0]==$loginother){
				$var = 1;
				$_SESSION['nom'] = $row[2];
				$_SESSION['prenom'] = $row[3];
				$_SESSION['typeuser'] = $row[4];
				$_SESSION['adresseuser'] = $row[5];
				$_SESSION['telephone'] = $row[6];
				$_SESSION['datenaissanceuser'] = $row[7];
				$_SESSION['dateinscription'] = $row[8];
			}
		}
	$nom = $_SESSION['nom'];
	$prenom =$_SESSION['prenom'];
	$adresseuser = $_SESSION['adresseuser'];
	$telephone = $_SESSION['telephone'];
	$datenaissanceuser = $_SESSION['datenaissanceuser'];
	$dateinscription = $_SESSION['dateinscription'];
	$ventesachats = getnbvente($loginother);
	$_SESSION['nbobjvendu'] = $ventesachats['nbventes'];
	$_SESSION['nbobjach'] = $ventesachats['nbachats'];
	$nbobjvendu = $_SESSION['nbobjvendu'];
	$nbobjach = $_SESSION['nbobjach'];
?>
	<?php
		echo "<h1>Vous ètes sur le compte de : $loginother</h1>";
	?>
	<div class="gauche2_3">
			<h2><b>Photo de profil</b></h2>
			<?php
				$lienimage = "uploads/photouser/user".$loginother.".jpg";
				$lienimage2 = "uploads/photouser/user".$loginother.".jpeg";
				$lienimage3 = "uploads/photouser/user".$loginother.".gif";
				$lienimage4 = "uploads/photouser/user".$loginother.".png";
				if(!file_exists($lienimage)){
					$lienimage="photo_profil.jpg";
				}
				if(file_exists($lienimage2)){
					$lienimage=$lienimage2;
				}else if(file_exists($lienimage3)){
					$lienimage=$lienimage3;
				}else if(file_exists($lienimage4)){
					$lienimage=$lienimage4;
				}
	echo "<img src=\"".$lienimage."\"  width=\"150\" height=\"150\" border=3>";
	?>
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