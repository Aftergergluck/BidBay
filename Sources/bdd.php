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
	
?>
