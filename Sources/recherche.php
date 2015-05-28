<?php
	require 'head_foot.php';
  
	headerHTML();
	session_start();
?>
<?php


function dateFormat($date)
{
	$d = $date;
	$d = explode('-', $d);
	$chaine = $d[2] ." ".$d[1]." ".$d[0];
	return $chaine;
}
 
	require 'bdd.php';
	if($_POST['recherche'] == ""){
		echo "<h1>Veuillez saisir ce que vous voulez rechercher...</h1>";
	}
	else{
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";
		$rec = $_POST['recherche'];
		$rec = strtolower($rec);
		// Connexion
		$connect = pg_connect("dbname=$db user=$user password=$pass");
		echo "<h1 class=\"Tpage\"> Résultat(s) pour la recherche \"" .$_POST['recherche']."\" :</h1>";
		echo " <hr width=\"75%\" color=\"black\" size=\"1\" align=\"left\"> ";

		//PARTIE OBJET

		$resultObj = pg_exec($connect, "SELECT * FROM Objet");
		echo "<h2> Objet(s) trouvé(s) : <br></h2>";
		$i = 0;
		$nbObj = 0;
		while($row = pg_fetch_row($resultObj)){
			if(i != 0) //Affichage d'un séparateur
				echo " <hr width=\"50%\" color=\"black\" size=\"1\" align=\"center\"> ";
				
				//Initialisation variable date
				$date = dateFormat(substr($row[7],0, 10));
			if(strtolower(substr_count($row[1], $rec))){
				$req_vendeur = pg_exec($connect, "SELECT * FROM Utilisateur WHERE mailutilisateur = '".$row[9]."'");
				$vendeur = pg_fetch_row($req_vendeur);
				$lienimage = "uploads\photoobjet/objet".$row[0].".jpg";
				$lienimage = "uploads/photoobjet/objet".$row[0].".jpg";
				if(!file_exists($lienimage)){
					$lienimage="photo_objet_defaut.png";
				}
				echo "<table><tr><td rowspan=\"2\" align=\"center\">Fin le :<br>".$date."<td rowspan=\"2\"><a href=\"objet.php?id=".$row[0]."\"> <img src=\"".$lienimage."\" width=\"150px\" height=\"150px\"></a></td><td height =\"30\"><a href=\"objet.php?id=".$row[0]."\">".$row[1]."</a> Vendu par <a href=\"compteother.php?mail=".$row[9]."\">".$vendeur[3]." ".$vendeur[2]."</a></td></tr><tr><td align=\"left\" width=\"300px\">".$row[5]."</td><td rowspan=\"2\" align=\"center\" > Prix : ".$row[2]." € </td></tr></table>";
				$nbObj++;
			}
			elseif (strtolower(substr_count($row[5], $rec))){
				$req_vendeur = pg_exec($connect, "SELECT * FROM Utilisateur WHERE mailutilisateur = '".$row[9]."'");
				$vendeur = pg_fetch_row($req_vendeur);
				$lienimage = "uploads/photoobjet/objet".$row[0].".jpg";
				if(!file_exists($lienimage)){
					$lienimage="photo_objet_defaut.png";
				}
				echo "<table><tr><td rowspan=\"2\" align=\"center\">Fin le :<br>".$date."<td rowspan=\"2\"><a href=\"objet.php?id=".$row[0]."\"> <img src=\"".$lienimage."\" width=\"150px\" height=\"150px\"></a></td><td height =\"30\"><a href=\"objet.php?id=".$row[0]."\">".$row[1]."</a> Vendu par <a href=\"compteother.php?mail=".$row[9]."\">".$vendeur[3]." ".$vendeur[2]."</a></td></tr><tr><td align=\"left\" width=\"300px\">".$row[5]."</td><td rowspan=\"2\" align=\"center\" > Prix : ".$row[2]." € </td></tr></table>";
				$nbObj++;
			}
			$i++;
		}
		if($nbObj == 0){
			echo "Aucun résultat trouvé...";
		}

		echo " <hr width=\"75%\" color=\"black\" size=\"3\" align=\"center\"> ";

		//PARTIE UTILISATEUR

		$resultUsr = pg_exec($connect, "SELECT * FROM Utilisateur");
		echo "<h2> Utilisateur(s) trouvé(s) : <br></h2>";
		$i = 0;
		$nbUsr = 0;
		while($row = pg_fetch_row($resultUsr)){		
			if($i !=0 && strtolower($row[2]) == $rec || strtolower($row[3]) == $rec){
				echo " <hr width=\"50%\" color=\"black\" size=\"1\" align=\"center\"> ";
			}


			if(strtolower($row[2]) == $rec || strtolower($row[3]) == $rec){
				echo "<table><tr><td><img src=\"photo_profil.jpg\" width=\"150px\" height=\"150px\"></td><td align=\"center\"><a href=\"compteother.php?mail=".$row[0]."\">".$row[3]. "  " .$row[2]. "</a> </td></tr></table>";
				$nbUsr++;
				$i++;
			}
		}
		if($nbUsr == 0){
			echo "Aucun résultat trouvé...";
		}

	}


?>


















<?php
	
	footerHTML();
?>