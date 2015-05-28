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
		/*on a une variable param qui nous permet de récupérer le login d'un utilisateur et d'afficher son profil avec ses informations 
		en se connectant à la base de données*/
		switch ($param){
				case 1:
					$loginother = $_SESSION['mailutilisateurvendeur'];
					break;
				case 2:
					$loginother = $_SESSION['mailutilisateuracheteur'];
					break;
			}
		//connexion à la base de données
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";
		$connect = pg_connect("dbname=$db user=$user password=$pass");
		$donnees = pg_exec($connect,"SELECT * FROM utilisateur");
		$var = 0;
		while ($row = pg_fetch_row($donnees)){
			if ( $row[0]==$loginother){
				//récupération des informations de l'utilisateur
				$var = 1;
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
	$nom = $_SESSION['nom'];
	$prenom =$_SESSION['prenom'];
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
	<!--Une fois qu'on a récupérer les valeurs de l'utilisateur dans la base de données on stocke ces valeurs dans des variables et on affiche en php
	ses informations qu'on ne peut pas modifier bien sur puisqu'on est pas sur sa page -->
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