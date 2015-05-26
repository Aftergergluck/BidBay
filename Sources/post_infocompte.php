<?php
session_start();
	$mail=$_SESSION['login'];
	$passwd1 = isset($_POST['passwd1']) ? $_POST['passwd1'] : '';
	$passwd2 = isset($_POST['passwd2']) ? $_POST['passwd2'] : '';
	if ($passwd1=='' && $passwd2=='') {
		header('Location: moncompte.php');
	}
	else{
		$db = "postgres";
		$user = "postgres";
		$pass = "postgres";
		$connect = pg_connect("dbname=$db user=$user password=$pass");
		if ($passwd1 == $passwd2){
			$donnees = pg_exec($connect,"UPDATE utilisateur SET mdp='$passwd1' WHERE mailutilisateur='$mail'");
			header('Location: moncompte.php');
		}
		else{
			header('Location: form_infocompte.php?error=1');
		}
	}
?>