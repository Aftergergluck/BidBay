<?php
	require 'head_foot.php';
	headerHTML();
	/*session_start();
	$login = $_SESSION['login'];
	$nomobj = "Pomme";*/
	$id = $_GET['id'];
?>
<?php
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";
		$connect = pg_connect("dbname=$db user=$user password=$pass");
		$donnees = pg_exec($connect,"SELECT * FROM objet WHERE idObjet=".$id);
		$row = pg_fetch_row($donnees);
		$nomobj = $row[1];
		$prix = $row[2];
		$description = $row[5];
		$pasobj = $row[3];
		$quantiteobj = $row[4];
		$datedebutvente = $row[6];
		$datefinvente = $row[7];
		$idcategorie = $row[8];
		$mailutilisateur = $row[9];
		$mailutilisateuracheteur = $row[10];
		
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
						echo "<a href=\"compteother.php?mail=".$mailutilisateur."\">Page du vendeur</a>";
						echo "<br />\n";
						echo "Nombre d'objet vendu : $nbobjvendu";
						echo "<br />\n";
						echo "Dernière personne à avoir enchéri : $mailutilisateuracheteur";
						echo "<br />\n";
						echo "<a href=\"compteother.php?mail=".$mailutilisateuracheteur."\">Page du dernier acheteur</a>";
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
