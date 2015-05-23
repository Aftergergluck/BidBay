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
		 'descriptionobj' => $row[5], 'mailvendeur' => $row[10] );
		
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
		echo "<h3> {$objet['nomobj']} </h3>";
        echo '<img class="image" src="soccer-ball.png">';
        echo '<p>  Super ballon de 1998, de tres bonne qualite bla bla bla</p>';
	}



?>
