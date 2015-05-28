<?php
	require 'head_foot.php';
	headerHTML();
	session_start();
	$login = $_SESSION['login'];
	$nomobj = "Pomme";
?>
<?php
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";
		$connect = pg_connect("dbname=$db user=$user password=$pass");
		$donnees = pg_exec($connect,"SELECT * FROM objet");
		$var = 0;
		while ($row = pg_fetch_row($donnees)){
			if ( $row[2]==$nomobj){
				$_SESSION['prix'] = $row[1];
				$_SESSION['descriptionobj'] = $row[3];
				$_SESSION['pasobj'] = $row[4];
				$_SESSION['quantiteobj'] = $row[5];
				$_SESSION['datedebutvente'] = $row[6];
				$_SESSION['datefinvente'] = $row[7];
				$_SESSION['idcategorie'] = $row[8];
				$_SESSION['mailutilisateurvendeur'] = $row[9];
				$_SESSION['mailutilisateuracheteur'] = $row[10];
			}
		}
		$prix = $_SESSION['prix'];
		$description = $_SESSION['descriptionobj'];
		$pasobj = $_SESSION['pasobj'];
		$quantiteobj = $_SESSION['quantiteobj'];
		$datedebutvente = $_SESSION['datedebutvente'];
		$datefinvente = $_SESSION['datefinvente'];
		$idcategorie = $_SESSION['idcategorie'];
		$mailutilisateur = $_SESSION['mailutilisateurvendeur'];
		$mailutilisateuracheteur = $_SESSION['mailutilisateuracheteur'];
		
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";
		$connect = pg_connect("dbname=$db user=$user password=$pass");
		
		$donneesvendeur = pg_exec($connect,"SELECT * FROM utilisateur");
		while ($row = pg_fetch_row($donneesvendeur)){
			if ( $row[0]==$mailutilisateur){
				$_SESSION['nbobjvendu'] = $row[10];
			}
		}
		$nbobjvendu = $_SESSION['nbobjvendu'];
		

?>
<?php
	echo "<h1 class=\"Tpage\">$nomobj</h1>";
?>
	<div class="droite1_3">
				<h2><b>Information sur le vendeur :</b></h2>
					<?php
						echo "Vendeur : $mailutilisateur";
						echo "<br />\n";
						echo '<a href="compteother.php?param=1">Page du vendeur</a>';
						echo "<br />\n";
						echo "Nombre d'objet vendu : $nbobjvendu";
						echo "<br />\n";
						echo "Dernière personne à avoir enchéri : $mailutilisateuracheteur";
						echo "<br />\n";
						echo '<a href="compteother.php?param=2">Page du dernier acheteur</a>';
					?>
	</div>
	<div class ="gauche2_3">
		<img src="Pomme.jpg"  width="150" height="150" border=3>
		<form action="acheter.php" method="post">
		<div class="center">
			<h2><b><u>Description de l'objet :</u></b></h2>
				<?php
					echo "<br />\n";
					echo "$description";
					echo "<br />\n";
				?>
		</div>
		<div class="center">
			<h2><b><u>Caractéristiques de l'Objet :</u></b></h2>
				<?php
					echo "<br />\n";
					echo "Quantité de l'objet : $quantiteobj";
				?>
		</div>
		
		<div class="center">
					<?php
						echo "<br />\n";
						echo "Pas de l'enchère : $pasobj €";
						echo "<br />\n";
					?>
		</div>
		<div class="center">
					<?php
						echo "<br />\n";
						echo "Date du début de l'enchère : $datedebutvente";
						echo "<br />\n";
						echo "Date de la fin de l'enchère : $datefinvente";
						echo "<br />\n";
					?>
		</div>
			<h2><b><u>Prix de l'objet :</u></b></h2>
				<?php
					echo "<h1 class=\"error\">$prix €</h1>";
					echo "<br />\n";
				?>
				<input type="submit" class="bouton_encherir" value="Enchérir"></p>
	</div>
		</form>
<?php
	//require 'headfoot.php';
	footerHTML();
?>
