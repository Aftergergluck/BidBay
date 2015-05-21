<?php
session_start();
		$login = $_SESSION['login'];
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";
		$connect = pg_connect("dbname=$db user=$user password=$pass");
		$donnees = pg_exec($connect,"SELECT * FROM utilisateur");
		$var = 0;
		while ($row = pg_fetch_row($donnees)){
			if ( $row[0]==$login){
				$var = 1;
				$_SESSION['passwd'] = $row[1];
				$_SESSION['nom'] = $row[2];
				$_SESSION['prenom'] = $row[3];
				$_SESSION['typeuser'] = $row[4];
				$_SESSION['imageuser'] = $row[5];
				$_SESSION['adresseuser'] = $row[6];
				$_SESSION['telephone'] = $row[7];
				$_SESSION['datenaissanceuser'] = $row[8];
			}
		}
		header('Location: moncompte.php');
?>