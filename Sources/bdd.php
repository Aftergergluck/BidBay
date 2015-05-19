<?php
	function connectBDD() {
		// Infos de connexion
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";

		// Connexion
		$connect = pg_connect("dbname=$db user=$user password=$pass");
		if ($connect)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function requeteBDD($query) {
		if (connectBDD())
		{
			$result = pg_exec($connect,$query);
			return $result;
		}
		else
		{
			echo "Erreur de connexion.";
		}
	}
	
	function insertUser($u) {
		requeteBDD("INSERT INTO utilisateur VALUES ($u[0],$u[1],$u[2],$u[3],$u[4],$u[5],$u[6],$u[7],$u[8],$u[9],$u[10],$u[11])");
	}

	function insertObj($objet) {
		requeteBDD("INSERT INTO objet VALUES ($objet[0],$objet[1],$objet[2],$objet[3],$objet[4],$objet[5],$objet[6],$objet[7],$objet[8],$objet[9],$objet[10],$objet[11],$objet[12])");
	}
	
	function insertEnch($e) {
		requeteBDD("INSERT INTO encherir VALUES ($e[0],$e[1],$e[2],$e[3])");
	}
	
	function insertCat($cat) {
		requeteBDD("INSERT INTO categorie VALUES ($cat[0],$cat[1])");
	}
	
	function insertNote($n) {
		requeteBDD("INSERT INTO note VALUES ($n[0],$n[1],$n[2],$n[3],$n[4],$n[5],$n[6])");
	}
	
?>
