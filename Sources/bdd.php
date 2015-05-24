<?php
	function connectBDD() {
		// Infos de connexion
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";

		// Connexion
		$connect = pg_connect("dbname=$db user=$user password=$pass")
   		or die("Erreur de connexion");
		return $connect ;
	}

	function requeteBDD($query) {
		
		$connect = connectBDD();
		$result = pg_exec($connect,$query);
		return $result;
		
	}



	//function derniersobjets(){

	//}
	function getnbvente($mailuser){
	
		$achats = "SELECT COUNT (*) FROM objet WHERE mailvendeur='$mailuser'; ";
		$ventes = "SELECT COUNT (*) FROM objet WHERE mailacheteur='$mailuser'; ";
		$rstventes = requeteBDD($ventes);
		$rstachats = requeteBDD($achats);
		$rowA = pg_fetch_array($rstachats);
		$rowV = pg_fetch_array($rstventes);
		$array = array('nbventes' => $rowV[0] , 'nbachats' => $rowA[0] );
		return $array;

	}





	function getinfoobjet($idobjet){
		$query = "SELECT * FROM objet WHERE idobjet = '$idobjet'; ";
		//nomobj, prixinit, descriptionobj, mailvendeur
		$result = requeteBDD($query);
		$row = pg_fetch_array($result);	
		$querynom = "SELECT prenom FROM utilisateur WHERE mailutilisateur = '$row[9]' ;";
 		$nom = requeteBDD($querynom);
		$nomvendeur = pg_fetch_all_columns($nom);
		$objet = array('idobjet' => $row[0], 'nomobj' =>$row[1], 'prixinit' => $row[2],
		 'descriptionobj' => $row[5], 'mailvendeur' => $row[9], 'nomvendeur' => $nomvendeur[0] );
		
		return $objet;
	}
	
	function getlastidobjet(){
		$query = "SELECT idobjet FROM objet ORDER BY idobjet DESC LIMIT 6 ;";
		$result = requeteBDD($query);
		$array =  pg_fetch_all_columns($result, 0);
		return $array;

		
	} 

	function getlastvente(){
		$query = "SELECT idobjet FROM objet WHERE datelimitevente < now() ORDER BY datelimitevente LIMIT 6 ;";
		$result = requeteBDD($query);
		$array =  pg_fetch_all_columns($result, 0);
		return $array;

		
	}

	function afficherobjet($idobjet){
		$objet = getinfoobjet($idobjet);
		echo '<div class="scroll-content-item">';
		echo "<h3  style ='float: right'> <a  href=\"objet.php?id=".$objet['idobjet']."\">{$objet['nomobj']}</a> </h3>";
		echo "<h3  style ='clear: both; float: right'> <br /> <a href=\"compteother.php?mail=".$objet['mailvendeur']."\">{$objet['nomvendeur']}</a><br /></h3>";
        echo "<img class=\"image\" style=\"position: relative\" src=\"uploads/photoobjet/objet\".$idobjet.\".jpg\" >"	;
        echo "<p>Prix :  {$objet['prixinit']} € </p>   ";
        echo "<p>  {$objet['descriptionobj']} </p>";
        echo "</div>";
        
	}



?>
