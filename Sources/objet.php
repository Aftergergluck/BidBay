<?php
	require 'head_foot.php';
	require 'bdd.php';
	headerHTML();
	session_start();
	/*$login = $_SESSION['login'];
	$nomobj = "Pomme";*/
	$id = $_GET['id'];
?>
<?php
		/*on se connecte à la base de données*/
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";
		$connect = pg_connect("dbname=$db user=$user password=$pass");
		/*on récupère colonne par colonne les informations de l'objet*/
		$donnees = pg_exec($connect,"SELECT * FROM objet WHERE idObjet=".$id);
		$row = pg_fetch_row($donnees);
				$_SESSION['idobj'] = $row[0];
				$_SESSION['nomobj'] = $row[1];
				$_SESSION['prix'] = $row[2];
				$_SESSION['pasobj'] = $row[3];
				$_SESSION['quantiteobj'] = $row[4];
				$_SESSION['descriptionobj'] = $row[5];
				$_SESSION['datedebutvente'] = $row[6];
				$_SESSION['datefinvente'] = $row[7];
				$_SESSION['idcategorie'] = $row[8];
				$_SESSION['mailutilisateurvendeur'] = $row[9];
				$_SESSION['mailutilisateuracheteur'] = $row[10];
		/*on affecte ces informations à des variable qui nous permettrons d'afficher les infos de l'objet*/
		$idobj = $_SESSION['idobj'];
		$nomobj = $_SESSION['nomobj'];
		$prix = $_SESSION['prix'];
		$pasobj = $_SESSION['pasobj'];
		$quantiteobj = $_SESSION['quantiteobj'];
		$description = $_SESSION['descriptionobj'];
		$datedebutvente = $_SESSION['datedebutvente'];
		$datefinvente = $_SESSION['datefinvente'];
		$idcategorie = $_SESSION['idcategorie'];
		$mailutilisateur = $_SESSION['mailutilisateurvendeur'];
		$mailutilisateuracheteur = $_SESSION['mailutilisateuracheteur'];
		$ventesachats = getnbvente($mailutilisateur);
		$_SESSION['nbobjvendu'] = $ventesachats['nbachats'];
		$_SESSION['nbobjach'] = $ventesachats['nbventes'];
		$nbobjvendu = $_SESSION['nbobjvendu'];
		$nbobjach = $_SESSION['nbobjach'];
		
		

?>
<?php
	echo "<h1 class=\"Tpage\">$nomobj</h1>";
?>
<!--on affiches les differentes informations de l'objet-->
	<div class="droite1_3">
				<h2><b>Information sur le vendeur :</b></h2>
				<!--on affiches les informations du vendeurs et du dernier à avoir miser et on met un lien sur leur profil-->
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
	<?php
				$lienimage = "uploads/photoobjet/objet".$row[0].".jpg";
				$lienimage2 = "uploads/photoobjet/objet".$row[0].".jpeg";
				$lienimage3 = "uploads/photoobjet/objet".$row[0].".gif";
				$lienimage4 = "uploads/photoobjet/objet".$row[0].".png";
				if(file_exists($lienimage2)){
					$lienimage=$lienimage2;
				}else if(file_exists($lienimage3)){
					$lienimage=$lienimage3;
				}else if(file_exists($lienimage4)){
					$lienimage=$lienimage4;
				}
				if(!file_exists($lienimage)){
					$lienimage="photo_objet_defaut.png";
				}
	echo "<img src=\"".$lienimage."\"  width=\"150\" height=\"150\" border=3>";
	?>
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
				<!--quand on a affiché les informations on peut si on le souhaite cliquer sur enchérir qui nous conduira vers une page où l'on va enchérir sur l'objet-->
				<input type="submit" class="bouton_encherir" value="Enchérir"></p>
	</div>
		</form>
<?php
	//require 'headfoot.php';
	footerHTML();
?>
