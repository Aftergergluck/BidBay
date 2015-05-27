<?php
	require 'head_foot.php';
  
	headerHTML();
?>
<?php

 
function dateDiff($date1, $date2){
    $diff = abs($date1 - $date2); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
    $retour = array();
 
    $tmp = $diff;
    $retour['second'] = $tmp % 60;
 
    $tmp = floor( ($tmp - $retour['second']) /60 );
    $retour['minute'] = $tmp % 60;
 
    $tmp = floor( ($tmp - $retour['minute'])/60 );
    $retour['hour'] = $tmp % 24;
 
    $tmp = floor( ($tmp - $retour['hour'])  /24 );
    $retour['day'] = $tmp;
 
    return $retour;
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
			
			$dateDiff = dateDiff(time(), $row[6]);
			$date=$dateDiff['day']." j - ".$dateDiff['hour']." h - ".$dateDiff['minute']." m - ".$dateDiff['second']." s";	
			
			if(strtolower(substr_count($row[1], $rec))){
				echo "<table><tr><td rowspan=\"2\" align=\"center\">".$date."<td rowspan=\"2\"> <img src=\"pomme.jpg\" width=\"150px\" height=\"150px\"></td><td height =\"30\">".$row[1]."</td></tr><tr><td align=\"center\">".$row[5]."</td></tr></table>";
				$nbObj++;
			}
			elseif (strtolower(substr_count($row[5], $rec))){
				echo "<table><tr><td rowspan=\"2\" align=\"center\">".$date."<td rowspan=\"2\"> <img src=\"pomme.jpg\" width=\"150px\" height=\"150px\"></td><td height =\"30\">".$row[1]."</td></tr><tr><td align=\"center\">".$row[5]."</td></tr></table>";
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
				echo "<table><tr><td><img src=\"photo_profil.jpg\" width=\"150px\" height=\"150px\"></td><td align=\"center\">".$row[3]. "  " .$row[2]. " </td></tr></table>";
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