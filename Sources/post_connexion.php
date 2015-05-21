
<?php
session_start();

	
	$login = isset($_POST['mail']) ? $_POST['mail'] : '';
	$passwd = isset($_POST['pass1']) ? $_POST['pass1'] : '';
	if ($login=='' || $passwd=='') {
		header('Location: connexion.php?error=1');
	}
	else{
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";
		$connect = pg_connect("dbname=$db user=$user password=$pass");
		$donnees = pg_exec($connect,"SELECT mailutilisateur,mdp FROM utilisateur");
		$var = 0;
		while ($row = pg_fetch_row($donnees)){
			if ( $row[0]==$login && $row[1]==$passwd){
				$var = 1;
			}
		}
		if ($var == 1){
		$_SESSION['login'] = $_POST['mail'];
		header('Location: moncompte.php');
		}
		else{
		header('Location: connexion.php?error=2');
		}
	}
?>