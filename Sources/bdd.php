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



	function getinfoobjet($idobjet){
		$query = "SELECT * FROM objet WHERE idobjet = '$idobjet'; ";
		//nomobj, prixinit, descriptionobj, mailvendeur
		$result = requeteBDD($query);
		$row = pg_fetch_array($result);	
		$objet = array('idobjet' => $row[0], 'nomobj' =>$row[1], 'prixinit' => $row[2],
		 'descriptionobj' => $row[5], 'mailvendeur' => $row[9] );
		
		return $objet;
	}
	/*
	function getlastidobjet(){
		$query = "SELECT idobjet FROM objet ORDER BY idobjet DESC LIMIT 6 ;";
		$result = requeteBDD($query);
		$row = pg_fetch_array($result);
		$objet[];
		foreach ($row as $value ){
			$objet[] = $value;
		}

		return $objet;
	} 
*/
	function afficherobjet($idobjet){
		$objet = getinfoobjet($idobjet);
		$lienphoto = "uploads/photobjet/objet".$idobjet ;
		echo "<h3 style='float :right'>{$objet['nomobj']} </h3>";
		echo "<h3 style ='float: right'> <br /> <br /><br />{$objet['mailvendeur']} </h3>";
        echo "<img class='image' style='position: relative' src='$lienphoto' >";
        echo "<p>Mis en vente à :  {$objet['prixinit']} € </p>   ";
        echo "<p>  {$objet['descriptionobj']} </p>";
        "uploads/photoobjet/objet".$row[0].".jpg";
	}



?>
